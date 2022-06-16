<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package visapass
 */

/**
*
* visapass elements header
*/
function visapass_element_header_style($template_id) { ?>
    <div class="header-area">
        <div class="custom-container">
            <?php echo \BdevsElement::$elementor_instance->frontend->get_builder_content($template_id, true); ?>
        </div>
    </div>
<?php
}


function visapass_check_header() {
    $visapass_element_header_switch = get_theme_mod('visapass_element_header_switch', false );
    if(!empty($visapass_element_header_switch)) {
        $element_header_styles = function_exists('get_field') ? get_field( 'element_header_styles' ) : NULL;
        if (!empty($element_header_styles->ID)) {
            visapass_element_header_style($element_header_styles->ID);
        }
        else{
            $template_id = get_theme_mod('choose_default_header_el' );
            visapass_element_header_style($template_id);
        }
    }
    else {
        $visapass_header_style = function_exists('get_field') ? get_field( 'header_style' ) : NULL;
        $visapass_default_header_style = get_theme_mod('choose_default_header', 'header-style-1' );

        if( $visapass_header_style == 'header-style-1' ) {
            visapass_header_style_1();
        }  
            /** default header style **/
            else {
                visapass_header_style_1();
            }
    }
    

}
add_action('visapass_header_style', 'visapass_check_header', 10);

/**
* header style 1 default
*/

function visapass_header_style_1() {
    $visapass_topbar_switch = get_theme_mod('visapass_topbar_switch', false);
    $visapass_side_hide = get_theme_mod('visapass_side_hide', false);
    $visapass_show_cta = get_theme_mod('visapass_show_cta', false);
    $visapass_showheader_search = get_theme_mod('visapass_showheader_search' , false);

    $visapass_email = get_theme_mod('visapass_email', __('info@example.com','visapass'));
    $visapass_extra_mail = get_theme_mod('visapass_extra_mail', __('support@gmail.com','visapass'));
    $visapass_extra_phone = get_theme_mod('visapass_extra_phone', __('+1 878 298 023','visapass'));
    $visapass_time_text = get_theme_mod('visapass_time_text', __('Opening Time','visapass'));
    $visapass_time = get_theme_mod('visapass_time', __('8:30 AM - 9:30 PM','visapass'));
    $visapass_address = get_theme_mod('visapass_address', __('Our Location','visapass'));
    $visapass_address_link = get_theme_mod('visapass_address_link', __('#','visapass'));
    $visapass_extra_address = get_theme_mod('visapass_extra_address', __('Office Address','visapass'));
    $visapass_extra_address_link = get_theme_mod('visapass_extra_address_link', __('#','visapass'));
    $visapass_apply_btn = get_theme_mod('visapass_apply_btn', __('Apply Now','visapass'));
    $visapass_apply_link = get_theme_mod('visapass_apply_link', __('#','visapass'));
    $visapass_mcontact_text = get_theme_mod('visapass_mcontact_text', __('Contact Us','visapass'));
    $visapass_mcontact_cell = get_theme_mod('visapass_mcontact_cell', __('(555) 5802 3059','visapass'));


    $visapass_header_right = get_theme_mod('visapass_header_right', false);
    $visapass_menu_col =  $visapass_header_right ? 'col-xxl-7 col-xl-7 col-lg-7 col-6 justify-content-end' : 'col-xxl-10 col-xl-10 col-lg-10 col-6 d-flex align-items-center justify-content-end';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('visapass_button_text_rtl', __('Get Quote','visapass'));
    }
    else { 
        $btn_text = get_theme_mod('visapass_button_text', __('Get A Quote','visapass'));
    }
    
    $btn_link = get_theme_mod('visapass_button_link', __('#','visapass'));

    ?>


