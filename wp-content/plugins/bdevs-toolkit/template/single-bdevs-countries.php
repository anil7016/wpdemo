<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  visapass
 */
get_header(); ?>


    <div class="businnes-area pt-120 pb-90">
        <div class="container">
            <?php 
            if( have_posts() ):
                while( have_posts() ): the_post();
                    // department short info
                    $department_bottom_text = function_exists('get_field') ? get_field('department_bottom_text') : '';  
            ?>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="sidebar-left__wrapper">
                        <?php do_action("visapass_countries_sidebar"); ?>
                    </div>
                </div>

                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="sidebar__deatils">

                        <div class="united-states">
                            <?php if( has_post_thumbnail() ) : ?>
                            <div class="united-states__thumb mb-40">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <?php endif; ?>
                            <h3 class="united-states__title mb-10"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>


                   </div>
                </div>
            </div>
            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </div>


<?php get_footer();  ?>