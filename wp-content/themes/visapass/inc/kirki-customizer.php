<?php
/**
 * visapass customizer
 *
 * @package visapass
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function visapass_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'visapass_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Visapass Customizer', 'visapass' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Topbar Setting', 'visapass' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'visapass' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'sectionheader_logo', [
        'title'       => esc_html__( 'Header Setting', 'visapass' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'visapass' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Side Info', 'visapass' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'visapass' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'visapass' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'visapass' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'footer_social', [
        'title'       => esc_html__( 'Footer Social', 'visapass' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'visapass' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'visapass' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

    $wp_customize->add_section( 'rtl_setting', [
        'title'       => esc_html__( 'RTL Setting', 'visapass' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'visapass_customizer',
    ] );

}

add_action( 'customize_register', 'visapass_customizer_panels_sections' );

function header_top_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_topbar_switch',
        'label'    => esc_html__( 'Topbar Swicher', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ]; 

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_header_right',
        'label'    => esc_html__( 'Header Right On/Off', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_showheader_search',
        'label'    => esc_html__( 'Search On/Off', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];



     // header-topbar location
    $fields[] = [
        'type'            => 'text',
        'settings'        => 'visapass_address',
        'label'           => esc_html__( 'Address', 'visapass' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( 'Our Location', 'visapass' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'link',
        'settings' => 'visapass_address_link',
        'label'    => esc_html__( 'Address URL', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];



    
    // header-topbar office opening time
    $fields[] = [
        'type'            => 'text',
        'settings'        => 'visapass_time_text',
        'label'           => esc_html__( 'Opening Time Text', 'visapass' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( 'Opening Time', 'visapass' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'            => 'text',
        'settings'        => 'visapass_time',
        'label'           => esc_html__( 'Opening Time', 'visapass' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( '8:30 AM - 9:30 PM', 'visapass' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];




    $fields[] = [
        'type'            => 'text',
        'settings'        => 'visapass_email',
        'label'           => esc_html__( 'Mail ID', 'visapass' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( 'info@example.com', 'visapass' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];



    // Apply button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_apply_btn',
        'label'    => esc_html__( 'Apply Now Button Text', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Apply Now', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'visapass_apply_link',
        'label'    => esc_html__( 'Apply Now Button URL', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'visapass_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

   // Menu right
   $fields[] = [
    'type'     => 'text',
    'settings' => 'visapass_mcontact_text',
    'label'    => esc_html__( 'Menu Right Call Text', 'visapass' ),
    'section'  => 'header_top_setting',
    'default'  => esc_html__( 'Contact Us', 'visapass' ),
    'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'visapass_topbar_switch',
            'operator' => '==',
            'value'    => true,
        ],
    ],
];
  
$fields[] = [
    'type'     => 'text',
    'settings' => 'visapass_mcontact_cell',
    'label'    => esc_html__( 'Menu Right Call Number', 'visapass' ),
    'section'  => 'header_top_setting',
    'default'  => esc_html__( '(555) 5802 3059', 'visapass' ),
    'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'visapass_topbar_switch',
            'operator' => '==',
            'value'    => true,
        ],
    ],
];

    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_button_text',
        'label'    => esc_html__( 'Button Text', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Get A Quote', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'visapassheader_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'visapass_button_link',
        'label'    => esc_html__( 'Button URL', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'visapassheader_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;

}
add_filter( 'kirki/fields', 'header_top_fields' );

/*
Header Social
 */
function header_social_fields( $fields ) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_topbar_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_topbar_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_topbar_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_topbar_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_topbar_youtube_url',
        'label'    => esc_html__( 'Youtube Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', 'header_social_fields' );

/*
Header Settings
 */