<!-- header area start here -->
<header class="common-header">
<?php if(!empty($visapass_topbar_switch)) : ?>
    <div class="header-top">
        <div class="container">
             <div class="row align-items-center">
                 <div class="col-xxl-8 col-lg-6">
                     <div class="header-top-left">
                         <ul>
                             <li><span> <?php print esc_html($visapass_time_text); ?> </span> <?php print esc_html($visapass_time); ?> </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xxl-4 col-lg-6">
                     <div class="topheader-info">
                         <div class="top-button f-right ">
                         <?php if(!empty($visapass_apply_btn)) : ?>
                             <a href="<?php print esc_url($visapass_apply_link); ?>"><?php print esc_html($visapass_apply_btn); ?></a>
                         <?php endif; ?>
                         </div>
                         <?php visapass_header_lang_defualt(); ?>
                         <div class="header-location f-right mr-20">
                             <ul>
                                <?php if(!empty($visapass_address)) : ?>
                                 <li><i class="flaticon-pin"></i><a target="_blank" href="<?php print esc_url($visapass_address_link); ?>"><?php print esc_html($visapass_address); ?></a></li>
                                <?php endif; ?>
                             </ul>
                         </div>
                     </div>                  
                 </div>
             </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="header-menu header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-6">
                    <div class="logo">
                         <?php visapass_header_logo(); ?>
                    </div>
                </div>
                <div class="<?php print esc_attr($visapass_menu_col); ?>">
                    <div class="main-menu d-none d-lg-block ">
                        <nav id="mobile-menu">
                            <?php visapass_header_menu(); ?>
                        </nav>
                    </div>
                    <div class="side-menu-icon d-lg-none text-end">
                        <button class="side-toggle"><i class="far fa-bars"></i></button>
                    </div>
                </div>
                <?php if(!empty($visapass_header_right)) : ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3">
                        <div class="main-menu-wrapper d-flex align-items-center justify-content-end">
                            <?php if(!empty($visapass_showheader_search)) : ?>
                                <div class="main-menu-wrapper__search text-left">
                                    <a class="search-btn nav-search search-trigger" href="#"><i class="fal fa-search"></i></a>
                                </div>
                             <?php endif; ?>
                            <?php if(!empty($visapass_mcontact_cell)) : ?>
                                <div class="main-menu-wrapper__call-number d-flex align-items-center">
                                    <div class="main-menu-wrapper__call-icon mr-10">
                                        <a href="tel:<?php print esc_url($visapass_mcontact_cell); ?>"><i class="fad fa-comments-alt"></i></a>
                                    </div>
                                    <div class="main-menu-wrapper__call-text">
                                        <span><?php print esc_html($visapass_mcontact_text); ?></span>
                                        <h5><a href="tel:<?php print esc_url($visapass_mcontact_cell); ?>"><?php print esc_html($visapass_mcontact_cell); ?></a></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<div class="offcanvas-overlay"></div>
<div class="fix">
    <div class="side-info">
        <button class="side-info-close"><i class="fal fa-times"></i></button>
        <div class="side-info-content">
            <div class="mobile-menu"></div>
            <?php if(!empty($visapass_side_hide)) : ?>
            <div class="contact-infos mt-30 mb-30">
            <div class="contact-list mobile_contact mb-30">
                <h4>Contact Info</h4>
                <a href="<?php print esc_url($visapass_extra_address_link); ?>" class="theme-1"><i class="fal fa-map-marker-alt"></i><span><?php print esc_html($visapass_extra_address); ?></span></a>
                <a href="callto:<?php print esc_url($visapass_extra_phone); ?>" class="theme-2"><i class="fal fa-phone"></i><span><?php print esc_html($visapass_extra_phone); ?> </span></a>
                <a href="mailto:<?php print esc_url($visapass_extra_mail); ?>" class="theme-3"><i class="far fa-envelope"></i><span><?php print esc_html($visapass_extra_mail); ?></span></a> 
            </div>
            <div class="top_social offset_social mt-20 mb-30">
                 <?php echo visapass_mobile_social_profiles(); ?>
            </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>
</header>

 <!-- Header style 1 end -->

    <?php visapass_extra_info(); ?>

<?php 
}


/** 
 * [visapass_extra_info description]
 * @return [type] [description]
 */
function visapass_extra_info(){


    // about title
    $visapass_extra_about_text     = get_theme_mod('visapass_extra_about_text', __('We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain was born and I will give you a completed accounts of the system and expound.','visapass'));
    $visapass_extra_button     = get_theme_mod('visapass_extra_button', __('Contact Us','visapass'));
    $visapass_extra_button_url     = get_theme_mod('visapass_extra_button_url', __('#','visapass'));

    // address
    $visapass_extra_address     = get_theme_mod('visapass_extra_address', __('Ave 14th Street, Mirpur 210, San Franciso, USA 3296.','visapass'));

    // phone 
    $visapass_extra_phone   = get_theme_mod('visapass_extra_phone', __('(+642) 394 396 432','visapass'));

    // email 
    $visapass_extra_mail  = get_theme_mod('visapass_extra_mail', __('support@visapass.com','visapass'));
    
?>


<?php }


/** 
 * [visapass_header_lang description]
 * @return [type] [description]
 */
function visapass_header_lang_defualt() {
    $visapass_header_lang            = get_theme_mod('visapass_header_lang',false);
    if( $visapass_header_lang ): ?>


    <li class="language"><?php print esc_html__('Eng', 'visapass'); ?></a>
    <?php do_action('visapass_language'); ?>
    </li>


    <?php endif; ?>
<?php 
}

/** 
 * [visapass_language_list description]
 * @return [type] [description]
 */
