<?php

namespace BdevsElement\Widget;

Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class About extends BDevs_El_Widget
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
        return 'about';
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
        return __('About', 'bdevselement');
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
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
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
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                    'style_7' => __('Style 7', 'bdevselement'),
                    'style_8' => __('Style 8', 'bdevselement'),
                    'style_9' => __('Style 9', 'bdevselement'),
                    'style_10' => __('Style 10', 'bdevselement'),
                    'style_11' => __('Style 11', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4','style_5','style_6','style_7','style_8','style_9', 'style_11']
                ]
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => __('Number', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('+1 890 565 398', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_6']
                ]
            ]
        );

        $this->add_control(
            'extra_title',
            [
                'label' => __('Extra Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_4']
                ]
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
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_4','style_7','style_8','style_9', 'style_11']
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
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_6','style_7','style_7','style_8','style_9', 'style_11']
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
            '_section_date_control',
            [
                'label' => __('Date Control', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3']
                ]
            ]
        );
          $this->add_control(
            'date_label',
            [
                'label' => __('Date Label', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ]
            ]
        );
       $this->add_control(
            'start_date',
            [
                'label' => __('Start Date', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Start Date', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ]
            ]
        );
         $this->add_control(
            'end_date',
            [
                'label' => __('End Date', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('End Date', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ]
            ]
        );

       
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_1',
            [
                'label' => __('Image 01', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_5', 'style_6','style_7','style_8','style_9'],
                ],
            ]
        );

        $this->add_control(
            'image_2',
            [
                'label' => __('Image 02', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_4'],
                ],
            ]
        );
        $this->add_control(
            'image_3',
            [
                'label' => __('Image 03', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_4'],
                ],
            ]
        );
        $this->add_control(
            'image_4',
            [
                'label' => __('Image 04', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_4'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            '_section_video_here',
            [
                'label' => __('Video', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs video url goes here', 'bdevselement' ),
                'placeholder' => __( 'Set Video URL', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_8','style_9'],
                ],
            ]
        );


        $this->end_controls_section();



        // country list
        $this->start_controls_section(
            '_section_country_list',
            [
                'label' => __('Country List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3'],
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'country_image',
            [
                'label' => __('Country Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'slides_2',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(country_image || "Carousel Item"); #>',
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
        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_5', 'style_6','style_9', 'style_10', 'style_11'],
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                    'style_9' => __('Style 9', 'bdevselement'),
                    'style_10' => __('Style 10', 'bdevselement'),
                    'style_11' => __('Style 11', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevselement'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevselement'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_1','style_9', 'style_11']
                ]
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image',
                    'field_condition' => ['style_1','style_9', 'style_11']
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
                    'type' => 'image',
                    'field_condition' => ['style_1','style_9', 'style_11']
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon',
                        'field_condition' => ['style_1','style_9', 'style_11']
                    ]
                ]
            );
        } else {
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
                        'field_condition' => ['style_1','style_9', 'style_11']
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_5', 'style_6','style_9', 'style_10']
                ]
            ]
        );
        $repeater->add_control(
            'title_2',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title 2', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10']
                ]
            ]
        );
        $repeater->add_control(
            'sub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Sub Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10']
                ]
            ]
        );
        $repeater->add_control(
            'sub_title_2',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Sub Title 2', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10']
                ]
            ]
        );

        $repeater->add_control(
            'title_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title URL', 'bdevselement'),
                'placeholder' => __('Type title url here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_5', 'style_6','style_9', 'style_11']
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_10']
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'description_2',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description 2', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_10']
                ],
                'dynamic' => [
                    'active' => true,
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
                ]
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            '_about_badge',
            [
                'label' => __('About Badge', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );
        $this->add_control(
            'about_badge_thumbnail',
            [
                'label' => __('Badge Thumbnail', 'bdevselement'),
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
        $this->add_control(
            'about_badget_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Badge Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1']
                ]
            ]
        );
        $this->add_control(
            'about_badget_year',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Badge Year', 'bdevselement'),
                'placeholder' => __('Type Badge Year here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1']
                ]
            ]
        );
        $this->end_controls_section();



        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4','style_5','style_7','style_8','style_9', 'style_11'],
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
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
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'after',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //button 2
        $this->start_controls_section(
            '_section_button2',
            [
                'label' => __( 'Button 2', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_8'],
                ]
            ]
        );


        $this->add_control(
            'button_text2',
            [
                'label' => __( 'Button Text 2', 'bdevselement' ),
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
            'button_link2',
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
                'button_icon2',
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
                'button_selected_icon2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position2',
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
            'button_icon_spacing2',
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

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {

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


        // list style content
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('List Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_icon_size',
            [
                'label' => __('Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span, {{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list i',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker, {{WRAPPER}} .bdevs-el-list i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker, {{WRAPPER}} .bdevs-el-list i',
            ]
        );

        $this->add_control(
            'hr_2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_lits_tabs_button');

        $this->start_controls_tab(
            '_list_tab_button_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'list_item_link_color_2',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_item_border_color_2',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_item_bg_color_2',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_icon_translate_2',
            [
                'label' => __('Icon Translate X', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_list_tab_button_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'list_link_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_border_hover_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i, {{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_hover_icon_translate',
            [
                'label' => __('Icon Translate X', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $title = bdevs_element_kses_basic($settings['title']);
        ?>
         <?php if ($settings['design_style'] === 'style_11'):
       

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title');

        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="partners-area">
            <div class="container">
                <div class="row ">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 wow fadeInUp2">
                        <div class="section_title_wrapper partners-65 mb-30">
                            <?php if(!empty($settings['sub_title'])) : ?>
                            <span class="subtitle bdevs-el-subtitle">
                                <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span>                       
                            <?php endif; ?>
                            
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>

                            <?php if(!empty($settings['description'])) : ?>
                              <p class="mt-30 mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>


                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                printf( '<a %1$s><span>%2$s</span></a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] )
                                    );
                            elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn bdevs-btn--icon-before' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                    <?php
                                else :
                                    $this->add_render_attribute( 'button', 'class', 'bdevs-btn--icon-after' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>>
                                        <span><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 wow fadeInUp2" data-wow-delay="0.5s">
                        <div class="row g-0">

                            <?php foreach ($settings['slides'] as $slide): 
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url($slide['image']['id'], $slide['thumbnail_size']);
                                }
                            ?>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="partner-img">
                                    <a href="<?php echo esc_url($slide['title_url']); ?>">
                                        <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ($settings['design_style'] === 'style_10'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'abtb-title bdevs-el-title');

        ?>

        <div class="visapass-about-history-content">
            <?php if(!empty($settings['slides'])) : ?>
            <?php foreach($settings['slides'] as $key=> $slide) :
                $title = bdevs_element_kses_basic($slide['title']);
                $title_2 = bdevs_element_kses_basic($slide['title_2']);
             ?>
            <div class="row ">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                   <div class="abtb-content bdevs-el-content text-right pr-105 mb-45">
                    <div class="abtbs-round">
                        <span></span>
                    </div>
                    <div class="abtb-mbr">
                        <span></span>
                    </div>
                    <?php if(!empty($slide['sub_title'])) : ?>
                      <span class="bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($slide['sub_title']); ?></span>
                    <?php endif; ?>
                     <?php printf('<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            $title
                    ); ?>
                    <?php if(!empty($slide['description'])) : ?>
                      <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                    <?php endif; ?>
                   </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                   <div class="abtb-content bdevs-el-content pl-105 mb-45">
                    <?php if(!empty($slide['sub_title_2'])) : ?>
                      <span class="bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($slide['sub_title_2']); ?></span>
                    <?php endif; ?>
                      <?php printf('<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            $title_2
                        ); ?>
                       <?php if(!empty($slide['description_2'])) : ?>
                      <p><?php echo bdevs_element_kses_intermediate($slide['description_2']); ?></p>
                    <?php endif; ?>
                   </div>
                </div>
             </div>
             <?php endforeach; ?>
             <?php endif; ?>
        </div>

        <?php elseif ($settings['design_style'] === 'style_9'):
        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);


        ?>

        <section class="intro-area">
            <div class="container">
                <div class="row service-intro-top-up g-0">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center">
                        <div class="section_title_wrapper bdevs-el-content pl-50 pr-70">
                         <?php if(!empty($settings['sub_title'])) : ?>
                            <span class="subtitle bdevs-el-subtitle">
                         <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span>
                            <?php endif; ?>  

                            <?php if(!empty($settings['title'])) : ?>                     
                            <h2 class="section-title bdevs-el-title">
                                <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                            </h2>
                            <?php endif; ?>

                            <?php if(!empty($settings['description'])) : ?>
                            <p class="pt-30 pb-25 "><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <div class="check-use mb-40">
                              <?php foreach ($settings['slides'] as $slide): ?>
                                <a href="<?php echo esc_url($slide['title_url']); ?>"><?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?> 
                                <?php echo bdevs_element_kses_basic($slide['title']); ?></a>

                              <?php endforeach; ?>
                            </div>
                            <div class="abinfro-btn d-flex align-items-center">

                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                printf( '<a %1$s><span>%2$s</span></a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] )
                                    );
                            elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn bdevs-btn--icon-before' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                    <?php
                                else :
                                    $this->add_render_attribute( 'button', 'class', 'bdevs-btn--icon-after' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>>
                                        <span><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span>
                                    </a>
                                <?php
                                endif;
                                endif; ?>

                            </div>
                        </div>
                    </div> 
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="intro-right">
                        <img src="<?php echo esc_url($image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                            <div class="intro-btn">
                                <a class="play-btn popup-video play-btn-ext" href="<?php echo esc_url( $settings['video_url'] ); ?>"><i class="flaticon-play-button"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


     <?php elseif ($settings['design_style'] === 'style_8'):
        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        $this->add_render_attribute( 'button2', 'class', 'btn-download bdevs-el-btn-sec' );
        $this->add_link_attributes( 'button2', $settings['button_link2'] );


        ?>

        <section class="intro-area">
            <div class="container">
                <div class="row abintro-top-up g-0">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center wow fadeInUp2" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                        <div class="section_title_wrapper bdevs-el-content pl-50 pr-70 wow fadeInUp2" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp2;">
                            <?php if(!empty($settings['sub_title'])) : ?>
                            <span class="subtitle bdevs-el-subtitle">
                               <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span>
                            <?php endif; ?>
                            <?php if(!empty($settings['title'])) : ?>
                            <h2 class="section-title bdevs-el-title">
                                <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                            </h2>
                            <?php endif; ?>

                            <?php if(!empty($settings['description'])) : ?>
                            <p class="pt-30 pb-30 "><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <div class="abinfro-btn d-flex align-items-center">

                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                printf( '<a %1$s><span>%2$s</span></a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] )
                                    );
                            elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn bdevs-btn--icon-before' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                    <?php
                                else :
                                    $this->add_render_attribute( 'button', 'class', 'bdevs-btn--icon-after' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>>
                                        <span><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span>
                                    </a>
                                <?php
                                endif;
                                endif; ?>

                              <?php if ( !empty($settings['button_text2']) ) : ?>
                                    <?php if ( $settings['button_text2'] && ( ( empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) && empty( $settings['button_icon2'] ) ) ) :
                                            printf( '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string( 'button2' ),
                                                esc_html( $settings['button_text2'] )
                                                );
                                        elseif ( empty( $settings['button_text2'] ) && ( ( !empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) || !empty( $settings['button_icon2'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2' ); ?></a>
                                        <?php elseif ( $settings['button_text2'] && ( ( !empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) || !empty($settings['button_icon2']) ) ) :
                                            if ( $settings['button_icon_position2'] === 'before' ): ?>
                                                <a <?php $this->print_render_attribute_string( 'button2' ); ?>><span><?php bdevs_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2'] ); ?></span> <?php echo esc_html($settings['button_text2']); ?></a>
                                                <?php
                                            else: ?>
                                                <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo esc_html($settings['button_text2']); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2'] ); ?></span></a>
                                            <?php
                                            endif;
                                    endif; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div> 
                    <div class="col-xxl-6 col-xl-6 col-lg-6 wow fadeInUp2" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp2;">
                        <div class="intro-right">
                            <img src="<?php echo esc_url($image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                            <?php if (!empty($settings['video_url'])): ?>
                            <div class="intro-btn">
                                <a class="play-btn popup-video play-btn-ext" href="<?php echo esc_url( $settings['video_url'] ); ?>"><i class="flaticon-play-button"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php elseif ($settings['design_style'] === 'style_7'):
        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="tagent__area mb-90 grey-bg-3 pt-110 pb-40">
            <?php if(!empty($image_1)) : ?>
                <div class="tagent__bg" style="background-image: url(<?php echo esc_url($image_1); ?>);"></div>
            <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center">
                        <div class="section_title_wrapper pr-70">
                            <?php if(!empty($settings['sub_title'])) : ?>
                            <span class="subtitle bdevs-el-subtitle">
                                <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span> 
                            <?php endif; ?>

                            <?php if(!empty($settings['title'])) : ?>                      
                            <h2 class="section-title">
                                <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                            </h2>
                            <?php endif; ?>
                            <?php if(!empty($settings['description'])) : ?>
                                <p class="pt-30 mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            
                            <?php if(!empty($settings['button_text'])) : ?>
                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                    printf('<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string('button'),
                                        esc_html($settings['button_text']),
                                        esc_url($settings['button_link']['url'])
                                    );
                                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                    if ($settings['button_icon_position'] === 'before'): ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                    <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>>
                                            <span><?php echo esc_html($settings['button_text']); ?></span>
                                            <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        </a>
                                    <?php
                                    endif;
                                endif; ?>
                            <?php endif; ?>
                        </div>
                    </div> 
                </div>
            </div>
         </section>

        <?php elseif ($settings['design_style'] === 'style_6'):
        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        ?>

        <div class="information">
            <?php if(!empty($settings['title'])) : ?>
            <h3 class="information__title mb-25">
                <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
            </h3>
            <?php endif; ?>

            <?php if(!empty($settings['description'])) : ?>
            <p class="mb-30"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
            <?php endif; ?>
            <div class="row">
                <div class="col-xxl-6">
                    <div class="information-info">
                        <ul>
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <li><?php echo bdevs_element_kses_intermediate($slide['title']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <?php if(!empty($image_1)) : ?>
                    <div class="information-right">
                        <img src="<?php echo esc_url($image_1); ?>" alt="img">
                        <div class="information__wrapper d-flex align-items-center theme-bg">
                            <div class="information__wrapper-icon">
                                <i class="fal fa-headset"></i>
                            </div>
                            <div class="information__wrapper-cell">
                                <span> <?php esc_html('Call for support', 'visapass') ?></span>
                            <h5><a href="tel:<?php echo esc_url($settings['number']); ?>"><?php echo bdevs_element_kses_intermediate($settings['number']); ?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_5'):

        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        $this->add_inline_editing_attributes('description', 'basic');
        $this->add_render_attribute('button', 'class', 'business-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);
        $this->add_inline_editing_attributes('extra_title', 'basic');
        $this->add_render_attribute('extra_title', 'bdevs-el-title');

        ?>

        <div class="necessary">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <?php if(!empty($image_1)) : ?>
                    <div class="necessary__box-thumb">
                        <img src="<?php echo esc_url($image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6">
                    <div class="necessary__box">
                        <?php if(!empty($settings['title'])) : ?>
                        <h4 class="necessary__title mb-25">
                            <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                        </h4>
                        <?php endif; ?>

                        <ul class="necessary-link mb-20">
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <li><i class="fal fa-check-square"></i><?php echo bdevs_element_kses_basic($slide['title']); ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <?php if(!empty($settings['button_text'])) : ?>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_4'):

        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['image_2']['id'])) {
            $image_2 = wp_get_attachment_image_url($settings['image_2']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['image_3']['id'])) {
            $image_3 = wp_get_attachment_image_url($settings['image_3']['id'], $settings['thumbnail_size']);
        }if (!empty($settings['image_4']['id'])) {
            $image_4 = wp_get_attachment_image_url($settings['image_4']['id'], $settings['thumbnail_size']);
        }
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title about-span mb-30 bdevs-el-title');
        $this->add_inline_editing_attributes('description', 'basic');
        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '1.2s');
        $this->add_link_attributes('button', $settings['button_link']);
        $this->add_inline_editing_attributes('extra_title', 'basic');
        $this->add_render_attribute('extra_title', 'bdevs-el-title');

        ?>

        <!-- About  start here -->
        <section class="about-area">
            <div class="container">
                <div class="row wow fadeInUp2" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30">
                        <div class="section_title_wrapper">
                            <?php if(!empty($settings['sub_title'])) : ?>
                            <span class="subtitle bdevs-el-subtitle">
                                <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                            ); ?>
                            <div class="section_title_wrapper-about-content">
                                <?php if(!empty($settings['extra_title'])) : ?>
                                    <h5 <?php echo $this->get_render_attribute_string('extra_title'); ?>><?php echo bdevs_element_kses_intermediate($settings['extra_title']); ?></h5>
                                <?php endif; ?>
                                <?php if(!empty($settings['description'])) : ?>
                                <p <?php echo $this->get_render_attribute_string('description'); ?>><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($settings['button_text'])) : ?>
                                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                        printf('<a %1$s href="%3$s">%2$s</a>',
                                            $this->get_render_attribute_string('button'),
                                            esc_html($settings['button_text']),
                                            esc_url($settings['button_link']['url'])
                                        );
                                    elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                    <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                        if ($settings['button_icon_position'] === 'before'): ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                        <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                                <span><?php echo esc_html($settings['button_text']); ?></span>
                                                <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            </a>
                                        <?php
                                        endif;
                                    endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30">
                        <div class="about_wrapper">
                            <?php if(!empty($image_1)) : ?>
                            <div class="about_wrapper__certificate">
                                <img src="<?php echo esc_url($image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                            </div>  
                            <?php endif; ?>
                            <div class="about_wrapper__group">
                                <?php if(!empty($image_2)) : ?>
                                 <div class="about_wrapper__group-top mb-15">
                                     <img src="<?php echo esc_url($image_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_2), '_wp_attachment_image_alt', true); ?>">
                                 </div>
                                 <?php endif; ?>
                                 <div class="about_wrapper__group-btm d-flex align-items-center justify-content-end">
                                    <?php if(!empty($image_3)) : ?>
                                     <div class="about_wrapper__group-btm-img1 ml-30">
                                         <img src="<?php echo esc_url($image_3); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_3), '_wp_attachment_image_alt', true); ?>">
                                     </div>
                                     <?php endif; ?>
                                    <?php if(!empty($image_4)) : ?>
                                        <div class="about_wrapper__group-btm-img2 ml-15">
                                             <img src="<?php echo esc_url($image_4); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_4), '_wp_attachment_image_alt', true); ?>">
                                        </div>
                                    <?php endif; ?>
                                 </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </section>
        <!-- About  end here -->
    <?php elseif ($settings['design_style'] === 'style_3'):

        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('button', 'class', 'theme-btn blacks-hover bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'scholarship__wrapper-title mb-30 bdevs-el-title');
        ?>

        <!-- Scholarship Programs start here -->
        <section class="scholarship-area d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 ">
                        <?php if(!empty($image_1)) : ?>
                         <div class="scholarship-left">
                             <img src="<?php echo esc_url($image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                         </div>
                         <?php endif; ?>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 wow fadeInUp2">
                            <div class="scholarship__wrapper pt-110 pb-90">
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                ); ?>
                                <?php if(!empty($settings['description'])) : ?>
                                <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>
                                <div class="scholarship__wrapper-img mb-40">
                                    <?php if(!empty($settings['slides_2'])) : ?>
                                        <?php foreach($settings['slides_2'] as $key => $slide) :
                                            if (!empty($slide['country_image']['id'])) {
                                                $country_image = wp_get_attachment_image_url($slide['country_image']['id'], $settings['thumbnail_size']);
                                            }
                                        ?>
                                            <?php if(!empty($country_image)) : ?>
                                                <img src="<?php echo esc_url($country_image); ?>" alt="img">
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if(!empty($settings['date_label'] || $settings['start_date'] || $settings['end_date'] )) : ?>
                                    <h5>
                                    <?php if(!empty($settings['date_label'])) : ?>
                                        <?php echo bdevs_element_kses_intermediate($settings['date_label']); ?>
                                    <?php endif; ?>
                                     : 
                                    <?php if(!empty($settings['start_date'])) : ?>
                                        <?php echo bdevs_element_kses_intermediate($settings['start_date']); ?>
                                    <?php endif; ?>
                                      - 
                                      <?php if(!empty($settings['end_date'])) : ?>
                                            <?php echo bdevs_element_kses_intermediate($settings['end_date']); ?>
                                        <?php endif; ?>
                                  </h5>
                                <?php endif; ?>
                                <?php if(!empty($settings['button_text'])) : ?>
                                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                        printf('<a %1$s href="%3$s">%2$s</a>',
                                            $this->get_render_attribute_string('button'),
                                            esc_html($settings['button_text']),
                                            esc_url($settings['button_link']['url'])
                                        );
                                    elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                    <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                        if ($settings['button_icon_position'] === 'before'): ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                        <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                                <span><?php echo esc_html($settings['button_text']); ?></span>
                                                <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            </a>
                                        <?php
                                        endif;
                                    endif; ?>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Scholarship Programs end here -->

    <?php elseif ($settings['design_style'] === 'style_2'):
        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title');
        $this->add_inline_editing_attributes('title', 'advanced');
        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);
        ?>


        <!-- Globall-2 area start -->
        <section class="global-area wow fadeInUp2" data-wow-delay="0.3s">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="section_title_wrapper global-text mb-30 bdevs-el-content">
                            <?php if ($settings['sub_title']): ?>
                            <span class="subtitle bdevs-el-subtitle">
                                <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                            ); ?>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                printf( '<a %1$s><span>%2$s</span></a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] )
                                    );
                            elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn bdevs-btn--icon-before' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                    <?php
                                else :
                                    $this->add_render_attribute( 'button', 'class', 'bdevs-btn--icon-after' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>>
                                        <span><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <?php if(!empty($image_1)) : ?>
                        <div class="global-area-img">
                            <img src="<?php echo $image_1; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="global-border">
                    <hr>
                </div>
            </div>
        </section>
        <!-- Globall-2 area end -->


    <?php else:
        if (!empty($settings['image_1']['id'])) {
            $image_1 = wp_get_attachment_image_url($settings['image_1']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['image_2']['id'])) {
            $image_2 = wp_get_attachment_image_url($settings['image_2']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['about_badge_thumbnail']['id'])) {
            $about_badge_thumbnail = wp_get_attachment_image_url($settings['about_badge_thumbnail']['id'], $settings['thumbnail_size']);
        }
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title about-span mb-30');
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute('button', 'class', 'theme-btn bdevs-el-btn');
        $this->add_link_attributes('button', $settings['button_link']);
        ?>

        <!-- About-2 area start here -->
        <section class="about-area-2 wow fadeInUp2" data-wow-delay="0.3s">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30">
                        <div class="about2-left d-flex bdevs-el-content">
                            <?php if(!empty($image_1)) : ?>
                            <div class="about2-left__img1 mr-10">
                                <img src="<?php echo $image_1; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_1), '_wp_attachment_image_alt', true); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="about2-left__img2">
                                <?php if(!empty($image_2)) : ?>
                                <img src="<?php echo esc_url($image_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_2), '_wp_attachment_image_alt', true); ?>">
                                <?php endif; ?>
                                <?php if(!empty($settings['about_badge_thumbnail'] || $settings['about_badget_title'] || $settings['about_badget_year'] )) : ?>
                                    <div class="about2-left__info d-flex align-items-center">
                                        <?php if(!empty($about_badge_thumbnail)) : ?>
                                        <div class="about2-left__info__left mr-15">
                                            <img src="<?php echo esc_url($about_badge_thumbnail); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($about_badge_thumbnail), '_wp_attachment_image_alt', true); ?>">
                                        </div>
                                        <?php endif; ?>
                                        <div class="about2-left__info__right">
                                            <?php if (!empty($settings['about_badget_title'])): ?>
                                            <h4><?php echo bdevs_element_kses_intermediate($settings['about_badget_title']); ?></h4>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['about_badget_year'])): ?>
                                            <p><?php echo bdevs_element_kses_intermediate($settings['about_badget_year']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30">
                        <div class="section_title_wrapper bdevs-el-content">
                            <?php if ($settings['sub_title']): ?>
                            <span class="subtitle bdevs-el-subtitle">
                                <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                            </span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                            ); ?>
                            <?php if ($settings['description']): ?>
                            <div class="section_title_wrapper__about-content mb-40">
                                <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            </div>
                        <?php endif; ?>
                        </div>
                        <div class="about-trust">
                            <div class="row">
                                <?php foreach ($settings['slides'] as $slide): ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="about2__item d-flex  mb-20 mr-20">
                                        <?php if (!empty($slide['selected_icon'])): ?>
                                        <div class="about2__icon">
                                            <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="about2__content">
                                            <?php if (!empty($slide['title'])) : ?>
                                                <h4 class="bdevs-el-title"><?php echo bdevs_element_kses_basic($slide['title']); ?></h4>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['description'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                printf( '<a %1$s><span>%2$s</span></a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] )
                                    );
                            elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn bdevs-btn--icon-before' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                    <?php
                                else :
                                    $this->add_render_attribute( 'button', 'class', 'bdevs-btn--icon-after' );
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>>
                                        <span><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span>
                                    </a>
                                <?php
                                endif;
                                endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-2 area end here -->


    <?php endif; ?>
        <?php
    }
}
