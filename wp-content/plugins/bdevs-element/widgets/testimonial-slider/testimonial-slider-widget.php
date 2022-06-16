<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Testimonial_Slider extends BDevs_El_Widget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'testimonial_slider';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('Testimonial Slider', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/slider/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-blockquote';
    }

    public function get_keywords()
    {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
    }

    protected function register_content_controls()
    {


        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'design_style' => ['style_10']
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => ['style_10']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevselement'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevselement'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevselement'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevselement'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevselement'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevselement'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'design_style' => ['style_10']
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement')
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
        'quote_switch',
            [
            'label' => esc_html__( 'Quote off/on', 'bdevselement' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'bdevselement' ),
            'label_off' => esc_html__( 'No', 'bdevselement' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'condition' => [
                'field_condition' => ['style_232']
                ]
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('profile Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_113']
                ]
            ]
        );
        $repeater->add_control(
            'rating_count',
            [
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'label' => __('Rating Count', 'bdevselement'),
                'default' => __('5', 'bdevselement'),
                'placeholder' => __('Type rating count number', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ]
            ]
        );
        $repeater->add_control(
            'visa_name',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Visa Name', 'bdevselement'),
                'placeholder' => __('Type visa name here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ]
            ]
        );

        $repeater->add_control(
            'message',
            [
                'label' => esc_html__( 'Message', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Message', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Client Name', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Designation Name', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

       $this->add_control(
            'ts_slider_autoplay',
            [
                'label' => esc_html__( 'Autoplay', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'bdevselement' ),
                'label_off' => esc_html__( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $this->add_control(
            'ts_slider_speed',
            [
               'label' => esc_html__( 'Slider Speed', 'bdevselement' ),
               'type' => Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter Slider Speed', 'bdevselement' ),
               'default' => '5000',
               // 'default' => 5000,
               'condition' => ["ts_slider_autoplay" => ['yes']],
            ]
          );

        $this->add_control(
        'ts_slider_nav_show',
            [
            'label' => esc_html__( 'Nav show', 'bdevselement' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'bdevselement' ),
            'label_off' => esc_html__( 'No', 'bdevselement' ),
            'return_value' => 'yes',
            'default' => 'yes'
            ]
        );
        $this->add_control(
         'ts_slider_dot_nav_show',
             [
             'label' => esc_html__( 'Dot nav', 'bdevselement' ),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'bdevselement' ),
             'label_off' => esc_html__( 'No', 'bdevselement' ),
             'return_value' => 'yes',
             'default' => 'yes'
             ]
         );

        $this->end_controls_section();


    }

    protected function register_style_controls(){
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );
        
        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );
        
        // Subtitle    
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );
        
        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );
        
        
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // ================
        $show_navigation   =   $settings["ts_slider_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'] ? $settings['ts_slider_speed'] : '5000';

        $slide_controls    = [
            'show_nav'=>$show_navigation, 
            'dot_nav_show'=>$dot_nav_show, 
            'auto_nav_slide'=>$auto_nav_slide, 
            'ts_slider_speed'=>$ts_slider_speed, 
        ];
   
        $slide_controls = \json_encode($slide_controls); 
        // ================


        if (empty($settings['slides'])) {
            return;
        }

        $title = bdevs_element_kses_basic($settings['title']);
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'big_title mb-0');
        ?>
        <?php if ($settings['design_style'] == 'style_4'): ?>
        <section class="testimonial_section sec_ptb_130 bg_gray clearfix">
            <div class="container">
                <?php if (!empty($settings['title'])): ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-7 col-sm-9">
                            <div class="section_title text-center mb_30 wow fadeInUp2" data-wow-delay=".1s">
                                <?php if ($settings['sub_title']) : ?>
                                    <h4 class="small_title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                                <?php endif; ?>
                                <?php printf('<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                                <?php if ($settings['big_title']) : ?>
                                    <span class="biggest_title"><?php echo bdevs_element_kses_intermediate($settings['big_title']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="testimonial_carousel column_3_carousel owl-carousel owl-theme wow fadeInUp2"
                     data-wow-delay=".3s">
                    <?php foreach ($settings['slides'] as $slide) :
                        // image
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        // bg_image
                        $bg_image = wp_get_attachment_image_url($slide['bg_image']['id'], 'full');
                        ?>
                        <div class="item">
                            <div class="testimonial_primary">
                                <div class="content_wrap">
                                    <?php if (!empty($slide['message'])): ?>
                                        <p><?php echo bdevs_element_kses_intermediate($slide['message']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($bg_image)): ?>
                                        <span class="quote_icon">
                                    <img src="<?php print esc_url($slide['bg_image']['url']); ?>" alt="icon_not_found">
                                </span>
                                    <?php endif; ?>
                                </div>
                                <div class="hero_info_wrap">
                                    <?php if (!empty($image)): ?>
                                        <div class="hero_thumbnail">
                                            <img src="<?php print esc_url($slide['image']['url']); ?>"
                                                 alt="icon_not_found">
                                        </div>
                                    <?php endif; ?>
                                    <div class="hero_info">
                                        <?php if ($slide['client_name']): ?>
                                            <h3 class="hero_name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($slide['designation_name']): ?>
                                            <span class="hero_title"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php elseif ($settings['design_style'] == 'style_3'): ?>
        <section class="testimonial_section bg_gray clearfix position-relative">
            <?php if (!empty($settings['default_image']['id'])): ?>
                <div class="testimonial_image image-50 image-right-50"
                     style="background-image: url(<?php echo $settings['default_image']['url']; ?>);"></div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
                        <div class="testimonial_auto_wrap">
                            <?php if (!empty($settings['title'])) : ?>
                                <div class="section_title mb_30 wow fadeInUp2" data-wow-delay=".2s">
                                    <?php if ($settings['sub_title']) : ?>
                                        <h4 class="small_title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php printf('<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>
                                    <?php if ($settings['big_title']) : ?>
                                        <span class="biggest_title"><?php echo bdevs_element_kses_intermediate($settings['big_title']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="testimonial_carousel column_1_carousel owl-carousel owl-theme wow fadeInUp2"
                                 data-wow-delay=".3s">
                                <?php foreach ($settings['slides'] as $slide) :
                                    // image
                                    $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                    // bg_image
                                    $bg_image = wp_get_attachment_image_url($slide['bg_image']['id'], 'full');
                                    ?>
                                    <div class="item">
                                        <div class="testimonial_primary">
                                            <div class="content_wrap">
                                                <?php if (!empty($slide['message'])): ?>
                                                    <p class="font_24"><?php echo bdevs_element_kses_intermediate($slide['message']); ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($bg_image)): ?>
                                                    <span class="quote_icon">
                                                <img src="<?php print esc_url($slide['bg_image']['url']); ?>"
                                                     alt="icon_not_found">
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="hero_info_wrap">
                                                <?php if (!empty($image)): ?>
                                                    <div class="hero_thumbnail">
                                                        <img src="<?php print esc_url($slide['image']['url']); ?>"
                                                             alt="icon_not_found">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="hero_info">
                                                    <?php if ($slide['client_name']): ?>
                                                        <h3 class="hero_name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h3>
                                                    <?php endif; ?>
                                                    <?php if ($slide['designation_name']): ?>
                                                        <span class="hero_title"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php elseif ($settings['design_style'] == 'style_2'): ?>
        
        <section class="testimonail-area grey-bgg">
            <div class="container">
                <div class="row">
                    <div class="textimonail-active owl-carousel">
                        <?php foreach ($settings['slides'] as $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            }
                         ?>
                        <div class="testimonail__wrapper">
                            <div class="testimonail__wrapper__info d-flex align-items-center mb-25">
                                <?php if( !empty( $image ) ) : ?>
                                <div class="testimonail__wrapper__info__img ">
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
                                </div>
                                <?php endif; ?>
                                <div class="testimonail__wrapper__info__author">
                                    <?php if(!empty($slide['client_name'])) : ?>
                                     <h4 class="bdevs-el-title"><?php echo bdevs_element_kses_intermediate($slide['client_name']); ?></h4>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['designation_name'])) : ?>
                                    <span class="bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($slide['designation_name']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="testimonail__wrapper__info__quotes">
                                    <i class="flaticon-quote"></i>
                                </div>
                            </div>
                            <div class="testimonail__wrapper__content bdevs-el-content">
                                <?php if(!empty($slide['message'])) : ?>
                                 <p><?php echo bdevs_element_kses_intermediate($slide['message']) ?></p>
                                <?php endif; ?>
                                <div class="testimonail__wrapper__content__reviews ">
                                    <ul>
                                        <?php if(!empty($slide['rating_count'])) : ?>
                                            <?php for($i=1;$i<=$slide['rating_count'];$i++){ ?>
                                                <li><i class="fas fa-star"></i></li>
                                        <?php } endif; ?>
                                        <?php if(!empty($slide['rating_count'])) : ?>
                                            <?php for($i=4;$i>=$slide['rating_count'];$i--){ ?>
                                                <li><i class="fal fa-star"></i></li>
                                        <?php } endif; ?>
                                        <?php if(!empty($slide['visa_name'])) : ?>
                                        <li>(<?php echo bdevs_element_kses_intermediate($slide['visa_name']); ?>)</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>



    <?php else: ?>
        <div class="testimonial-2">
            <div class="container">
                <div class="row">
                    <div class="testimonail2-active pb-30 owl-carousel text-center testi-pad">
                         <?php foreach ($settings['slides'] as $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            }
                         ?>
                         <div class="testimonail__wrapper bdevs-el-content testimonail__wrapper2">
                             <div class="testimonail__header">
                                <?php if(!empty($image)) : ?>
                                <div class="testimonail__header__img mb-25">
                                    <img src="<?php echo esc_url($image); ?>" alt="img">
                                </div> 
                                <?php endif; ?>
                                <div class="testimonail__header__content mb-35">
                                    <?php if(!empty($slide['client_name'])) : ?>
                                    <h4 class="bdevs-el-title"><?php echo bdevs_element_kses_intermediate($slide['client_name']); ?></h4>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['designation_name'])) : ?>
                                    <p class="bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($slide['designation_name']); ?></p>
                                    <?php endif; ?>
                                </div> 
                             </div>
                             <?php if(!empty($slide['message'])) : ?>
                             <div class="testimonail__body mb-35">
                                 <p><?php echo bdevs_element_kses_intermediate($slide['message']) ?></p>
                                <?php endif; ?>
                             </div>
                             <div class="testimonail__footer">
                                <ul>
                                    <?php if(!empty($slide['rating_count'])) : ?>
                                        <?php for($i=1;$i<=$slide['rating_count'];$i++){ ?>
                                            <li><i class="fas fa-star"></i></li>
                                    <?php } endif; ?>
                                    <?php if(!empty($slide['rating_count'])) : ?>
                                        <?php for($i=4;$i>=$slide['rating_count'];$i--){ ?>
                                            <li><i class="fal fa-star"></i></li>
                                    <?php } endif; ?>
                                    <?php if(!empty($slide['visa_name'])) : ?>
                                    <li>(<?php echo bdevs_element_kses_intermediate($slide['visa_name']); ?>)</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                         </div>
                         <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
    <?php endif; ?>
        <?php
    }
}
