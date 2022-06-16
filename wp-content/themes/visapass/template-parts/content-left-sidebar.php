<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package visapass
 */
if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog__text blog__item-2 mb-70 format-image'); ?>>
        <?php 
        if(has_post_thumbnail()): ?>
            <div class="blog__thumb-2 m-img">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
            </div>
        <?php 
        endif; ?>

        <div class="blog__content-2">
            <div class="post-meta mb-20">
                <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <h3 class="blog-title">
                <?php the_title(); ?>
            </h3>
            <div class="post-text mb-20">
               <?php the_content(); ?> 
                <?php
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'visapass' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <?php print visapass_get_tag(); ?>
        </div>
    </article>
<?php
else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('blog__item-2 mb-50 format-image mb-70'); ?>>
        <?php 
        if( has_post_thumbnail() ): ?>
            <div class="blog__thumb-2 m-img">
                <a href="<?php the_permalink(); ?>">
                   <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
                </a>
            </div>
        <?php 
        endif; ?>
        <div class="blog__content-2">
            <h3 class="blog-title">
                <?php the_title(); ?>
            </h3>
            <div class="post-meta mb-20">
                <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <h3 class="blog-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="post-text mb-20">
                <?php the_excerpt(); ?>
            </div>
            <!-- blog btn -->

            <?php 
                if (rtl_enable()) {
                    $visapass_blog_btn_rtl = get_theme_mod('visapass_blog_btn_rtl','Read More'); 
                 }
                else { 
                    $visapass_blog_btn = get_theme_mod('visapass_blog_btn','Read More'); 
                }
                
                $visapass_blog_btn_switch     = get_theme_mod('visapass_blog_btn_switch', true);  
            ?>

            <div class="blog__btn d-sm-flex justify-content-between">
                <div class="blog__btn">
                    <a href="<?php the_permalink(); ?>" class="z-btn">
                        <?php print esc_html($visapass_blog_btn); ?>
                        <i class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>



            <?php if(!empty($visapass_blog_btn_switch)) : ?>
            <div class="read-more-btn mt-30 d-none">
                <a href="<?php the_permalink(); ?>" class="site__btn1"><?php print esc_html($visapass_blog_btn); ?></a>
            </div>
            <?php endif; ?>

        </div>
    </article>

<?php
endif; ?>
