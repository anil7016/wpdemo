<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package visapass
 */

get_header();
?>

<div class="error-area pt-100 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
            	<?php
            		$visapass_error_404_text = get_theme_mod('visapass_error_404_text', __('404','visapass')); 
            		$visapass_error_title = get_theme_mod('visapass_error_title', __('Page not found','visapass')); 
            		$visapass_error_link_text = get_theme_mod('visapass_error_link_text', __('Back To Home','visapass')); 
            		$visapass_error_desc = get_theme_mod('visapass_error_desc',__('Please try searching for some other page.','visapass')); 
            	?>

				<div class="error__item text-center">
                  <div class="error__thumb mb-45">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/error/error.png" alt="img">
                  </div>
                  <div class="error__content">
                     <h3 class="error__title"><?php print esc_html( $visapass_error_title ); ?></h3>
                     <p><?php print esc_html( $visapass_error_desc ); ?></p>
                     <a href="<?php print esc_url(home_url('/')); ?>" class="theme-btn"><?php print esc_html($visapass_error_link_text); ?></a>
                  </div>
               </div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
