<?php
/**
 * Template for displaying single course
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

get_header();

do_action('tutor_course/single/before/wrap'); 
?>

<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap businnes-area pt-120 pb-80'); ?>>
    <div class="container">
        <div class="row">

            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="sidebar__deatils_visa mr-15">
                    <?php do_action('tutor_course/single/before/inner-wrap'); ?>
                    <?php tutor_course_lead_info(); ?>
                    <?php tutor_course_content(); ?>
                    <?php tutor_course_benefits_html(); ?>
                    <?php tutor_course_topics(); ?>
                    <?php tutor_course_instructors_html(); ?>
                    <?php tutor_course_target_reviews_html(); ?>
                    <?php do_action('tutor_course/single/after/inner-wrap'); ?>
                </div>
            </div> <!-- .tutor-col-8 -->

            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="tutor-single-course-sidebar sidebar-left__wrapper">
                    <?php do_action('tutor_course/single/before/sidebar'); ?>
                    <?php tutor_course_enroll_box(); ?>
                    <?php tutor_course_requirements_html(); ?>
                    <?php tutor_course_tags_html(); ?>
                    <?php tutor_course_target_audience_html(); ?>
                    <?php do_action('tutor_course/single/after/sidebar'); ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php do_action('tutor_course/single/after/wrap'); ?>

<?php
get_footer();