function headerheader_fields( $fields ) {

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'choose_defaultheader',
        'label'       => esc_html__( 'Choose Header Style', 'visapass' ),
        'section'     => 'sectionheader_logo',
        'default'     => 'header-style-1',
        'placeholder' => esc_html__( 'Select an option...', 'visapass' ),
        'priority'    => 10,
        'choices'     => [
            'header-style-1' => esc_html__( 'Header Style 1', 'visapass' ),
            'header-style-2' => esc_html__( 'Header Style 2', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'visapass' ),
        'description' => esc_html__( 'Upload Your Logo.', 'visapass' ),
        'section'     => 'sectionheader_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__( 'Header Logo', 'visapass' ),
        'description' => esc_html__( 'Header White Logo', 'visapass' ),
        'section'     => 'sectionheader_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_icon',
        'label'       => esc_html__( 'Preloader Icon', 'visapass' ),
        'description' => esc_html__( 'Upload Preloader Icon.', 'visapass' ),
        'section'     => 'sectionheader_logo',
        'default'     => get_template_directory_uri() . '/assets/img/preloader/preloader-icon.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__( 'Preloader Logo', 'visapass' ),
        'description' => esc_html__( 'Upload Preloader Logo.', 'visapass' ),
        'section'     => 'sectionheader_logo',
        'default'     => get_template_directory_uri() . '/assets/img/preloader/preloader-logo.png',
    ];


    return $fields;
}
add_filter( 'kirki/fields', 'headerheader_fields' );

/*
Header Side Info
 */
