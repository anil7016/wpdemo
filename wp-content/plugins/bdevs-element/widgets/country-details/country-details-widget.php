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

class Country_Details extends BDevs_El_Widget {

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
        return 'country_details';
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
        return __( 'Country Details', 'bdevselement' );
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
                    'style_3' => __( 'Style 3', 'bdevselement' ),
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
                'label' => __( 'Section Title & Content', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2']
                ]
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Title', 'bdevselement' ),
                'placeholder' => __( 'Type Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'section_content',
            [
                'label' => __( 'Content', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Content', 'bdevselement' ),
                'placeholder' => __( 'Type Content', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->end_controls_section();

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
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


        $repeater->add_control(
            'sl_number',
            [
                'label' => __( 'Serial Number', 'bdevs-element' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('01', 'bdevselement'),
                'placeholder' => __( 'Type Number here', 'bdevselement' ),
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
            'title',
            [
                'label' => __( 'Title/Name', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Country Title', 'bdevselement' ),
                'placeholder' => __( 'Type Country Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
            ]
        );
 
        $repeater->add_control(
            'rank_number',
            [
                'label' => __( 'Rank Number', 'bdevs-element' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('01', 'bdevselement'),
                'placeholder' => __( 'Type Number here', 'bdevselement' ),
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
                    'field_condition' => ['style_1'],
                ],
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'default' => __('Description goes here', 'bdevselement'),
                'placeholder' => __( 'Type description here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
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
                    'field_condition' => ['style_20'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_2'],
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
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
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
            <div class="ranking-table">
                <table class="table table-bordered" style="width:100%">
                    <tr class="table-control">
                        <th ><?php echo esc_html__('SL','bdevselement'); ?> </th>
                        <th><?php echo esc_html__('Name of Universities', 'bdevselement'); ?></th>
                        <th><?php echo esc_html__('Ranking', 'bdevselement'); ?></th>
                    </tr>

                    <?php
                        foreach ( $settings['slides'] as $slide ) :
                        $title = bdevs_element_kses_basic($slide['title']);
   
                    ?>
                    <tr class="table-control">
                        <?php if( !empty($slide['sl_number']) ) : ?>
                        <td><?php echo bdevs_element_kses_basic($slide['sl_number']); ?></td>
                        <?php endif; ?>
                        <?php if($slide['title']) : ?>
                        <td><?php echo bdevs_element_kses_basic($slide['title']); ?></td>
                        <?php endif; ?>
                        <?php if( !empty($slide['rank_number']) ) : ?>
                        <td><?php echo bdevs_element_kses_basic($slide['rank_number']); ?></td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                    </table>
            </div>


            <?php elseif ( $settings['design_style'] === 'style_2' ):
                $this->add_render_attribute('title', 'class', 'bdevs-el-title');
                $this->add_inline_editing_attributes( 'title', 'basic' );
            ?>
            <div class="beautiful-cites">
                <?php if( !empty($settings['section_title']) ) : ?>
                <h3 class="united-states__title3 mb-15 bdevs-el-title"><?php echo bdevs_element_kses_basic($settings['section_title']); ?></h3>
                <?php endif; ?>
                <?php if( !empty($settings['section_content']) ) : ?>
                <p class="mb-25"><?php echo bdevs_element_kses_basic($settings['section_content']); ?></p>
                <?php endif; ?>

                <div class="beautiful-link mb-30">
                    <ul>
                        <?php
                            $_i = 0;
                            foreach ( $settings['slides'] as $slide ) :
                            $_i++;
                            $title = bdevs_element_kses_basic($slide['title']);
                            if($_i == 1) {
                                $_active_class = 'active';
                            } else {
                                $_active_class = '';
                            }
                        ?>
                        <li><a class=" <?php echo esc_attr($_active_class); ?>" href="<?php echo esc_url($slide['button_link']['url']); ?>"><?php echo bdevs_element_kses_basic($slide['title']); ?></a></li>
                        <?php endforeach; ?>

                    </ul> 
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
        <div class="united-info">
            <ul>
                <?php
                    foreach ( $settings['slides'] as $slide ) :
                    $title = bdevs_element_kses_basic($slide['title']);
                ?>
                <li>
                    <?php if( !empty($slide['title']) ) : ?>
                    <span><?php echo bdevs_element_kses_basic($slide['title']); ?></span>: 
                    <?php endif; ?>
                    <?php if( !empty($slide['sub_title']) ): ?>
                    <span><?php echo bdevs_element_kses_basic($slide['sub_title']); ?></span>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        
        <?php endif; ?>
        
        <?php
    }

}
