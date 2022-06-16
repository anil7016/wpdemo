<?php

namespace BdevsElement\Widget;


use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;


defined('ABSPATH') || die();

class Heading extends BDevs_El_Widget
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
        return 'heading';
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
        return __('Heading', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/widgets/gradient-heading/';
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
        return 'eicon-t-letter';
    }

    public function get_keywords()
    {
        return ['gradient', 'advanced', 'heading', 'title', 'colorful'];
    }

    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ],
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
                'rows' => 4,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4']
                ]
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Description Text', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_3']
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

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
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
                'placeholder' => 'http://elementor.bdevs.net/',
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
                'default' => 'before',
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
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
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

        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
                 'condition' => [
                    'design_style' => 'style_2'
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


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();


        ?>
        <?php if ($settings['design_style'] === 'style_4'):
        $title = bdevs_element_kses_basic($settings['title']);
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title');

        ?>

        <div class="section_title_wrapper text-center wow fadeInUp2">                     
            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                tag_escape($settings['title_tag']),
                $this->get_render_attribute_string('title'),
                $title
            ); ?>
        </div>

    <?php elseif ($settings['design_style'] === 'style_3'):
        $title = bdevs_element_kses_basic($settings['title']);
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title');
    ?>

        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section_title_wrapper mb-50">
                        <?php if(!empty($settings['sub_title'])) : ?>
                        <span class="subtitle">
                            <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                        </span>
                        <?php endif; ?>
                        <?php printf('<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            $title
                        ); ?>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                   <div class="section-title-right bdevs-el-content mb-30 mr-20">
                    <?php if ($settings['description']) : ?>
                       <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                    <?php endif; ?>
                   </div>
                </div>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_2'):
        $title = bdevs_element_kses_basic($settings['title']);
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title');
        $this->add_inline_editing_attributes('button', 'none');
        $this->add_render_attribute('button', 'class', 'theme-btn blacks-hover bdevs-el-btn');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
    ?>
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6">
                    <div class="section_title_wrapper mb-30">
                        <?php if ($settings['sub_title']) : ?>
                        <span class="subtitle bdevs-el-subtitle">
                            <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                        </span>
                        <?php endif; ?>  
                        <?php printf('<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            $title
                        ); ?>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 d-flex align-items-center justcont-cn justify-content-end">
                    <?php if ($settings['button_text']) : ?>
                    <div class="calltoaction-btn text-right">
                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                            printf('<a %1$s href="%3$s">%2$s</a>',
                                $this->get_render_attribute_string('button'),
                                esc_html($settings['button_text']),
                                esc_url($settings['button_link']['url'])
                            );
                        elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                        <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            if ($settings['button_icon_position'] === 'before'): ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                </a>
                            <?php
                            else: ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                    <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                            <?php
                            endif;
                        endif; ?>   
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else:
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title bdevs-el-title');
        $title = bdevs_element_kses_basic($settings['title']);
        ?>
        <div class="container">
            <div class="row justify-content-center wow fadeInUp2" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                <div class="col-xxl-10">
                    <div class="section_title_wrapper text-center">
                        <?php if ($settings['sub_title']) : ?>
                            <span class="subtitle bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></span>
                          <?php endif; ?>
                          <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

        <?php
    }
}