function visapass_language($mar) {
        return $mar;
}
function visapass_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul>';
            foreach($languages as $lan){
                $active = $lan['active']==1?'active':'';
                $mar .= '<a class="'.$active.'" href="'.$lan['url'].'">'.$lan['translated_name'].'</a>';
            }
        $mar .= '</ul>';
    }else{
        //remove this code when send themeforest reviewer team
        $mar .= '<div class="header-language f-right">';
        $mar .= '<select>';
            $mar .= '<option>'.esc_html__('English','visapass').'</option>';
            $mar .= '<option>'.esc_html__('Ban','visapass').'</option>';
            $mar .= '<option>'.esc_html__('Jap','visapass').'</option>';
            $mar .= '<option>'.esc_html__('Rus','visapass').'</option>';
        $mar .= ' </select>';
        $mar .= ' </div>';
    }
    print visapass_language($mar);
}
add_action('visapass_language','visapass_language_list');

// header logo
function visapass_header_logo() {
    ?>
        <?php 
        $visapass_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
        $visapass_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
        $visapass_logo_black = get_template_directory_uri() . '/assets/img/logo/logo.png';

        $visapass_site_logo = get_theme_mod('logo', $visapass_logo);
        $visapass_secondary_logo = get_theme_mod('seconday_logo', $visapass_logo_black);
        ?>
         
        <?php
        if( has_custom_logo()){
            the_custom_logo();
        }else{
            
            if( !empty($visapass_logo_on) ) { ?>
                <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                    <img src="<?php print esc_url($visapass_secondary_logo); ?>" alt="<?php print esc_attr__('logo','visapass'); ?>" />
                </a>
            <?php 
            }
            else{ ?>
                <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                    <img src="<?php print esc_url($visapass_site_logo); ?>" alt="<?php print esc_attr__('logo','visapass'); ?>" />
                </a>
            <?php 
            }
        }   
        ?>
    <?php 
} 

// header logo
function visapass_header_sticky_logo() {
    ?>
        <?php 
        $visapass_logo = get_template_directory_uri() . '/assets/images/logo/logo-gradient.png';

        $visapass_site_logo = get_theme_mod('logo_sticky', $visapass_logo);
        ?>
         
        <?php
        if( has_custom_logo()){
            the_custom_logo();
        }else{?>
            
            <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($visapass_site_logo); ?>" alt="<?php print esc_attr__('logo','visapass'); ?>" />
            </a>
           <?php 
            
        }   
        ?>
    <?php 
} 



/** 
 * [visapass_header_social_profiles description]
 * @return [type] [description]
 */
function visapass_header_social_profiles() {
    $visapass_topbar_fb_url             = get_theme_mod('visapass_topbar_fb_url', __('#','visapass'));
    $visapass_topbar_twitter_url       = get_theme_mod('visapass_topbar_twitter_url', __('#','visapass'));
    $visapass_topbar_instagram_url      = get_theme_mod('visapass_topbar_instagram_url', __('#','visapass'));
    $visapass_topbar_linkedin_url      = get_theme_mod('visapass_topbar_linkedin_url', __('#','visapass'));
    $visapass_topbar_youtube_url        = get_theme_mod('visapass_topbar_youtube_url', __('#','visapass'));
    ?> 
      <ul> 
         <li class="header--social">
             <?php if (!empty($visapass_topbar_fb_url)): ?>
               <a href="<?php print esc_url($visapass_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
             <?php endif; ?>

             <?php if (!empty($visapass_topbar_twitter_url)): ?>
                 <a href="<?php print esc_url($visapass_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
             <?php endif; ?>

             <?php if (!empty($visapass_topbar_instagram_url)): ?>
                 <a href="<?php print esc_url($visapass_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
             <?php endif; ?>

             <?php if (!empty($visapass_topbar_linkedin_url)): ?>
                 <a href="<?php print esc_url($visapass_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
             <?php endif; ?>        

             <?php if (!empty($visapass_topbar_youtube_url)): ?>
                 <a href="<?php print esc_url($visapass_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
             <?php endif; ?>
         </li>
      </ul>
<?php 
}

// visapass_mobile_social_profiles
function visapass_mobile_social_profiles() {
    $visapass_topbar_fb_url             = get_theme_mod('visapass_topbar_fb_url', __('#','visapass'));
    $visapass_topbar_twitter_url       = get_theme_mod('visapass_topbar_twitter_url', __('#','visapass'));
    $visapass_topbar_instagram_url      = get_theme_mod('visapass_topbar_instagram_url', __('#','visapass'));
    $visapass_topbar_linkedin_url      = get_theme_mod('visapass_topbar_linkedin_url', __('#','visapass'));
    $visapass_topbar_youtube_url        = get_theme_mod('visapass_topbar_youtube_url', __('#','visapass'));
    ?> 
    <?php if (!empty($visapass_topbar_fb_url)): ?>
      <a href="<?php print esc_url($visapass_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
    <?php endif; ?>

    <?php if (!empty($visapass_topbar_twitter_url)): ?>
        <a href="<?php print esc_url($visapass_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
    <?php endif; ?>

    <?php if (!empty($visapass_topbar_instagram_url)): ?>
        <a href="<?php print esc_url($visapass_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
    <?php endif; ?>

    <?php if (!empty($visapass_topbar_linkedin_url)): ?>
        <a href="<?php print esc_url($visapass_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
    <?php endif; ?>        

    <?php if (!empty($visapass_topbar_youtube_url)): ?>
        <a href="<?php print esc_url($visapass_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
    <?php endif; ?>
<?php 
}

