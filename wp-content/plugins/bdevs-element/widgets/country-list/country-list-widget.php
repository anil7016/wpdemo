<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Group_Control_Text_Shadow;
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

class Country_List extends BDevs_El_Widget {

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
        return 'country_list';
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
        return __( 'Country List', 'bdevselement' );
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
        return [ 'featured', 'list', 'icon' ];
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
                    'style_2' => __( 'Style 2', 'bdevselement' ),
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
                    'design_style' => ['style_111'],
                ], 
            ]
        );
        
        $this->start_controls_tabs( 'tabs_background_overlay' );

        $this->start_controls_tab(
            'tab_background_overlay_normal',
            [
                'label' => __( 'Normal', 'elementor' ),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elementor-background-overlay',
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
                    '{{WRAPPER}}  .elementor-background-overlay' => 'opacity: {{SIZE}};',
                ],
                // 'condition' => [
                //     'background_overlay_background' => [ 'classic', 'gradient' ],
                // ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_background_overlay_hover',
            [
                'label' => __( 'Hover', 'elementor' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_hover',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .zf-item:hover .elementor-background-overlay',
            ]
        );

        $this->add_control(
            'background_hover_overlay_opacity',
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
                    '{{WRAPPER}} .zf-item:hover .elementor-background-overlay' => 'opacity: {{SIZE}};',
                ],
                // 'condition' => [
                //     'background_overlay_background' => [ 'classic', 'gradient' ],
                // ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        // overlay end


        $this->start_controls_section(
            '_section_country_list',
            [
                'label' => __( 'Country List', 'bdevselement' ),
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
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'default' => 'style_2',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $repeater->add_control(
            'country_image',
            [
                'label' => __( 'Country Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'country_thumbnail',
            [
                'label' => __( 'Country Thumbnail', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ],
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
                        'icon' => 'eicon-click',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
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
                    'type' => 'image',
                    'field_condition' => ['style_1', 'style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ],
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
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
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
                        'type' => 'icon',
                        'field_condition' => ['style_1', 'style_2'],
                    ],
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
                        'type' => 'icon',
                        'field_condition' => ['style_1', 'style_2'],
                    ]
                ]
            );
        }
        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Country Title', 'bdevselement' ),
                'placeholder' => __( 'Type Country Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        );
        $repeater->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1A1C20',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}} .bdevs-el-title' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        ); 
        $repeater->add_control(
            'title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#E48216',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}} .bdevs-el-title:hover' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        ); 
        $repeater->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Country subtitle', 'bdevselement' ),
                'placeholder' => __( 'Type Country Subtitle', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        );
         $repeater->add_control(
            'sub_title_color',
            [
                'label' => __( 'Subtitle Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#6f6f6f',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}} .bdevs-el-subtitle' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        ); 
        $repeater->add_control(
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
        $repeater->add_control(
            'f_url',
            [
                'label' => __( 'URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Url here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'type' => 'icon',
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Icon Description', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_2', 'style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_3'],
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
                    'field_condition' => ['style_3'],
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
                    'condition' => [
                        'field_condition' => ['style_3'],
                    ], 
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
                    'condition' => [
                        'field_condition' => ['style_3'],
                    ], 
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
                'condition' => [
                    'field_condition' => ['style_3'],
                ], 
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
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
            <?php if ( $settings['design_style'] === 'style_3' ):
                $this->add_render_attribute('title', 'class', 'mb-25 bdevs-el-title');
                $this->add_inline_editing_attributes( 'title', 'basic' );
            ?>
            <div class="container">
                <div class="row g-0">
                <?php foreach ($settings['slides'] as $slide):
                    if(!empty($slide['button_link'])){
                        $this->add_render_attribute( 'button', 'class', 'browse-link read-more bdevs-el-btn' );
                        $this->add_link_attributes( 'button', $slide['button_link'] );
                    }
                        ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="features2">
                            <div class="features2__contant bdevs-el-content d-flex align-items-center mb-20">
                                <div class="features2__icon bdevs-el-icon mr-15">
                                    <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                        $this->get_render_attribute_string( 'image' );
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                            </figure>
                                            <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                            <figure>
                                                <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                            </figure>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($slide['title'])) : ?>
                                <h4 class="features2__title bdevs-el-title">
                                    <a href="<?php echo esc_url($slide['f_url']); ?>"><?php echo bdevs_element_kses_basic($slide['title']); ?></a>
                                </h4>
                                <?php endif; ?>
                            </div>
                            <div class="features2__wrapper">
                                <?php if (!empty($slide['description'])) : ?>
                                <p class="features2__wrapper__subtitle mb-25" <?php $this->get_render_attribute_string('description'); ?>><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                <?php endif; ?>
                                <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                    printf( '<a %1$s><span>%2$s</span></a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $slide['button_text'] )
                                        );
                                elseif ( empty( $slide['button_text'] ) && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                <?php elseif ( $slide['button_text'] && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) :
                                    if ( $slide['button_icon_position'] === 'before' ) :
                                        $this->add_render_attribute( 'button', 'class', 'site-btn bdevs-btn--icon-before' );
                                        $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                        ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                        <?php
                                    else :
                                        $this->add_render_attribute( 'button', 'class', 'bdevs-btn--icon-after' );
                                        $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                        ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>>
                                            <span><?php echo $button_text; ?> <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span>
                                        </a>
                                    <?php
                                    endif;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php elseif ( $settings['design_style'] === 'style_2' ):
                $this->add_render_attribute('title', 'class', 'mb-0 bdevs-el-title');
                $this->add_inline_editing_attributes( 'title', 'basic' );
            ?>
            <div class="visapass-country-grid-item">
                <div class="container">
                    <div class="row">
                    <?php
                        foreach ( $settings['slides'] as $slide ):
                        $country_image = wp_get_attachment_image_url( $slide['country_image']['id'], $settings['thumbnail_size'] );
                        if ( ! $country_image ) {
                            $country_image = $slide['country_image']['url'];
                        }
                        $country_thumbnail = wp_get_attachment_image_url( $slide['country_thumbnail']['id'], $settings['thumbnail_size'] );
                        if ( ! $country_thumbnail ) {
                            $country_thumbnail = $slide['country_thumbnail']['url'];
                        }
                        $title = bdevs_element_kses_basic($slide['title']);
                    ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 mb-30">
                            <div class="countries-item img-top  elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                                <div class="countries-item__top">
                                     <?php if(!empty($country_image)) : ?>
                                    <div class="countries-item__top-img">
                                        <img src="<?php echo esc_url($country_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['country_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                        <div class="countries-item__top-img-link">
                                            <a href="<?php echo esc_url($slide['f_url']); ?>">
                                                <?php if( !empty($slide['selected_icon']) ): ?>
                                                 <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                 <?php else: ?>
                                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="countries-item__bottom d-flex align-items-center">
                                    <?php if(!empty($slide['country_thumbnail']['url'])) : ?>
                                    <div class="countries-item__bottom-img mr-20">
                                        <img src="<?php echo esc_url($country_thumbnail); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($country_thumbnail), '_wp_attachment_image_alt', true); ?>">
                                    </div>
                                    <?php endif; ?>
                                    <div class="countries-item__bottom-content">
                                        <?php printf('<%1$s %2$s><a href="'.$slide['f_url'].'">%3$s</a></%1$s>',
                                                tag_escape($slide['title_tag']),
                                                $this->get_render_attribute_string('title'),
                                                $title
                                        ); ?>
                                        <?php if( !empty($slide['sub_title']) ): ?>
                                        <p <?php echo $this->get_render_attribute_string('sub_title'); ?>><?php echo bdevs_element_kses_basic($slide['sub_title']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    <?php endforeach; ?>
                    </div>
                </div>    
            </div>
            
        <?php else: 

            $this->add_render_attribute('title', 'class', 'countries-item__bottom-content-title bdevs-el-title');
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('sub_title', 'class', 'bdevs-el-subtitle');
            $this->add_inline_editing_attributes('sub_title', 'basic');

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }
        ?>
        <div class="famous-countries">
            <div class="container">
                <div class="countries-active  owl-carousel">
                    <?php
                        foreach ( $settings['slides'] as $slide ):
                        $country_image = wp_get_attachment_image_url( $slide['country_image']['id'], $settings['thumbnail_size'] );
                        if ( ! $country_image ) {
                            $country_image = $slide['country_image']['url'];
                        }
                        $country_thumbnail = wp_get_attachment_image_url( $slide['country_thumbnail']['id'], $settings['thumbnail_size'] );
                        if ( ! $country_thumbnail ) {
                            $country_thumbnail = $slide['country_thumbnail']['url'];
                        }
                        $title = bdevs_element_kses_basic($slide['title']);
                    ?>
                    <div class="countries-item img-top  elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                        <div class="countries-item__top">
                            <?php if(!empty($country_image)) : ?>
                            <div class="countries-item__top-img">
                                <img src="<?php echo esc_url($country_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['country_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                <div class="countries-item__top-img-link">
                                    <a href="<?php echo esc_url($slide['f_url']); ?>">
                                        <?php if( !empty($slide['selected_icon']) ): ?>
                                         <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                         <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="countries-item__bottom d-flex align-items-center">
                            <?php if(!empty($slide['country_thumbnail']['url'])) : ?>
                            <div class="countries-item__bottom-img mr-20">
                                <img src="<?php echo esc_url($country_thumbnail); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($country_thumbnail), '_wp_attachment_image_alt', true); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="countries-item__bottom-content">
                                <?php printf('<%1$s %2$s><a href="'.$slide['f_url'].'">%3$s</a></%1$s>',
                                        tag_escape($slide['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                ); ?>
                                <?php if( !empty($slide['sub_title']) ): ?>
                                <p <?php echo $this->get_render_attribute_string('sub_title'); ?>><?php echo bdevs_element_kses_basic($slide['sub_title']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div> 
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <?php endif; ?>
        
        <?php
    }

}
