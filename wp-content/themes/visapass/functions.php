<?php
/**
 * visapass functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package visapass
 */

if ( ! function_exists( 'visapass_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function visapass_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on visapass, use a find and replace
		 * to change 'visapass' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'visapass', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'visapass' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'visapass_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Enable custom header
		add_theme_support('custom-header');


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		remove_theme_support( 'widgets-block-editor' );


		add_image_size( 'visapass-case-details', 1170, 600, array('center','center') );
		add_image_size( 'visapass-post-thumb', 500, 350, array('center','center') );
		add_image_size( 'visapass-case-thumb', 700, 544, array('center','center') );
	}
endif;
add_action( 'after_setup_theme', 'visapass_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function visapass_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'visapass_content_width', 640 );
}
add_action( 'after_setup_theme', 'visapass_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function visapass_widgets_init() {

	$footer_style_2_switch = get_theme_mod('footer_style_2_switch', false );

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'visapass' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget mb-45 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar__widget--title mb-30">',
		'after_title'   => '</h3>',
	) );

	$footer_widgets = get_theme_mod('footer_widget_number', 4);

    // default footer 
	for( $num=1; $num <= $footer_widgets; $num++ ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer '. $num, 'visapass'),
			'id'            => 'footer-'. $num,
			'before_widget' => '<div id="%1$s" class="footer__widget footer-col-'. $num.' mb-30 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer__widget-title mb-25">',
			'after_title'   => '</h3>',
		) );			
	}


	// footer 2
	if ( $footer_style_2_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Style 2: '. $num, 'visapass'),
				'id'            => 'footer-2-'. $num,
				'description'   => esc_html__( 'Footer Style 2: '. $num, 'visapass' ),
				'before_widget' => '<div id="%1$s" class="footer-widget footer-2 footer-btm-mobile %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="footer-widget__title mb-25">',
				'after_title'   => '</h3>',
			) );			
		}
	}

	/**
	* Service Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Service Sidebar', 'visapass' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'visapass' ),
			'before_widget' => '<div class="service_categories grey-bg %2$s" data-wow-delay=".3s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="bs-widget-title pl-20">',
			'after_title' 	=> '</h4>',
		)
	);	
	/**
	* Country Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Country Sidebar', 'visapass' ),
			'id' 			=> 'countries-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Country Details Sidebar.', 'visapass' ),
			'before_widget' => '<div class="service_categories grey-bg %2$s" data-wow-delay=".3s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="bs-widget-title pl-20">',
			'after_title' 	=> '</h4>',
		)
	);
}
add_action( 'widgets_init', 'visapass_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

define('VISAPASS_THEME_DIR', get_template_directory());
define('VISAPASS_THEME_URI', get_template_directory_uri());
define('VISAPASS_THEME_CSS_DIR', VISAPASS_THEME_URI . '/assets/css/');
define('VISAPASS_THEME_JS_DIR', VISAPASS_THEME_URI . '/assets/js/');
define('VISAPASS_THEME_INC', VISAPASS_THEME_DIR . '/inc/');

/** 
 * visapass_scripts description
 * @return [type] [description]
 */
function visapass_scripts() {

	/**
	* all css files
	*/

	wp_enqueue_style( 'visapass-fonts', visapass_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'bootstrap', VISAPASS_THEME_CSS_DIR.'bootstrap.min.css', array() );
    wp_enqueue_style( 'animate', VISAPASS_THEME_CSS_DIR.'animate.min.css', array() );
    wp_enqueue_style( 'custom-animation', VISAPASS_THEME_CSS_DIR.'custom-animation.css', array() );
    wp_enqueue_style( 'magnific-popup', VISAPASS_THEME_CSS_DIR.'magnific-popup.css', array() );
	wp_enqueue_style( 'fontawesome5pro', VISAPASS_THEME_CSS_DIR.'fontAwesome5Pro.css', array() );
    wp_enqueue_style( 'meanmenu', VISAPASS_THEME_CSS_DIR.'meanmenu.css', array() );
    wp_enqueue_style( 'flaticon', VISAPASS_THEME_CSS_DIR.'flaticon.css', array() );
	wp_enqueue_style( 'nice-select', VISAPASS_THEME_CSS_DIR.'nice-select.css', array() );
	wp_enqueue_style( 'venobox', VISAPASS_THEME_CSS_DIR.'venobox.min.css', array() );
    wp_enqueue_style( 'backtotop', VISAPASS_THEME_CSS_DIR.'backToTop.css', array() );
    wp_enqueue_style( 'slick', VISAPASS_THEME_CSS_DIR.'slick.css', array() );
    wp_enqueue_style( 'owl-carousel', VISAPASS_THEME_CSS_DIR.'owl.carousel.min.css', array() );
    wp_enqueue_style( 'swiper-bundle', VISAPASS_THEME_CSS_DIR.'swiper-bundle.css', array() );
	wp_enqueue_style( 'default', VISAPASS_THEME_CSS_DIR.'default.css', array() );
    wp_enqueue_style( 'visapass-core', VISAPASS_THEME_CSS_DIR.'visapass-core.css', array(), time() );
	wp_enqueue_style( 'visapass-unit', VISAPASS_THEME_CSS_DIR.'visapass-unit.css', array(), time() );
	wp_enqueue_style( 'visapass-style', get_stylesheet_uri() );
    wp_enqueue_style( 'visapass-responsive', VISAPASS_THEME_CSS_DIR.'responsive.css', array() );
	
	

 
	// all js
	wp_enqueue_script( 'bootstrap-bundle', VISAPASS_THEME_JS_DIR.'bootstrap.bundle.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'isotope-pkgd', VISAPASS_THEME_JS_DIR.'isotope.pkgd.min.js', array('imagesloaded'), '', true );
    wp_enqueue_script( 'jquery-slick', VISAPASS_THEME_JS_DIR.'slick.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'swiper-bundle', VISAPASS_THEME_JS_DIR.'swiper-bundle.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-nice-select', VISAPASS_THEME_JS_DIR.'jquery.nice-select.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-venobox', VISAPASS_THEME_JS_DIR.'venobox.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-backtotop', VISAPASS_THEME_JS_DIR.'backToTop.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-meanmenu', VISAPASS_THEME_JS_DIR.'jquery.meanmenu.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'waypoints', VISAPASS_THEME_JS_DIR.'waypoints.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-counterup', VISAPASS_THEME_JS_DIR.'jquery.counterup.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', VISAPASS_THEME_JS_DIR.'owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-magnific-popup', VISAPASS_THEME_JS_DIR.'jquery.magnific-popup.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'wow', VISAPASS_THEME_JS_DIR.'wow.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'visapass-main', VISAPASS_THEME_JS_DIR.'main.js', array('jquery'), false, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'visapass_scripts' );

/*
Register Fonts
*/
/*
Register Fonts
*/

function visapass_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'visapass' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Roboto:wght@400;500;700;900');
    }
    return $font_url;
}

