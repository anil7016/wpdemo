<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;

defined( 'ABSPATH' ) || die();

class Slider extends BDevs_El_Widget {
    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.1
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'slider';
    }


    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Slider', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/slider/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-slider-full-screen';
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'gallery', 'carousel' ];
    }

    protected function register_content_controls() {


        // Background Overlay
        $this->start_controls_section(
            '_section_background_overlay',
            [
                'label' => __( 'Background Overlay', 'elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_111'],
                ], 
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .single-slider::before,{{WRAPPER}} .slider__content-2::before',
            ]
        );

        $this->add_control(
            'background_overlay_opacity',
            [
                'label' => __( 'Opacity', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => .5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .single-slider::before,{{WRAPPER}} .slider__content-2::before' => 'opacity: {{SIZE}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_extra_info',
            [
                'label' => __( 'Extra Info', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_122'],
                ], 
            ]
        );
        $this->add_control(
            'shape_switcher',
            [
                'label' => esc_html__( 'Switch Shape ?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'bdevselement' ),
                'label_off' => esc_html__( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );
        
        $this->add_control(
            'social_url_textarea',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Social Items', 'bdevselement' ),
                'default' => __( 'social', 'bdevselement' ),
                'placeholder' => __( 'social menu with ul li', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );     
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' )
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'navigation_controls',
            [
                'label' => esc_html__( 'Show Navigation ?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'bdevselement' ),
                'label_off' => esc_html__( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'design_style' => ['style_1', 'style_2']
                ]
            ]
        );
        $this->add_control(
            'autoplay_duration',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Autoplay Duration', 'bdevselement' ),
                'default' => __( '5000', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2']
                ]
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ], 
            ]
        );
        
        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'default' => __( 'Title Here', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'default' => __( 'Effective Visa Solution', 'bdevselement' ),
                'placeholder' => __( 'Type Subtitle here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ], 
            ]
        );
        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __( 'Description', 'bdevselement' ),
                'default' => __( 'Description Here', 'bdevselement' ),
                'placeholder' => __( 'Type Description here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ]
                
            ]
        );
        //button two
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Book Now',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Button Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'button_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn--icon-before .bdevs-el-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-el-btn--icon-after .bdevs-el-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ]
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

    // style control 
    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_overlay',
            [
                'label' => __( 'BG Color', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'slide_overlay_bg',
            [
                'label' => __( 'Slider Overlay BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sl-overlay::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'slide_shape_bg',
            [
                'label' => __( 'Slider Shape BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-circle-shape, {{WRAPPER}} .slider-circle-shape-sm' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();



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

        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        /** button 2 **/
        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __( 'Button 2', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn-sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn-sec',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn-sec',
            ]
        );

        $this->add_control(
            'button2_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn-sec' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn-sec',
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button2' );

        $this->start_controls_tab(
            '_tab_button2_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button2_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn-sec' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn-sec' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button2_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button2_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn-sec:hover, {{WRAPPER}} .bdevs-el-btn-sec:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn.red:hover, {{WRAPPER}} .bdevs-el-btn.red:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn-sec:hover, {{WRAPPER}} .bdevs-el-btn-sec:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // Navigation - Arrow
        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __( 'Position', 'bdevselement' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevselement' ),
                'label_on' => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __( 'Vertical', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __( 'Horizontal', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-prev:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __( 'Vertical Position', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __( 'Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }


    protected function render() {
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

        if ( empty( $settings['slides'] ) ) {
            return;
        }

        $this->add_render_attribute( 'button_no_icon', 'class', 'custom_btn bg_default_orange btn-no-icon wow fadeInUp2' );

        ?>

        <?php if ( $settings['design_style'] === 'style_4' ):

        $this->add_render_attribute( 'button', 'class', 'z-btn z-btn-border' );
        
        ?>

        <section class="slider__area slider__area-2  slick-nav-style slick-dot-black">
            <div class="slider-active" data-controls="<?php echo esc_attr($slide_controls); ?>">
                <?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    } 

                    $this->add_render_attribute( 'button_'. $key, 'class', 'z-btn z-btn-transparent bdevs-el-btn' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );
                ?>

                <div class="single-slider single-slider-2 slider__height-shop d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-9">
                                <div class="slider__content slider__content-2 slider__content-4 slider__content-shop-4 bdevs-el-content">
                                    <?php if( $slide['subtitle'] ): ?>
                                    <span class="bdevs-el-subtitle" data-animation="fadeInUp2" data-delay=".3s"><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></span>
                                    <?php endif; ?> 
                                    <?php if( $slide['title'] ): ?>
                                    <h1 class="bdevs-el-title" data-animation="fadeInUp2" data-delay=".5s">
                                        <?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                    <?php endif; ?> 
                                    <?php if ( $slide['desc'] ) : ?>
                                    <p data-animation="fadeInUp2" data-delay=".7s">
                                        <?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?>
                                    </p>
                                    <?php endif; 
                                        if(!empty($slide['button_text'])) :
                                    ?>
                                    <div class="slider__btn" data-animation="fadeInUp2" data-delay=".9s">
                                        <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                    <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                    <?php
                                                else: ?>
                                                    <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                                <?php
                                                endif;
                                        endif; ?> 
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>    
            </div>
        </section>      

        <?php elseif ( $settings['design_style'] === 'style_3' ):

        $this->add_render_attribute( 'button', 'class', 'z-btn z-btn-border  bdevs-el-btn' );
        
        ?>

        <section class="hero__area p-relative slider-settings"
                 data-settings='<?php print json_encode($slider_settings); ?>'>
            <div class="hero__shape">
                <img class="one" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-1.png" alt="img">
                <img class="two" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-2.png" alt="img">
                <img class="three" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-3.png" alt="img">
                <img class="four" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-4.png" alt="img">
                <img class="five" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-6.png" alt="img">
                <img class="six" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-7.png" alt="img">
            </div>

            <?php foreach ( $settings['slides'] as $key => $slide ) :
            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
            if ( ! $image ) {
                $image = $slide['image']['url'];
            }

            $image_two = wp_get_attachment_image_url( $slide['image_two']['id'], $settings['thumbnail_size'] );
            if ( ! $image_two ) {
                $image_two = $slide['image_two']['url'];
            }

            $image_three = wp_get_attachment_image_url( $slide['image_three']['id'], $settings['thumbnail_size'] );
            if ( ! $image_three ) {
                $image_three = $slide['image_three']['url'];
            }

            $image_four = wp_get_attachment_image_url( $slide['image_four']['id'], $settings['thumbnail_size'] );
            if ( ! $image_four ) {
                $image_four = $slide['image_four']['url'];
            }
            
            ?>
            <div class="hero__item hero__height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 order-last">
                            <div class="hero__thumb-wrapper ml-100 scene ">
                                <?php if( !empty($image) ): ?>
                                <div class="hero__thumb one">
                                    <img class="layers" data-depth="0.2" src="<?php print esc_url($image); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                                <?php if( !empty($image_two) ): ?>
                                <div class="hero__thumb two d-none d-md-block d-lg-none d-xl-block">
                                    <img class="layers" data-depth="0.3" src="<?php print esc_url($image_two); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                                <?php if( !empty($image_three) ): ?>
                                <div class="hero__thumb three d-none d-sm-block">
                                    <img class="layers" data-depth="0.4" src="<?php print esc_url($image_three); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                                <?php if( !empty($image_four) ): ?>    
                                <div class="hero__thumb four d-none d-md-block d-lg-none d-xl-block">
                                    <img class="layers" data-depth="0.5" src="<?php print esc_url($image_four); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                            <div class="hero__content bdevs-el-content">
                                <?php if( !empty($slide['subtitle']) ): ?>
                                <span class="wow fadeInUp2 bdevs-el-subtitle" data-wow-delay=".2s"><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></span>
                                <?php endif; ?>

                                <?php if ( !empty($slide['title']) ) : ?>
                                <h1 class="wow fadeInUp2 bdevs-el-title" data-wow-delay=".4s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                <?php endif; ?>

                                <?php if ( !empty($slide['desc']) ) : ?>
                                <p class="wow fadeInUp2" data-wow-delay=".6s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
                                <?php endif; 
                                    if(!empty($slide['button_text'])) :
                                ?>
                                <div class="slide-btn wow fadeInUp2" data-wow-delay=".8s">
                                    <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $slide['button_text'] ),
                                                esc_url($slide['button_link']['url'])
                                                );
                                        elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                            if ( $slide['button_icon_position'] === 'before' ): ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                <?php
                                            else: ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                            <?php
                                            endif;
                                    endif; ?> 
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ):  ?>

        <!-- hero area start here -->
        <section class="slider-area fix">
            <div class="slider-active swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ( $settings['slides'] as $key => $slide ) :
                        $this->add_render_attribute( 'button_'. $key, 'class', 'theme-btn bdevs-el-btn' );
                        $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }
                    ?>
                    <div class="single-slider slider-height slider-height-2 d-flex align-items-center swiper-slide" data-swiper-autoplay="<?php echo esc_attr($settings['autoplay_duration']); ?>">
                        <div class="slide-bg" data-background="<?php echo esc_url($image); ?>"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="aslider aslider-2 z-index">
                                        <?php if ( !empty($slide['subtitle']) ) : ?>
                                        <span class="slider-top-text slider-top-text2 bdevs-el-subtitle" data-animation="fadeInUp2" data-delay=".5s"><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></span>
                                        <?php endif; ?>
                                        <?php if ( !empty($slide['title']) ) : ?>
                                        <h2 class="aslider--title aslider--title-2 mb-20 bdevs-el-title" data-animation="fadeInUp2" data-delay=".7s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h2>
                                        <?php endif; ?>
                                        <?php if ( !empty($slide['description']) ) : ?>
                                        <p class="aslider--subtitle aslider--subtitle-2 mb-40" data-animation="fadeInUp2" data-delay=".9s"><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                        <?php endif; ?>
                                        <div class="banner-content" data-animation="fadeInUp2" data-delay=".9s">
                                            <?php if(!empty($slide['button_text'])) : ?>
                                                <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                    printf( '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string( 'button_'. $key ),
                                                        esc_html( $slide['button_text'] )
                                                        );
                                                    elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                        <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                                    <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                        if ( $slide['button_icon_position'] === 'before' ): ?>
                                                            <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                            <?php
                                                        else: ?>
                                                            <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                                        <?php
                                                        endif;
                                                endif; ?> 
                                            <?php endif; ?>
                                            <form class="form d-none" name="store" id="store" method="post" action="form.php">
                                                <div class="form-inner">
                                                    <div class="input-group">
                                                        <select class="banner__input banner-niceselect">
                                                            <option value="">Select Institute</option>
                                                            <option value="">Option 1</option>
                                                            <option value="">Option 2</option>
                                                            <option value="">Option 3</option>
                                                            <option value="">Option 4</option>
                                                            <option value="">Option 5</option>
                                                        </select>
                                                         <input type="email" class="form-control" placeholder="Search here">
                                                        <div class="input-group-append">
                                                            <button class="theme-btn theme-color" type="submit">Check Availability </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev slide-prev"><i class="fal fa-long-arrow-left"></i></div>
                <div class="swiper-button-next slide-next"><i class="fal fa-long-arrow-right"></i></div>
            </div>
        </section>
        <!-- hero area end here -->

        <?php else: 
        ?>
        <!-- hero area start here -->
        <section class="slider-area fix">
            <div class="slider-active swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['slides'] as $key => $slide ) :
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }
                        $this->add_render_attribute( 'button_'. $key, 'class', 'theme-btn blacks-hover bdevs-el-btn' );
                        $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );
                    ?>
                        <div class="single-slider slider-height d-flex align-items-center swiper-slide" data-swiper-autoplay="<?php echo esc_attr($settings['autoplay_duration']); ?>">
                            <div class="slide-bg" data-background="<?php echo esc_url($image); ?>"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="aslider z-index bdevs-el-content">
                                            <?php if ( !empty($slide['subtitle']) ) : ?>
                                            <span class="slider-top-text bdevs-el-subtitle" data-animation="fadeInUp2" data-delay=".5s"><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></span>
                                            <?php endif; ?>
                                            <?php if ( !empty($slide['title']) ) : ?>
                                            <h2 class="aslider--title mb-25 bdevs-el-title" data-animation="fadeInUp2" data-delay=".7s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h2>
                                            <?php endif; ?>
                                            <?php if ( !empty($slide['description']) ) : ?>
                                            <p class="aslider--subtitle mb-40" data-animation="fadeInUp2" data-delay=".9s"><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                            <?php endif; ?>
                                            <?php if(!empty($slide['button_text'])) : ?>
                                            <div class="aslider--btn" data-animation="fadeInUp2" data-delay=".9s">
                                                <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                        printf( '<a %1$s>%2$s</a>',
                                                            $this->get_render_attribute_string( 'button_'. $key ),
                                                            esc_html( $slide['button_text'] )
                                                            );
                                                    elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                        <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                                    <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                        if ( $slide['button_icon_position'] === 'before' ): ?>
                                                            <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                            <?php
                                                        else: ?>
                                                            <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                                        <?php
                                                        endif;
                                                endif; ?> 
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php if(!empty($settings['navigation_controls'])) : ?>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev slide-prev"><i class="fal fa-long-arrow-left"></i></div>
                <div class="swiper-button-next slide-next"><i class="fal fa-long-arrow-right"></i></div>
                <?php endif; ?>
            </div>
        </section>
        <!-- hero area end here -->
        <?php endif; ?>

    <?php
    }
}
