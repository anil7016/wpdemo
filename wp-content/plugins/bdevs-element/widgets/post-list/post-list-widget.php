<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Core\Schemes;
use \Elementor\Group_Control_Background;
Use \Elementor\Core\Schemes\Typography;
use \BdevsElement\BDevs_El_Select2;

defined('ABSPATH') || die();


class Post_List extends BDevs_El_Widget
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
        return 'post_list';
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
        return __('Post List', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/widgets/post-list/';
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
        return 'eicon-parallax';
    }

    public function get_keywords()
    {
        return ['posts', 'post', 'post-list', 'list', 'news'];
    }

    /**
     * Get a list of All Post Types
     *
     * @return array
     */
    public function get_post_types()
    {
        $post_types = bdevs_element_get_post_types([], ['elementor_library', 'attachment']);
        return $post_types;
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
                    'style_2' => __('Style 2: Service', 'bdevselement'),
                    'style_3' => __('Style 3', 'bdevselement'),
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
                    'design_style' => ['style_1'],
                ], 
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .blog__thumb::after',
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
                    '{{WRAPPER}}  .blog__thumb::after' => 'opacity: {{SIZE}};',
                ],
                // 'condition' => [
                //     'background_overlay_background' => [ 'classic', 'gradient' ],
                // ],
            ]
        );


        $this->end_controls_section(); 

        $this->start_controls_section(
            '_section_post_list',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => __('Source', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key($this->get_post_types()),
            ]
        );

        $this->add_control(
            'show_post_by',
            [
                'label' => __('Show post by:', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'default' => 'recent',
                'options' => [
                    'recent' => __('Recent Post', 'bdevselement'),
                    'selected' => __('Selected Post', 'bdevselement'),
                ],

            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Item Limit', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'dynamic' => ['active' => true],
                'condition' => [
                    'show_post_by' => ['recent']
                ]
            ]
        );

        $repeater = [];

        foreach ($this->get_post_types() as $key => $value) {

            $repeater[$key] = new Repeater();

            $repeater[$key]->add_control(
                'title',
                [
                    'label' => __('Title', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __('Customize Title', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'post_short_text',
                [
                    'label' => __('Short Content', 'bdevselement'),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'placeholder' => __('Short Content', 'bdevselement'),
                    'rows' => 3,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'list_btn_text',
                [
                    'label' => __('BTN Text', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('Read More', 'bdevselement'),
                    'placeholder' => __('Link Text', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $repeater[$key]->add_control(
                'service_author_name',
                [
                    'label' => __('Author Name', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('Jon Williamson', 'bdevselement'),
                    'placeholder' => __('Author Name', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                        'design_style' => ['style_1']
                    ]
                ]
            );


            $repeater[$key]->add_control(
                'post_id',
                [
                    'label' => __('Select ', 'bdevselement') . $value,
                    'label_block' => true,
                    'type' => BDevs_El_Select2::TYPE,
                    'multiple' => false,
                    'placeholder' => 'Search ' . $value,
                    'data_options' => [
                        'post_type' => $key,
                        'action' => 'bdevs_element_post_list_query'
                    ],
                ]
            );

            $this->add_control(
                'selected_list_' . $key,
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater[$key]->get_controls(),
                    'title_field' => '{{ title }}',
                    'condition' => [
                        'show_post_by' => 'selected',
                        'post_type' => $key
                    ],
                ]
            );
        }

        $this->end_controls_section();

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => __('Layout', 'bdevselement'),
                'label_block' => false,
                'type' => Controls_Manager::CHOOSE,
                'default' => 'list',
                'options' => [
                    'list' => [
                        'title' => __('List', 'bdevselement'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'inline' => [
                        'title' => __('Inline', 'bdevselement'),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label' => __('Featured Image', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'post_image',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ],
                'condition' => [
                    'feature_image' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'list_icon',
            [
                'label' => __('List Icon', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-check-circle',
                    'library' => 'reguler'
                ],
                'condition' => [
                    'list_icon' => 'yes',
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'meta',
            [
                'label' => __('Show Meta', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'design_style' => ['style_1', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'author_meta',
            [
                'label' => __('Author', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'author_icon',
            [
                'label' => __('Author Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'author_meta' => 'yes',
                    'design_style' => ['style_1', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'date_meta',
            [
                'label' => __('Date', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'date_icon',
            [
                'label' => __('Date Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-calendar-check',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'date_meta' => 'yes',
                    'design_style' => ['style_1', 'style_3']
                ]
            ]
        );
        $this->add_control(
            'comments_meta',
            [
                'label' => __('Comments', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_3']
                ]
            ]
        );

        $this->add_control(
            'category_meta',
            [
                'label' => __('Category', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_11']
                ]
            ]
        );

        $this->add_control(
            'category_icon',
            [
                'label' => __('Category Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-folder-open',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'category_meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_11']
                ]
            ]
        );

        $this->add_control(
            'meta_position',
            [
                'label' => __('Meta Position', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'top' => __('Top', 'bdevselement'),
                    'bottom' => __('Bottom', 'bdevselement'),
                ],
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_3']
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
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'item_align',
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
                'selectors_dictionary' => [
                    'left' => 'justify-content: flex-start',
                    'center' => 'justify-content: center',
                    'right' => 'justify-content: flex-end',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a' => '{{VALUE}};'
                ],
                'condition' => [
                    'view' => 'list',
                ]
            ]
        );

        $this->end_controls_section();
    }

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
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if (!$settings['post_type']) return;
        $args = [
            'post_status' => 'publish',
            'post_type' => $settings['post_type'],
        ];
        if ('recent' === $settings['show_post_by']) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        $selected_post_type = 'selected_list_' . $settings['post_type'];

        $customize_title = [];
        $customize_text = [];
        $customize_btn = [];
        $ids = [];
        if ('selected' === $settings['show_post_by']) {
            $args['posts_per_page'] = -1;
            $lists = $settings['selected_list_' . $settings['post_type']];
            if (!empty($lists)) {
                foreach ($lists as $index => $value) {
                    $post_id = !empty($value['post_id']) ? $value['post_id'] : 0;
                    $ids[] = $post_id;
                    if ($value['title']) $customize_title[$post_id] = $value['title'];
                    if ( $value['list_btn_text'] ) $customize_btn[$post_id] = $value['list_btn_text'];
                    if ( $value['post_short_text'] ) $customize_text[$post_id] = $value['post_short_text'];
                }
            }
            $args['post__in'] = (array)$ids;
            $args['orderby'] = 'post__in';
        }

        if ('selected' === $settings['show_post_by'] && empty($ids)) {
            $posts = [];
        } else {
            $posts = get_posts($args);
        }

        $this->add_render_attribute('title', 'class', '');?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_3'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'blog__content__title bdevs-el-title')
        ?>

        <!-- Blog start -->
        <section class="blog-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($posts as $inx => $post):
                        $categories = get_the_category($post->ID);
                    ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <article class="blog mb-30">
                            <?php if ('yes' === $settings['feature_image']): ?>
                            <div class="blog__thumb">
                                <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php _e('image not found', 'bdevselement'); ?>"></a> 
                            </div>
                            <?php endif; ?>
                            <div class="blog__content bdevs-el-content">
                                <?php if('top'== $settings['meta_position']) : ?>
                                    <?php if ('yes' === $settings['meta']): ?>
                                        <div class="blog-meta">
                                            <?php if ( 'yes' === $settings['author_meta'] ): ?>
                                                <span>
                                                    <?php if ( $settings['author_icon'] ): 
                                                        Icons_Manager::render_icon( $settings['author_icon']);
                                                        endif; 
                                                    ?>
                                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></a>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['date_meta']): ?>
                                            <span><?php Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                                                            echo get_the_date("M d, Y"); ?> </span>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['comments_meta']): ?>
                                                <span><i class="far fa-comments"></i><a href="<?php comments_link(); ?>">(<?php comments_number(); ?>)</a></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="blog-text">
                                    <?php $title = $post->post_title;
                                    if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                        $title = $customize_title[$post->ID];
                                        $btn_text = $customize_btn[$post->ID];
                                    }
                                    printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        esc_html($title),
                                        esc_url(get_the_permalink($post->ID))
                                    ); ?>
                                    <?php $content = $post->post_content;
                                        if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_text)) {
                                            $content = $customize_text[$post->ID];
                                        }
                                    ?>
                                     <p><?php echo bdevs_element_kses_basic(wp_trim_words($content, 11)); ?></p>
                                     <div class="read-more">
                                         <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php echo !empty($btn_text) ? $btn_text : 'Read More'; ?> <i class="fal fa-long-arrow-right"></i></a>
                                     </div>
                                </div>
                                <?php if('bottom'== $settings['meta_position']) : ?>
                                    <?php if ('yes' === $settings['meta']): ?>
                                        <div class="blog-meta visapass-meta-bottom">
                                            <?php if ( 'yes' === $settings['author_meta'] ): ?>
                                                <span>
                                                    <?php if ( $settings['author_icon'] ): 
                                                        Icons_Manager::render_icon( $settings['author_icon']);
                                                        endif; 
                                                    ?>
                                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></a>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['date_meta']): ?>
                                            <span><?php Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                                                            echo get_the_date("M d, Y"); ?> </span>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['comments_meta']): ?>
                                                <span><i class="far fa-comments"></i><a href="<?php comments_link(); ?>">(<?php comments_number(); ?>)</a></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Blog end -->
        <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'):
        ?>
        <!-- service -->
        <div class="container">
            <div class="row">
                <?php
                    foreach ($posts as $inx => $post):
                    $categories = get_the_category($post->ID);
                    $author_bio_avatar_size = 55;
                    $this->add_render_attribute('title', 'class', 'features__content-title bdevs-el-title');
                ?>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 mb-30 wow fadeInUp2" data-wow-delay="0.3s">
                    <div class="features">
                        <?php if ('yes' === $settings['feature_image']): ?>
                        <div class="features__thumb">
                           <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php echo get_post_meta($post->ID, '_wp_attachment_image_alt', true); ?>"></a> 
                        </div>
                        <?php endif; ?>
                        <div class="features__content">
                            <?php $title = $post->post_title;
                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                    $title = $customize_title[$post->ID];
                                    $btn_text = $customize_btn[$post->ID];
                                }
                                printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    esc_html($title),
                                    esc_url(get_the_permalink($post->ID))
                                ); ?>

                                <?php $content = $post->post_content;
                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_text)) {
                                    $content = $customize_text[$post->ID];
                                }
                            ?>
                            <?php $content = $post->post_content;
                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_text)) {
                                    $content = $customize_text[$post->ID];
                                }
                            ?>
                             <p class="mb-25"><?php echo bdevs_element_kses_basic(wp_trim_words($content, 15)); ?></p>
                            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php echo !empty($btn_text) ? $btn_text : 'Read More'; ?> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php else:

            $this->add_render_attribute('title', 'class', 'blog2__content__title mb-25 bdevs-el-title');

            if (!empty($posts)): ?>
                <div class="visapass-blog-list-area">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($posts as $inx => $post):
                                $categories = get_the_category($post->ID);
                            ?>
                           <div class="col-xxl-6 col-xl-6">
                                <article class="blog-2 d-flex align-items-center mb-30">
                                    <?php if ('yes' === $settings['feature_image']): ?>
                                    <div class="blog__thumb2 mr-30">
                                        <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php _e('image not found', 'bdevselement'); ?>"></a> 
                                    </div>
                                    <?php endif; ?>
                                    <div class="blog2__content">
                                        <?php if ('yes' === $settings['meta']): ?>
                                        <div class="blog-meta blog2-meta mb-20">
                                            <?php if ( 'yes' === $settings['author_meta'] ): ?>
                                                <span> 
                                                    <?php if ( $settings['author_icon'] ): 
                                                        Icons_Manager::render_icon( $settings['author_icon']);
                                                        endif; 
                                                    ?>
                                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></a>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['date_meta']): ?>
                                                <span> 
                                                    <?php Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                                                    echo get_the_date("M d, Y"); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="blog-text">
                                            <?php $title = $post->post_title;
                                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                                    $title = $customize_title[$post->ID];
                                                    $btn_text = $customize_btn[$post->ID];
                                                }
                                                printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                                    tag_escape($settings['title_tag']),
                                                    $this->get_render_attribute_string('title'),
                                                    esc_html($title),
                                                    esc_url(get_the_permalink($post->ID))
                                                ); ?>

                                                <?php $content = $post->post_content;
                                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_text)) {
                                                    $content = $customize_text[$post->ID];
                                                }
                                                ?>
                                                    <p class="mb-25"><?php echo bdevs_element_kses_basic(wp_trim_words($content, 11)); ?></p>
                                            <div class="read-more">
                                                <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php echo !empty($btn_text) ? $btn_text : 'Read More'; ?> <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                           </div>
                           <?php endforeach; ?>
                    </div>
                </div>
                
            <?php
            else:
                printf('%1$s %2$s %3$s',
                    __('No ', 'bdevselement'),
                    esc_html($settings['post_type']),
                    __('Found', 'bdevselement')
                );
            endif;
            ?>
        <?php endif;
    }
}