// visapass_footer_social_profiles
function visapass_footer_social_profiles() {
    $visapass_footer_fb_url             = get_theme_mod('visapass_footer_fb_url', __('#','visapass'));
    $visapass_footer_twitter_url       = get_theme_mod('visapass_footer_twitter_url', __('#','visapass'));
    $visapass_footer_linkedin_url      = get_theme_mod('visapass_footer_linkedin_url', __('#','visapass'));
    $visapass_footer_instagram_url      = get_theme_mod('visapass_footer_instagram_url', __('#','visapass'));
    $visapass_footer_youtube_url        = get_theme_mod('visapass_footer_youtube_url', __('#','visapass'));
    ?> 
    <?php if (!empty($visapass_footer_fb_url)): ?>
      <a href="<?php print esc_url($visapass_footer_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
    <?php endif; ?>

    <?php if (!empty($visapass_footer_twitter_url)): ?>
        <a href="<?php print esc_url($visapass_footer_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
    <?php endif; ?>

    <?php if (!empty($visapass_footer_instagram_url)): ?>
        <a href="<?php print esc_url($visapass_footer_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
    <?php endif; ?>

    <?php if (!empty($visapass_footer_linkedin_url)): ?>
        <a href="<?php print esc_url($visapass_footer_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
    <?php endif; ?>        

    <?php if (!empty($visapass_footer_youtube_url)): ?>
        <a href="<?php print esc_url($visapass_footer_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
    <?php endif; ?>
<?php 
}


/** 
 * [visapass_header_menu description]
 * @return [type] [description]
 */
function visapass_header_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Visapass_Navwalker_Class::fallback',
                'walker'            => new Visapass_Navwalker_Class
            ));
           ?>
    <?php 
}

/**
 * [visapass_header_menu description]
 * @return [type] [description]
 */
function visapass_mobile_menu() { ?>
    <?php
    $visapass_menu = wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false
    ) );

    $visapass_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $visapass_menu );
    echo wp_kses_post( $visapass_menu );
    ?>
    <?php
}

/** 
 * [visapass_footer_menu description]
 * @return [type] [description]
 */
function visapass_top_menu() { 
    wp_nav_menu(array(
        'theme_location'    => 'top-menu',
        'menu_class'        => 'm-0',
        'container'         => '',
        'fallback_cb'       => 'Visapass_Navwalker_Class::fallback',
        'walker'            => new Visapass_Navwalker_Class
    ));
}




/**
*
* visapass elements footer
*/
function visapass_element_footer_style($template_id) { ?>
    <div class="el-footer-area">
        <?php echo \BdevsElement::$elementor_instance->frontend->get_builder_content($template_id, true); ?>
    </div>
<?php
}

/**
*
* visapass footer
*/
function visapass_check_footer() {
    $visapass_element_footer_switch = get_theme_mod('visapass_element_footer_switch', false );
    if(!empty($visapass_element_footer_switch)) {
        $element_footer_styles = function_exists('get_field') ? get_field( 'element_footer_styles' ) : NULL;
        if (!empty($element_footer_styles->ID)) {
            visapass_element_footer_style($element_footer_styles->ID);
        }
        else{
            $template_id = get_theme_mod('choose_default_footer_el' );
            visapass_element_footer_style($template_id);
        }
    }
    else{
        $visapass_footer_style = function_exists('get_field') ? get_field( 'footer_style' ) : NULL;
        $visapass_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1' );
       
        if( $visapass_footer_style == 'footer-style-1' ) {
            visapass_footer_style_1();
        }    
        elseif( $visapass_footer_style == 'footer-style-2' ) {
            visapass_footer_style_2();
        } 
        else{

            /** default footer style **/
            if($visapass_default_footer_style == 'footer-style-2') {
               visapass_footer_style_2();
            } 
            else {
                visapass_footer_style_1();
            }

        }
    }
}
add_action('visapass_footer_style', 'visapass_check_footer', 10);

