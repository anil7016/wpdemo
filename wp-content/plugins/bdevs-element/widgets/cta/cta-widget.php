<?php
namespace BdevsElement\Widget;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;


defined( 'ABSPATH' ) || die();

class CTA extends BDevs_El_Widget {


    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'cta';
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
        return __( 'CTA', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/widgets/gradient-heading/';
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
        return 'eicon-t-letter';
    }

    public function get_keywords() {
        return [ 'gradient', 'advanced', 'heading', 'title', 'colorful' ];
    }

    protected function register_content_controls() {

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
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
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                    // 'style_4' => __( 'Style 4', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
        
        //desc
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Desccription', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevselement' ),
                'condition' => [
                    'design_style' => ['style_10']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );  

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2','style_3']
                ],
            ]
        );      

        $this->add_control(
            'desccription',
            [
                'label' => __( 'Desccription', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2']
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'condition' => [
                    'design_style' => ['style_3']
                ],
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'condition' => [
                    'design_style' => ['style_1','style_2']
                ],
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

         $this->add_control(
            'title_tag2',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'condition' => [
                    'design_style' => ['style_3']
                ],
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h4',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
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


        //Settings
        $this->start_controls_section(
            '_section_contact_info_settings',
            [
                'label' => __( 'Contact Info', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2']
                ]
            ]
        );
        $this->add_control(
            'contact_info_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Contact Info Title', 'bdevselement' ),
                'placeholder' => __( 'Contact Info Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2']
                ]
            ]
        );
        $this->add_control(
            'contact_info_number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Contact Info Number', 'bdevselement' ),
                'placeholder' => __( 'Contact Info Number', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2']
                ]
            ]
        );
        $this->add_control(
            'contact_info_number_link',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Contact Info Number Link', 'bdevselement' ),
                'placeholder' => __( 'Contact Info Number', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2']
                ]
            ]
        );
        $this->end_controls_section();
        //listview with icon
        $this->start_controls_section(
            '_section_list',
            [
                'label' => __( 'Items List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_222']
                ]
            ]
        );

        $repeater = new Repeater();

        
        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );



        $this->add_control(
            'items_list',
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
                ]
            ]
        );

        $this->end_controls_section();

        //button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_3']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
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
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
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

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function register_style_controls() {

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

        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => 'style_3'
                ],
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
                'condition' => [
                    'design_style' => 'style_10'
                ],
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

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $title = bdevs_element_kses_basic( $settings['title' ] );

        if( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }
                     
        ?>

        <?php if ( $settings['design_style'] === 'style_4' ): 

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'z-title  big_title mb-0 text-white' );

        $this->add_render_attribute( 'button', 'class', 'custom_btn bg_default_yellow wow fadeInUp2' );
        $this->add_render_attribute( 'button', 'data-wow-delay', '.3s' );
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes( 'button', $settings['button_link'] );
        } 

        if ( !empty($image) ) {
            $image = $settings['image']['url'];
        }

        ?>

        <section class="cta_section sec_ptb_130 deco_wrap clearfix" data-background="<?php echo esc_url($image); ?>">
            <div class="container">
                <div class="row align-items-center justify-content-lg-start">
                    <div class="col-lg-6 col-md-7 col-sm-9 col-xs-12">
                        <div class="cta_content ml__30 text-white">
                            <div class="section_title mb_30 wow fadeInUp2" data-wow-delay=".1s">
                                <?php if ( !empty($settings['sub_title']) ) : ?>
                                <h4 class="small_title"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h4>
                                <?php endif; ?>
                                <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                                ); ?> 
                                <?php if ( !empty($settings['big_title']) ) : ?>
                                <span class="biggest_title"><?php echo bdevs_element_kses_basic( $settings['big_title'] ); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if( $settings['desccription'] ): ?>
                            <p class="mb_30 border_left_yellow text-white wow fadeInUp2" data-wow-delay=".2s"><?php echo bdevs_element_kses_intermediate( $settings['desccription'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                                printf( '<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] ),
                                    esc_url($settings['button_link']['url']));
                            elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ): ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                    <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="overlay_blue"></div>

            <div class="deco_image hand_image wow fadeInRight2" data-wow-delay=".1s">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cta/shape_02.png" alt="shape_not_found">
            </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_3' ): 

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'calltoaction-title pt-80 pb-75 bdevs-el-title' );

        $this->add_render_attribute( 'button', 'class', 'theme-btn cl-btn bdevs-el-btn' );
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }

        ?>

        <section class="calltoaction-area d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-3">
                        <?php if( !empty( $image ) ) : ?>
                        <div class="calltoaction-img ">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8">
                        <?php if(!empty($title)) : ?>
                            <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                tag_escape( $settings['title_tag2'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                            ); ?>
                       <?php endif; ?>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                        <div class="calltoaction-btn text-right">
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                $this->get_render_attribute_string( 'button' ),
                                esc_html( $settings['button_text'] ),
                                esc_url($settings['button_link']['url']));
                        elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                        <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                            if ( $settings['button_icon_position'] === 'before' ): ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                <?php
                            else: ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                            <?php
                            endif;
                        endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ): 

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'bdevs-el-title' );
            $this->add_inline_editing_attributes('description', 'basic');
            $this->add_render_attribute( 'button', 'class', 'custom_btn bg_default_yellow wow fadeInUp2' );
            $this->add_render_attribute( 'button', 'data-wow-delay', '.4s' );
            if (!empty($settings['button_link'])) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            ?>

            <!-- features services start --> 
            <section class="call-to-action3s d-flex align-items-center">
                <div class="container">
                    <div class="row theme-bg  g-0 pad-cut pt-40 pb-40 pr-80 pl-80">
                        <div class="col-xxl-8 col-xl-8 col-lg-8">
                             <div class="call3-left bdevs-el-content">
                                <?php if(!empty($title)) : ?>
                                    <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        $title
                                    ); ?>
                                <?php endif; ?>
                                <?php if(!empty($settings['desccription'])) : ?>
                                    <p <?php $this->get_render_attribute_string('description'); ?>><?php echo bdevs_element_kses_intermediate($settings['desccription']); ?></p>
                                <?php endif; ?>
                             </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 cbr-left d-flex align-items-center justify-content-center justify-content-lg-end">
                            <div class="calltoaction3__wrapper d-flex align-items-center">
                                <div class="calltoaction3__wrapper__icon mr-10 bdevs-el-icon">
                                    <i class="fal fa-headset"></i>
                                </div>
                                <div class="calltoaction3__wrapper__call-number">
                                    <?php if(!empty($settings['contact_info_title'])) : ?>
                                    <span><?php echo bdevs_element_kses_basic($settings['contact_info_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($settings['contact_info_number'])) : ?>
                                    <h5><a href="tel:<?php echo esc_url($settings['contact_info_number_link']); ?>"><?php echo bdevs_element_kses_intermediate($settings['contact_info_number']); ?></a></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- features services end --> 
      
        <?php else: 

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'bdevs-el-title' );

            $this->add_render_attribute( 'button', 'class', 'theme-btn clto-btn-2 bdevs-el-btn' );
            if (!empty($settings['button_link'])) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }
        ?>
        <!-- call to action 2 start-->
        <section class="callto-action-2 d-flex align-items-center theme-bg wow fadeInUp2" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                <div class="container">
                    <div class="row"> 
                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8">
                            <?php if(!empty($title)) : ?>
                            <div class="callto-title">
                                <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                            <?php if ( $settings['button_text']) : ?>
                            <div class="callto-btn text-right">
                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                                    printf( '<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button_text'] ),
                                        esc_url($settings['button_link']['url']));
                                elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                    if ( $settings['button_icon_position'] === 'before' ): ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                        <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                    <?php
                                    endif;
                                endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <!-- call to action 2 end-->

        <?php endif;
    }
}