function header_side_fields( $fields ) {
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_hamburger_logo_hide',
        'label'    => esc_html__( 'Hamburger Logo  On/Off', 'visapass' ),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_side_hide',
        'label'    => esc_html__( 'Side Info On/Off', 'visapass' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'visapass_extra_info_logo',
        'label'       => esc_html__( 'Logo Side', 'visapass' ),
        'description' => esc_html__( 'Logo Side', 'visapass' ),
        'section'     => 'header_side_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-dark.png',
    ];
    
    

    // contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_extra_mail',
        'label'    => esc_html__( 'E-mail Address', 'visapass' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'support@gmail.com ', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_extra_phone',
        'label'    => esc_html__( 'Phone Number', 'visapass' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '+1 878 298 023', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_extra_address',
        'label'    => esc_html__( 'Office Address', 'visapass' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'street 222, South Africa', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'link',
        'settings' => 'visapass_extra_address_link',
        'label'    => esc_html__( 'Office Address Url', 'visapass' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'header_side_setting',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_side_setting',
        'label'    => esc_html__( 'Facebook Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_side_setting',
        'label'    => esc_html__( 'Twitter Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_side_setting',
        'label'    => esc_html__( 'Linkedin Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_side_setting',
        'label'    => esc_html__( 'Instagram Url', 'visapass' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', 'header_side_fields' );

/*
header_page_title_fields
 */
function header_page_title_fields( $fields ) {
    // Breadcrumb Setting

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'visapass' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'visapass' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'visapass_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'visapass' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'visapass' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_extra_email',
        'label'    => esc_html__( 'Breadcrumb Padding Top', 'visapass' ),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__( '160px', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_breadcrumb_bottom_spacing',
        'label'    => esc_html__( 'Breadcrumb Padding Bottom', 'visapass' ),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__( '160px', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_breadcrumb_bottom_spacing',
        'label'    => esc_html__( 'Breadcrumb Padding Bottom', 'visapass' ),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__( '160px', 'visapass' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'header_page_title_fields' );

/*
Header Blog fileds
 */
function header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'visapass' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'visapass' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_blog_btn_rtl',
        'label'    => esc_html__( 'Blog Button text rtl', 'visapass' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'visapass' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'visapass' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'visapass' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'header_blog_fields' );

/*
Footer
 */
function header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'select',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'visapass' ),
        'section'     => 'footer_setting',
        'default'     => 'footer-style-1',
        'placeholder' => esc_html__( 'Select an option...', 'visapass' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1' => esc_html__( 'Footer Style 1', 'visapass' ),
            'footer-style-2' => esc_html__( 'Footer Style 2', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'visapass' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'visapass' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '5' => esc_html__( 'Widget Number 5', 'visapass' ),
            '4' => esc_html__( 'Widget Number 4', 'visapass' ),
            '3' => esc_html__( 'Widget Number 3', 'visapass' ),
            '2' => esc_html__( 'Widget Number 2', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'visapass_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'visapass' ),
        'description' => esc_html__( 'Footer Background Image.', 'visapass' ),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'visapass_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'visapass' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'visapass' ),
        'section'     => 'footer_setting',
        'default'     => '#222429',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'visapass_Footer_1_menu_hover_color',
        'label'       => __( 'Footer 1 Menu Hover Color', 'visapass' ),
        'description' => esc_html__( 'This is Footer 1 Menu Hover color control.', 'visapass' ),
        'section'     => 'footer_setting',
        'default'     => '#7127ea',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];



    // copyight cell number 
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_footer_right',
        'label'    => esc_html__( 'Footer Right On/Off', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => '2',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_footer_left',
        'label'    => esc_html__( 'Footer Left On/Off', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'visapass_footer_newslatters',
        'label'    => esc_html__( 'Footer Newsletters On/Off', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'visapass' ),
            'off' => esc_html__( 'Disable', 'visapass' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'visapass_footer_logo',
        'label'       => esc_html__( 'Footer Logo', 'visapass' ),
        'description' => esc_html__( 'Footer Logo', 'visapass' ),
        'section'     => 'footer_setting',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_footer_newsletter_text',
        'label'    => esc_html__( 'Newsletters Text', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Get More Update Join Our Newsletters', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'footer_copyright_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_copyright',
        'label'    => esc_html__( 'Copy Right', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright &copy; 2022 BDevs. All Rights Reserved', 'visapass' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'footer_copyright_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_terms_condition_text',
        'label'    => esc_html__( 'Terms & Condition Text', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'link',
        'settings' => 'visapass_terms_condition_link',
        'label'    => esc_html__( 'Terms & Condition URL', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_privacy_policy_text',
        'label'    => esc_html__( 'Privacy Policy Text', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'link',
        'settings' => 'visapass_privacy_policy_url',
        'label'    => esc_html__( 'Privacy Policy URL', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];
   
      // footer copyright right
      $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_copyright_cell_text',
        'label'    => esc_html__( 'Footer Right Cell Text', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Call - Or - SMS', 'visapass' ),
        'priority' => 10,
       
    ];
      
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_copyright_cell_number',
        'label'    => esc_html__( 'Footer Right Cell Number', 'visapass' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '+1 878 298 023', 'visapass' ),
        'priority' => 10,
    ];



    return $fields;
}
add_filter( 'kirki/fields', 'header_footer_fields' );

/*
 Footer Social
 */
function footer_social_fields( $fields ) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_footer_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'visapass' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_footer_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'visapass' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_footer_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'visapass' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_footer_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'visapass' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_footer_youtube_url',
        'label'    => esc_html__( 'Youtube Url', 'visapass' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'visapass' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', 'footer_social_fields' );


// color
function visapass_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'visapass_color_option',
        'label'       => __( 'Theme Color', 'visapass' ),
        'description' => esc_html__( 'This is a Theme color control.', 'visapass' ),
        'section'     => 'color_setting',
        'default'     => '#E48216',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'visapass_primary_color',
        'label'       => __( 'visapass Primary Color', 'visapass' ),
        'description' => esc_html__( 'This is visapass primary color control.', 'visapass' ),
        'section'     => 'color_setting',
        'default'     => '#1A1C20',
        'priority'    => 10,
    ];  

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'visapass_secondary_color',
        'label'       => __( 'visapass Secondary Color', 'visapass' ),
        'description' => esc_html__( 'This is visapass secondary color control.', 'visapass' ),
        'section'     => 'color_setting',
        'default'     => '#D16C07',
        'priority'    => 10,
    ];     
    return $fields;
}
add_filter( 'kirki/fields', 'visapass_color_fields' );

// 404
function visapass_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_error_404_text',
        'label'    => esc_html__( '400 Text', 'visapass' ),
        'section'  => '404_page',
        'default'  => esc_html__( '404', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_error_title',
        'label'    => esc_html__( 'Not Found Title', 'visapass' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'visapass_error_desc',
        'label'    => esc_html__( '404 Description Text', 'visapass' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'visapass' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'visapass_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'visapass' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'visapass' ),
        'priority' => 10,
    ];
    return $fields;

}
add_filter( 'kirki/fields', 'visapass_404_fields' );

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function VISAPASS_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'visapass' ) ) {
        $value = Kirki::get_option( visapass_get_theme(), $name );
    }

    return apply_filters( 'VISAPASS_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function visapass_get_theme() {
    return 'visapass';
}