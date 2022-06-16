<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Service extends BDevs_El_Widget {

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
        return 'service';
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
        return __( 'Service', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
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
        return 'eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'service', 'list', 'icon' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
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
                    // 'style_2' => __( 'Style 2', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();  


        // Background Overlay
        $this->start_controls_section(
            '_section_background_overlay',
            [
                'label' => __( 'Background Overlay', 'elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2'],
                ], 
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .features__thumb-2::after',
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
                    '{{WRAPPER}}  .features__thumb-2::after' => 'opacity: {{SIZE}};',
                ],
                // 'condition' => [
                //     'background_overlay_background' => [ 'classic', 'gradient' ],
                // ],
            ]
        );


        $this->end_controls_section();    

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Heading', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1']
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Sub Title', 'bdevselement' ),
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
                'default' => __( 'bdevs Info Box Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
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
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
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

        // Image
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnails',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10']
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
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

        // _section_icon

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Services List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
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
                    // 'style_2' => __( 'Style 2', 'bdevselement' ),
                    // 'style_3' => __( 'Style 3', 'bdevselement' ),
                    // 'style_4' => __( 'Style 4', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } 
        else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Icon BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'image_bg',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_20'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'bdevselement' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Icon Box sub Title', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Icon Description', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            's_url',
            [
                'label' => __( 'URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'URL Here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_2'],
                ], 
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
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ]
            ]
        );

        $this->add_responsive_control(
            'align_slide',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
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

        // services item 
        $this->start_controls_section(
            '_box_section_style_content',
            [
                'label' => __( 'Box Title / Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            '_box_content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_content_background',
                'selector' => '{{WRAPPER}} .bdevs-box-content',
                'exclude' => [
                    'image'
                ]
            ]
        );
        
        // Box Title
        $this->add_control(
            '_box_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            '_box_title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            '_box_title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxtitle',
                'selector' => '{{WRAPPER}} .bdevs-box-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );
        
        // description
        $this->add_control(
            '_box_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            '_box_description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            '_box_description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxdescription',
                'selector' => '{{WRAPPER}} .bdevs-box-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );
        
        
        $this->end_controls_section();


    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <?php if ( $settings['design_style'] === 'style_2' ): 


        $title = bdevs_element_kses_basic( $settings['title' ] );


        $this->add_render_attribute( 'button', 'class', 'text_btn' );

        ?>

        <section class="features__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="features__content-left bdevs-el-content">
                            <div class="section__title section__title-h2 mb-25">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <span class="wow fadeInUp2 bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                                <?php endif; ?>
                                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>
                            <?php if ( $settings['desccription'] ) : ?>
                            <p class="wow fadeInUp2" data-wow-delay=".6s"><?php echo bdevs_element_kses_intermediate( $settings['desccription'] ); ?></p>
                            <?php endif; ?>

                            <?php if ( !empty( $settings['button_link']['url'] ) ) : ?>
                            <div class="link-sec">
                                <?php if( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                    printf( '<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button_text'] ),
                                        esc_url($settings['button_link']['url'])
                                    );
                                elseif( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) :
                                 ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                <?php elseif( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
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
                    <div class="col-xl-6 offset-xl-1 col-lg-6">
                        <div class="features__content-right">
                            <div class="row">
                                <?php 
                                foreach ( $settings['slides'] as $key => $slide ):

                                    if (!empty($slide['image_bg']['id'])){
                                        $image_bg = wp_get_attachment_image_url( $slide['image_bg']['id'], $settings['thumbnail_size'] );
                                    }
                                    if (!empty($slide['image']['id'])){
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                    }
                                ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="features__item features__item-2 white-bg fix mb-30 wow fadeInUp2 bdevs-box-content" data-wow-delay=".2s">
                                        <div class="features__thumb-2" data-background="<?php echo esc_url($image_bg); ?>"></div>
                                        <div class="features__content-2">
                                            <div class="features__icon features__icon-2">
                                                <?php if( !empty($slide['selected_icon']) ): ?>
                                                    <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                    <?php else: ?>
                                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                                <?php endif; ?>
                                            </div>
                                            <?php if( $slide['title'] ) : ?>
                                            <h3 class="bdevs-box-title"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h3>
                                            <?php endif; ?>
                                            <?php if( $slide['description'] ): ?>
                                            <p><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                            <?php endif; ?>

                                            <?php if( !empty($slide['s_url']) ): ?>
                                            <div class="features__btn-2">
                                                <a href="<?php echo esc_url( $slide['s_url'] ); ?>" class="link-btn">
                                                    <i class="fal fa-long-arrow-right"></i>
                                                    <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
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

        <?php else: 

        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title bdevs-el-title' );

        $this->add_render_attribute( 'button', 'class', 'text_btn' );

        if ( !empty($settings['image']['id']) ){
                $image = wp_get_attachment_image_url( $settings['image']['id'], 'full' );
        }

        ?>

        <div class="services-featurs">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <?php if ( !empty($image) ) : ?>
                        <div class="services-fimg">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <?php endif; ?>

                        <div class="section_title_wrapper pt-40 bdevs-el-content">
                            <?php if ( $settings['sub_title'] ) : ?>
                            <span class="subtitle bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                            <?php endif; ?>
                            <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                            ); ?>
                            <?php if ( $settings['desccription'] ) : ?>
                                <p class="pt-30 pb-25 mr-25"><?php echo bdevs_element_kses_intermediate( $settings['desccription'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="row">
                            <?php 
                            foreach ( $settings['slides'] as $key => $slide ):
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                    if ( ! $image ) {
                                        $image = $slide['image']['url'];
                                    }
                                }
                            ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="services-items services-itm-color mb-30 elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                                    <?php if( $slide['title'] ) : ?>
                                    <h4 class="services-items__title">
                                        <?php echo bdevs_element_kses_basic( $slide['title'] ); ?>
                                    </h4>
                                    <?php endif; ?>

                                    <?php if( $slide['description'] ): ?>
                                        <p><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                    <?php endif; ?>

                                    <?php if( $slide['s_url'] ) : ?>
                                    <a class="aborder1" href="<?php echo esc_url( $slide['s_url'] ); ?>"><i class="fal fa-long-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>
        
        <?php
    }

}