/**
* footer 1 style_defaut
*/
function visapass_footer_style_1() {
    $footer_bg_img = get_theme_mod('visapass_footer_bg');
    $visapass_footer_social_profiles = get_theme_mod('visapass_footer_social_profiles',false);
    $visapass_footer_right = get_theme_mod('visapass_footer_right',false);

    $visapass_copyright_cell_text = get_theme_mod('visapass_copyright_cell_text', __('Call - Or - SMS','visapass'));
    $visapass_copyright_cell_number = get_theme_mod('visapass_copyright_cell_number', __('+1 878 298 023','visapass'));


    // var_dump($visapass_footer_social_profiles)
    $visapass_copyright_center = $visapass_footer_social_profiles ? 'col-md-6' : 'col-md-12 text-center';
    $visapass_copyright_center_text = $visapass_footer_right ? 'col-xxl-8 col-xl-8 col-lg-8 col-md-6' : 'col-md-12 text-center';

    $visapass_footer_bg_url_from_page = function_exists('get_field') ? get_field('visapass_footer_bg') : '';
    $visapass_footer_bg_color_from_page = function_exists('get_field') ? get_field('visapass_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('visapass_footer_bg_color');
    $footer_style_2_switch = get_theme_mod('footer_style_2_switch');
    
    // bg image
    $bg_img = !empty($visapass_footer_bg_url_from_page['url']) ? $visapass_footer_bg_url_from_page['url'] : $footer_bg_img;  
    // bg color
    $bg_color = !empty($visapass_footer_bg_color_from_page) ? $visapass_footer_bg_color_from_page : $footer_bg_color;  

    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-'. $num ) ){
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-lg-3 col-sm-6 footer-col-1';
        $footer_class[2] = 'col-lg-3 col-sm-6 footer-col-2';
        $footer_class[3] = 'col-lg-3 col-sm-6 footer-col-3';
        $footer_class[4] = 'col-lg-3 col-sm-6 footer-col-4';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>
     
 <!-- footer area start -->
 <footer>
    <div class="footer__area footer-bg2 " data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
    <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
        <div class="footer-top pt-95 pb-70">
            <div class="container">
                <div class="row">
                <?php
                        if ( $footer_columns < 4 ) {     
                            print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 footer-col-1">';
                            dynamic_sidebar( 'footer-1');
                            print '</div>';
                        
                            print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 footer-col-2">';
                            dynamic_sidebar( 'footer-2');
                            print '</div>';
                        
                            print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 footer-col-3">';
                            dynamic_sidebar( 'footer-3');
                            print '</div>'; 

                            print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">';
                            dynamic_sidebar( 'footer-4');
                            print '</div>';       
                        }
                        else{
                                for( $num=1; $num <= $footer_columns; $num++ ) {
                                    if ( !is_active_sidebar( 'footer-'. $num ) ) continue;
                                    print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                    dynamic_sidebar( 'footer-'. $num );
                                    print '</div>';
                                }  
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<div class="footer-coptright theme-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="<?php print esc_attr($visapass_copyright_center_text); ?>">
                <div class="footer__text pt-35 pb-35">
                <p class="white-color"><?php print visapass_copyright_text(); ?></p>
                </div>
            </div>
            <?php if (!empty($visapass_footer_right) ) : ?>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                <div class="footer-copyright__wrapper footer-copyright__wrapper2">
                    <div class="footer-call d-flex align-items-center">
                        <div class="footer-copyright__wrapper__icon mr-10">
                           <a href="tel:<?php print esc_url($visapass_copyright_cell_number); ?>"> <i class="fal fa-headset"></i></a>
                        </div>
                        <div class="footer-copyright__wrapper__call-number">
                            <span><?php print esc_html($visapass_copyright_cell_text); ?></span>
                            <h5><a href="tel:<?php print esc_url($visapass_copyright_cell_number); ?>"><?php print esc_html($visapass_copyright_cell_number); ?></a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</footer>



<?php 
}
/**
* footer  style 2
*/
function visapass_footer_style_2() {

    $footer_bg_img = get_theme_mod('visapass_footer_bg');
    $visapass_copyright_cell_text = get_theme_mod('visapass_copyright_cell_text', __('Call - Or - SMS','visapass'));
    $visapass_copyright_cell_number = get_theme_mod('visapass_copyright_cell_number', __('+1 878 298 023','visapass'));
    $visapass_terms_condition_text = get_theme_mod('visapass_terms_condition_text',__('Terms & Condition','visapass'));
    $visapass_terms_condition_link = get_theme_mod('visapass_terms_condition_link', __('#','visapass'));
    $visapass_privacy_policy_text = get_theme_mod('visapass_privacy_policy_text',__('Privacy Policy','visapass'));
    $visapass_privacy_policy_url = get_theme_mod('visapass_privacy_policy_url',__('#','visapass'));
    $visapass_footer_newsletter_text = get_theme_mod('visapass_footer_newsletter_text',__('Get More Update Join Our Newsletters','visapass'));
    $visapass_footer_newslatters = get_theme_mod('visapass_footer_newslatters',false);
    $visapass_footer_left = get_theme_mod('visapass_footer_left',false);

    $copyright_space = $visapass_copyright_cell_text && $visapass_terms_condition_text && $visapass_privacy_policy_text ? '': 'p-3';

    $visapass_footer_bg_url_from_page = function_exists('get_field') ? get_field('visapass_footer_bg') : '';
    $visapass_footer_bg_color_from_page = function_exists('get_field') ? get_field('visapass_footer_bg_color') : '';
    $footer_style_2_switch = get_theme_mod('footer_style_2_switch');

    $footer_bg_color = get_theme_mod('visapass_footer_bg_color');
    
    // bg image
    $bg_img = !empty($visapass_footer_bg_url_from_page['url']) ? $visapass_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($visapass_footer_bg_color_from_page) ? $visapass_footer_bg_color_from_page : $footer_bg_color;   

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-2-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-lg-4 col-sm-6 footer-col-2-1';
        $footer_class[2] = 'col-lg-2 col-sm-6 footer-col-2-2';
        $footer_class[3] = 'col-lg-3 col-sm-6 footer-col-2-3';
        $footer_class[4] = 'col-lg-3 col-sm-6 footer-col-2-4';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }  

?>

    <!-- footer area start here -->
 <footer>
    <div class="footer-area footer-bg"  data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <?php if ( is_active_sidebar('footer-2-1') OR is_active_sidebar('footer-2-2') OR is_active_sidebar('footer-2-3') OR is_active_sidebar('footer-2-4') ): ?>
            <div class="footer2-top pt-95">
                <div class="container">
                    <div class="row">
                    <?php
                                if ( $footer_columns < 4 ) {     
                                    print '<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 footer-col-2-1">';
                                    dynamic_sidebar( 'footer-2-1');
                                    print '</div>';
                                
                                    print '<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 footer-col-2-2">';
                                    dynamic_sidebar( 'footer-2-2');
                                    print '</div>';
                                
                                    print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 footer-col-2-3">';
                                    dynamic_sidebar( 'footer-2-3');
                                    print '</div>'; 

                                    print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 footer-col-2-4">';
                                    dynamic_sidebar( 'footer-2-4');
                                    print '</div>';       
                                }
                                else{
                                        for( $num=1; $num <= $footer_columns; $num++ ) {
                                            if ( !is_active_sidebar( 'footer-2-'. $num ) ) continue;
                                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                            dynamic_sidebar( 'footer-2-'. $num );
                                            print '</div>';
                                        }  
                                    }
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

<!-- Footer Copy right start -->
<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <?php if (!empty($visapass_footer_left) ) : ?>
                        <div class="footer-copyright__wrapper footer-copyright-home dis-none d-flex align-items-center theme-bg">
                            <div class="footer-copyright__wrapper__icon mr-10">
                            <a href="tel:<?php print esc_url($visapass_copyright_cell_number); ?>"><i class="fal fa-headset"></i></a> 
                            </div>
                            <div class="footer-copyright__wrapper__call-number copy-right-cell">
                                <span><?php print esc_html($visapass_copyright_cell_text); ?></span>
                                <h5><a href="tel:<?php print esc_url($visapass_copyright_cell_number); ?>"><?php print esc_html($visapass_copyright_cell_number); ?></a></h5>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
             <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                <?php if (!empty($visapass_footer_newslatters) ) : ?>
                    <div class="row subscribe-top align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                            <h4 class="copyright-title">
                                <?php print esc_html($visapass_footer_newsletter_text); ?>
                            </h4>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 ">
                            <div class="subscribe-footer">
                                <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                                    <input type="search" name="s" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr__(' Enter your email', 'visapass'); ?>">
                                    <button type="submit"><i class="fal fa-long-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                 <?php endif; ?>
                 <div class="row copyright-botom-padding align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="copyright-botom <?php echo esc_attr($copyright_space); ?>">
                            <p><?php print visapass_copyright_text(); ?></p>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="copyright-botom-right ">
                            <ul>
                                <li>
                                    <?php if (!empty($visapass_privacy_policy_text) ) : ?>
                                       <a href="<?php print esc_url($visapass_privacy_policy_url); ?>"><?php print esc_html($visapass_privacy_policy_text); ?></a>
                                   <?php endif; ?>
                                   <?php if (!empty($visapass_terms_condition_text) ) : ?>
                                       <a href="<?php print esc_url($visapass_terms_condition_link); ?>"><?php print esc_html($visapass_terms_condition_text); ?></a>
                                    <?php endif; ?>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                 </div>
             </div>
        </div>
    </div>
</div>
</footer>
<!-- Footer Copy right start -->


<?php 
}


// visapass_copyright_text
function visapass_copyright_text(){
    if( rtl_enable() ){
        print get_theme_mod('visapass_copyright_rtl', __('Copyright © 2022 BDevs. All Rights Reserved','visapass'));
    }
    else{
       print get_theme_mod('visapass_copyright', __('Copyright © 2022 BDevs. All Rights Reserved','visapass'));
    }
}





/** 
 * [visapass_breadcrumb_func description]
 * @return [type] [description]
 */
function visapass_breadcrumb_func() {

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','visapass'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','visapass'));
        $breadcrumb_show = 0;

    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_blog_title_details_rtl', __('Blog','visapass')); 
        else
            $title = get_the_title();
    }
    elseif ( is_single() && 'product' == get_post_type() ) { 
        $title = get_theme_mod('breadcrumb_product_details', __('Shop','visapass'));
    }   
    elseif ( is_single() && 'bdevs-services' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_department_details_rtl', __('Services','visapass'));
        else
            $title = get_the_title();
    }    
    elseif ( is_single() && 'bdevs-doctor' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_doctor_details_rtl', __('Doctor Details','visapass'));
        else
            $title = get_theme_mod('breadcrumb_doctor_details', __('Doctor Details','visapass'));

    }    
    elseif ( is_single() && 'bdevs-cases' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_case_study_details_rtl', __('Gallery','visapass'));
        else
            $title = get_the_title();

    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'visapass' ) . get_search_query();
    }
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'visapass' );
    }
    elseif ( function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop','visapass'));
    }
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }




    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb') : '';

    $_id = get_the_ID();
    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    } 
    // if ( is_single() && 'bdevs-services' == get_post_type() ) { 
    //     $_id = $post->ID;
    // } 
    elseif ( function_exists("is_shop") ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }


    
    if( empty($is_breadcrumb) && $breadcrumb_show == 1 ) { 

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';
        
        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');


        if( $hide_bg_img ){
            $bg_img = '';
        }
        else {
          $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;  
        } ?>

        <!-- page title area start -->
        <div class="page-title__area pt-110 <?php print esc_attr($breadcrumb_class); ?>" data-background="<?php print esc_attr($bg_img);?>">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page__title-wrapper text-center">
                            <h3 class="pb-100"><?php echo wp_kses_post( $title );?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadccrumb-bg text-center">
               <div class="container">
                   <div class="row">
                       <div class="col-xl-12">
                        <nav aria-label="breadcrumb">
                            <?php visapass_breadcrumb_callback();?>
                        </nav>
                       </div>
                   </div>
               </div>
            </div>
        </div>

        <!-- page title area end -->

        <?php 
    }
}
add_action('visapass_before_main_content', 'visapass_breadcrumb_func');


