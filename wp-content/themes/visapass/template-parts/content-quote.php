<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package visapass
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ablog__text4 has-blockquote format-quote mb-50'); ?>>
    	<div class="post-text">
	        <?php the_content(); ?>
	    </div>
</article>

