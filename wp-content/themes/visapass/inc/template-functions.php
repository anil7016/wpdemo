<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package visapass
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function visapass_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'visapass_body_classes' );

/**
 * Get tags.
 */
function visapass_get_tag() {
	$html = '';
	if(has_tag()) {
		$html .= '<div class="blog__deatails--tag"><span>'. esc_html__('Post Tags : ','visapass') .'</span>';
			$html .= get_the_tag_list('',' ','');
		$html .= '</div>';
	}
	return $html;
}


/**
 * Get categories.
 */
function visapass_get_category() {

$categories = get_the_category( get_the_ID() );
	$x = 0;
	foreach ($categories as $category){
		
	if($x==2){
		break;
	}	
	$x++;
	print '<a class="news-tag" href="' . get_category_link($category->term_id) . '">'  . $category->cat_name . '</a>';

	}
}


/** img alt-text **/
function visapass_img_alt_text( $img_er_id = null ){
	$image_id = $img_er_id;
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', false);
	$image_title = get_the_title($image_id);

	if( !empty($image_id) ){
		if($image_alt){
			$alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', false);
		}else{
			$alt_text = get_the_title($image_id);
		}	
	}else{
		$alt_text = esc_html__('Image Alt Text', 'visapass');
	}

	return $alt_text;
}





// visapass_ofer_sidebar_func
function visapass_offer_sidebar_func() {
	if(is_active_sidebar('offer-sidebar')){

		dynamic_sidebar( 'offer-sidebar');
	}
}
add_action('visapass_offer_sidebar','visapass_offer_sidebar_func',20);

// visapass_service_sidebar
function visapass_service_sidebar_func() {
	if(is_active_sidebar('services-sidebar')){

		dynamic_sidebar( 'services-sidebar');
	}
}
add_action('visapass_service_sidebar','visapass_service_sidebar_func',20);

// visapass_service_sidebar
function visapass_country_sidebar_func() {
	if(is_active_sidebar('countries-sidebar')){

		dynamic_sidebar( 'countries-sidebar');
	}
}
add_action('visapass_countries_sidebar','visapass_country_sidebar_func',20);


// visapass_portfolio_sidebar
function visapass_portfolio_sidebar_func() {
	if(is_active_sidebar('portfolio-sidebar')){

		dynamic_sidebar( 'portfolio-sidebar');
	}
}
add_action('visapass_portfolio_sidebar','visapass_portfolio_sidebar_func',20);

// visapass_faq_sidebar
function visapass_faq_sidebar_func() {
	if(is_active_sidebar('faq-sidebar')){

		dynamic_sidebar( 'faq-sidebar');
	}
}
add_action('visapass_faq_sidebar','visapass_faq_sidebar_func',20);