// wp_body_open
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
            do_action( 'wp_body_open' );
    }
}

/**
 * Implement the Custom Header feature.
 */
require VISAPASS_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require VISAPASS_THEME_INC . 'template-functions.php';

if (  function_exists('tutor') ) {
    require VISAPASS_THEME_INC . 'visapass-tutor.php';
}

/**
 * Custom template helper function for this theme.
 */
require VISAPASS_THEME_INC . 'template-helper.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require VISAPASS_THEME_INC . 'jetpack.php';
}

/**
* include visapass functions file
*/
require_once VISAPASS_THEME_INC . 'class-breadcrumb.php';
require_once VISAPASS_THEME_INC . 'class-navwalker.php';
require_once VISAPASS_THEME_INC . 'class-visapass-kirki.php';
require_once VISAPASS_THEME_INC . 'kirki-customizer.php';
require_once VISAPASS_THEME_INC . 'class-tgm-plugin-activation.php';
require_once VISAPASS_THEME_INC . 'add_plugin.php';



/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function visapass_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'visapass_pingback_header' );


/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'visapass_comment_form_default_fields_func');

function visapass_comment_form_default_fields_func($default){

	$default['author'] = '<div class="row">
    <div class="col-xl-6 col-md-6">
    	<div class="post-input">
        	<input type="text" name="author" placeholder="'.esc_attr__('Your Name','visapass').'">
        </div>
    </div>';
	$default['email'] = '<div class="col-xl-6 col-md-6">
		<div class="post-input">
        <input type="text" name="email" placeholder="'.esc_attr__('Your Email','visapass').'">
    	</div>
    </div>';
	// $default['url'] = '';
	$defaults['comment_field'] = '';

	$default['url'] = '<div class="col-xl-12">
		<div class="post-input">
        <input type="text" name="url" placeholder="'.esc_attr__('Website','visapass').'">
    	</div>
    </div>';
	return $default;
}

add_action( 'comment_form_top', 'visapass_add_comments_textarea' );
function visapass_add_comments_textarea()
{
	if( !is_user_logged_in() ){
    echo '<div class="row"><div class="col-xl-12"><div class="post-input"><textarea id="comment" name="comment" cols="60" rows="6" placeholder="'.esc_attr__('Write your comment here...','visapass').'" aria-required="true"></textarea></div></div></div>';
	}
}

add_filter('comment_form_defaults', 'visapass_comment_form_defaults_func');

function visapass_comment_form_defaults_func($info){
	if( !is_user_logged_in() ){
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div>';
	}else {
		$info['comment_field'] = '<div class="post-input"><textarea id="comment" name="comment" cols="30" rows="10" placeholder="'.esc_attr__('Comment *','visapass').'"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<div class="col-xl-12"><button class="theme-btn" type="submit">'.esc_html__('Post Comment','visapass').' </button></div>';

	$info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}

if( !function_exists('visapass_comment') ) {
	function visapass_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$args['reply_text'] = '<i class="fal fa-reply"></i> Reply';
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>">
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}



/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'visapass_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function visapass_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}


// visapass_search_filter_form
if( !function_exists('visapass_search_filter_form')) {
  function visapass_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<div class="sidebar--widget__search"><form class="sidebar-search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="far fa-search"></i>  </button>
		</form></div>',
		esc_url( home_url('/') ),
		esc_attr( get_search_query() ),
		esc_html__('Search','visapass')
	);

    return $form;
  }
  add_filter( 'get_search_form','visapass_search_filter_form');
}

add_action('admin_enqueue_scripts', 'visapass_admin_custom_scripts');

function visapass_admin_custom_scripts() {
	wp_enqueue_media();
	wp_register_script('visapass-admin-custom', get_template_directory_uri().'/inc/js/admin_custom.js', array('jquery'), '', true);
	wp_enqueue_script('visapass-admin-custom');
}

function visapass_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}