function visapass_breadcrumb_callback() {
    $args = array(
        'show_browse'   => false,
        'post_taxonomy' => array( 'product' =>'product_cat' )
    );
    $breadcrumb = new Visapass_Breadcrumb_Class( $args );
    
    return $breadcrumb->trail();
}


// visapass_search_form
function visapass_search_form() { ?>
    <!-- Fullscreen search -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fal fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                    <div class="search-field-holder">
                        <input type="search" name="s" class="main-search-input" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr__('Search Your Keyword...', 'visapass'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end fullscreen search -->
    <?php 
}

add_action('visapass_before_main_content', 'visapass_search_form');

/**
*
* pagination
*/
if( !function_exists('visapass_pagination') ) {

    function visapass_pagi_callback($pagination) {
        return $pagination;
    }

    //page navegation
    function visapass_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        
        if( $pages=='' ){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            
            if(!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        $pagi = '';
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
                        foreach ($paginations as $key => $pg) {
                            $pagi.= '<li>'.$pg.'</li>';
                        }
            $pagi .= '</ul>';
        }

        print visapass_pagi_callback($pagi);
    }
}

// rtl_enable
function rtl_enable(){
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable =get_theme_mod( 'rtl_switch',false);
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
        return true;
    }
    else {
        return false;
    }
}

