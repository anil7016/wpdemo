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
                    $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
                    $department_sub_title = function_exists('get_field') ? get_field('department_sub_title') : '';
                    $department_title = function_exists('get_field') ? get_field('department_title') : '';

                    // video
                    $department_video_image = function_exists('get_field') ? get_field('department_video_image') : '';
                    $department_video_url = function_exists('get_field') ? get_field('department_video_url') : '';

                    // department short info
                    $department_bottom_text = function_exists('get_field') ? get_field('department_bottom_text') : '';  
            ?>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="sidebar-left__wrapper">
                        <?php do_action("visapass_service_sidebar"); ?>
                    </div>
                </div>

                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="sidebar__deatils">
                        <div class="visa-details">
                            <?php if (!empty($department_details_thumb['url'])) : ?>
                            <div class="visa-deatils__thumb mb-40">
                                <img src="<?php echo esc_url($department_details_thumb['url']); ?>" alt="img">
                            </div>
                            <?php endif; ?>

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