// header top bg color
function visapass_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'visapass_breadcrumb_bg_color','#f4f9fc');
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('visapass-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_breadcrumb_bg_color');

// breadcrumb-spacing top
function visapass_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'visapass_breadcrumb_spacing','160px');
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('visapass-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_breadcrumb_spacing');

// breadcrumb-spacing bottom
function visapass_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'visapass_breadcrumb_bottom_spacing','160px');
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('visapass-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_breadcrumb_bottom_spacing');


// scrollup
function visapass_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'visapass_scrollup_switch', false);
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('visapass-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_scrollup_switch');


// Theme color
function visapass_custom_color(){
    $color_code = get_theme_mod( 'visapass_color_option','#ff5e14');
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".top-button a,.slider-active .slide-prev:hover, .slider-active .slide-next:hover, .theme-btn, .theme-bg, .features:hover .features__content,.famous-countries .owl-nav div i:hover, .countries-item__top-img-link a:hover, .calltoaction-btn .cl-btn:hover, .team-social a:hover, .testimonail-area .owl-carousel .owl-dots .active span, .footer-about-1 .social_links li a:hover, .subscribe-footer form button, .steps-box:hover i, .browse-box:hover, .testimonial-2 .owl-carousel .owl-dots .active span, .testimonial-2 .owl-nav div:hover i, .social ul li a:hover, .project-filter li.active, .visapass_duration_tag, .courses__meta ul li a:hover, .services-items a:hover, .business-btn:hover, .ab-tabs .nav-pills .nav-link.active, .nav-pills .show > .nav-link, .abtbs-round span, .team__details-social ul li a:hover, .cat-link ul li .active, .faq-tab .nav-pills .nav-link.active, .nav-pills .show > .nav-link, .sidebar__widget--title::before, .v_blog_btn, .basic-pagination ul li span.current, .basic-pagination ul li a:hover, .widget_tag_cloud .tagcloud a:hover, .ablog__text4 blockquote cite::before, .blog__deatails--tag a:hover, .contact__gpinfo:hover { background: ".$color_code."}";


        $custom_css .= ".main-menu-wrapper__call-icon a i, .main-menu-wrapper__call-number h5, .main-menu ul li:hover a, .main-menu ul li .sub-menu li:hover > a, .nav-search:hover, .about-span span, .fact h1, .fact h1 span, .countries-item__top-img-link a, .team__text-title:hover, .testimonail__wrapper__info__quotes i, .testimonail__wrapper__content__reviews ul li i, .blog-meta span i, .blog__content__title a:hover, .read-more a:hover, .footer-widget_menu-link-info li a i, .copyright-botom-right ul li a:hover, .about2__icon i,.steps-box__icon i, .features2__icon i,.features2:hover .read-more, .testimonail__footer ul li i,.blog2__content__title:hover, .project-filter li.active, .courses-content__title:hover, .accordion-button::after, .accordion-button:not(.collapsed)::after, .services-items a:hover, .factn-color span, .abfact-items span, .check-use a i, .play-btn i, .cat-link ul li a::before, .business__items-single i, .necessary__box ul li i, .business-btn, .information-info ul li:last-child span, .information-info ul li:last-child span:last-child, .breadcrumbs li span:hover, .abtb-content span, .beautiful-link ul li .active, .beautiful-link ul li a:hover, .sidebar--widget__search form button i, .rc-text h6:hover, .ablog__meta4 ul li a i, .ablog__meta ul li a:hover, .widget ul li a::before, .widget ul li a:hover, .v_blog_btn:hover, .ablog__text--title4:hover, .ablog__text4 blockquote::before, .contact__gpinfo-icon i, .progress-wrap::after  { color: ".$color_code."}";


        $custom_css .= ".main-menu ul li .sub-menu, .features:hover .features__content, .calltoaction-btn .cl-btn:hover, .footer-about-1 .social_links li a:hover, .steps-box__icon i, .features2:hover, .services-items a:hover, .business-btn, .ab-tabs .nav-pills .nav-link.active, .nav-pills .show > .nav-link, .faq-tab .nav-pills .nav-link.active, .nav-pills .show > .nav-link, .widget_tag_cloud .tagcloud a:hover, .blog__deatails--tag a:hover, .clto-btn-2:hover, .social ul li a:hover { border-color: ".$color_code."}";

        $custom_css .= ".ddd { border-color: ".$color_code." transparent transparent transparent}";
        wp_add_inline_style('visapass-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_custom_color');

// Prymary color
function visapass_primary_color(){
    $color_code = get_theme_mod( 'visapass_primary_color','#1A1C20');
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".top-button a:hover, .theme-btn:hover, .v_blog_btn:hover, .subscribe-footer form button:hover{ background: ".$color_code."}";

        $custom_css .= ".ddd{ color: ".$color_code."}";

        $custom_css .= ".dddddd{ border-color: ".$color_code."}";

        $custom_css .= ".ddd { border-color: transparent transparent ".$color_code." transparent;}";
        wp_add_inline_style('visapass-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_primary_color');

// Secondary color
function visapass_secondary_color(){
    $color_code = get_theme_mod( 'visapass_secondary_color','#D16C07');
    wp_enqueue_style( 'visapass-custom', VISAPASS_THEME_CSS_DIR . 'visapass-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".visa__items-single:hover, .footer-call{ background: ".$color_code."}";

        $custom_css .= ".ddd{ color: ".$color_code."}";

        $custom_css .= "ddd: ".$color_code."}";
        wp_add_inline_style('visapass-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'visapass_secondary_color');




// visapass_kses_intermediate
function visapass_kses_intermediate( $string = '' ) {
    return wp_kses( $string, visapass_get_allowed_html_tags( 'intermediate' ) );
}

function visapass_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
        'a' => [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => []
        ]
    ];

    return $allowed_html;
}