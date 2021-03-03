<?php

/**
 * Purdue Brand functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package purdue-wp-theme
 * @since 1.0.0
 */

// require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/function-admin.php';

if (!function_exists('purdueBrand_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function purdueBrand_setup()
    {
        require get_template_directory() . '/inc/navigation.php';
        require get_template_directory() . '/inc/widgets.php';
        require get_template_directory() . '/inc/scripts-styles.php';
        add_theme_support('custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-width' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'purdueBrand_setup');

// add header layout options
function purdue_header_options($wp_customize)
{

    //add new section
    $wp_customize->add_section('header_layout', array(
        'title' => 'Header Layout',
        'description' => 'Select between the different Header layout options.',
        'priority' => 30
    ));

    $wp_customize->add_setting('header_layout_settings', array(
        'type'=>'theme_mod',
        'default'=>'global',
        'capability'=>'edit_theme_options',
        'transport'=>'refresh',
        'sanitize_callback'=>'purdue_header_radio_select'
    ));


    //add controls to header options section
    $wp_customize->add_control('header_layout_radio', array(
        'type'=>'radio',
        'priority'=>'10',
        'section'=>'header_layout',
        'settings'=>'header_layout_settings',
        'Label'=>'Layout',
        'choices'=>array(
            'simple'=>_('Simple'),
            'global'=>_('Global')
        )
    ));

    //add new section
    $wp_customize->add_section('dateline_option', array(
        'title'       => __( 'Dateline Options' ), //Visible title of section
        'priority'    => 50, //Determines what order this appears in
        'capability'  => 'edit_theme_options', //Capability needed to tweak
        'description' => __('Choose to include a date and/or social share buttons under the header of post.', 'purdue-wp-theme'), //Descriptive tooltip
        ) 
    );
    $wp_customize->add_setting('date_setting', array(
        'default'    => '1',
        'capability' => 'edit_theme_options'
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_dateline',
            array(
                'label'     => __('Show Date', 'purdue-wp-theme'),
                'section'   => 'dateline_option',
                'settings'  => 'date_setting',
                'type'      => 'checkbox',
            )
        )
    );
    $wp_customize->add_setting('social_setting', array(
        'default'    => '1',
        'capability' => 'edit_theme_options'
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_social',
            array(
                'label'     => __('Show Social Share Buttons', 'purdue-wp-theme'),
                'section'   => 'dateline_option',
                'settings'  => 'social_setting',
                'type'      => 'checkbox',
            )
        )
    );
    //add new section
    $wp_customize->add_section('search_option', array(
        'title'       => __( 'Search Options' ), //Visible title of section
        'priority'    => 55, //Determines what order this appears in
        'capability'  => 'edit_theme_options', //Capability needed to tweak
        'description' => __('Choose to use Wordpress default search to search within the site or Google Custom Search to search all of Purdue. Please note if you select Google Custom Seach, you will need to create an empty page on your site, name it Search and select the Search template as its template', 'purdue-wp-theme'), //Descriptive tooltip
        ) 
    );   
    $wp_customize->add_setting('search_option_settings', array(
        'default'=>'wordpress',
        'capability'=>'edit_theme_options',
        'transport'=>'refresh',
        'sanitize_callback'=>'purdue_header_radio_search'
    ));
    $wp_customize->add_control('search_option_radio', array(
        'type'=>'radio',
        'priority'=>'15',
        'section'=>'search_option',
        'settings'=>'search_option_settings',
        'Label'=>'Select search option',
        'choices'=>array(
            'wordpress'=>_('Wordpress Default'),
            'google'=>_('Google Custom Search')
        )
    ));
}
add_action('customize_register', 'purdue_header_options');

// add footer address options
function purdue_footer_options($wp_customize)
{
    //add new section
    $wp_customize->add_section('contact_information', array(
        'title' => 'Footer Contact Information',
        'description' => 'Set custom contact information for the site. If fields are left blank they will default to the Purdue University defaults.',
        'priority' => 32
    ));

    // Address Line 1
    $wp_customize->add_setting( 'address_line_1', array(
        'capability' => 'edit_theme_options',
        'default' => 'Purdue University',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'address_line_1', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'Address Line 1' ),
        'description' => __( '' ),
    ) );

    // Address Line 2
    $wp_customize->add_setting( 'address_line_2', array(
        'capability' => 'edit_theme_options',
        'default' => '610 Purdue Mall',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'address_line_2', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'Address Line 2' ),
        'description' => __( '' ),
    ) );

    // City
    $wp_customize->add_setting( 'city', array(
        'capability' => 'edit_theme_options',
        'default' => 'West Lafayette',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'city', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'City' ),
        'description' => __( '' ),
    ) );

    // State
    $wp_customize->add_setting( 'state', array(
        'capability' => 'edit_theme_options',
        'default' => 'IN',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'state', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'State' ),
        'description' => __( '' ),
    ) );

    // Zipcode
    $wp_customize->add_setting( 'zipcode', array(
        'capability' => 'edit_theme_options',
        'default' => '47906',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'zipcode', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'Zipcode' ),
        'description' => __( '' ),
    ) );

    // Phone Number
    $wp_customize->add_setting( 'phone_number', array(
        'capability' => 'edit_theme_options',
        'default' => '765-494-4600',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'phone_number', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'Phone Number' ),
        'description' => __( '' ),
    ) );

    // Email Address
    $wp_customize->add_setting( 'email_address', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.purdue.edu/purdue/contact-us/index.php',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'email_address', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'Email Address' ),
        'description' => __( '' ),
    ) );




    //add new section
    $wp_customize->add_section('social_medias', array(
        'title' => 'Footer Social Media Link Options',
        'description' => 'Set custom Social Media URLs for the site. If fields are left blank they will default to the Purdue University defaults.',
        'priority' => 33
    ));

    // Facebook
    $wp_customize->add_setting( 'facebook', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.facebook.com/PurdueUniversity/',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'facebook', array(
        'type' => 'text',
        'section' => 'social_medias', // Add a default or your own section
        'label' => __( 'Facebook' ),
        'description' => __( '' ),
    ) );

    // Twitter
    $wp_customize->add_setting( 'twitter', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.twitter.com/LifeAtPurdue',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'twitter', array(
        'type' => 'text',
        'section' => 'social_medias', // Add a default or your own section
        'label' => __( 'Twitter' ),
        'description' => __( '' ),
    ) );

    // Instagram
    $wp_customize->add_setting( 'instagram', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.instagram.com/lifeatpurdue/',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'instagram', array(
        'type' => 'text',
        'section' => 'social_medias', // Add a default or your own section
        'label' => __( 'Instagram' ),
        'description' => __( '' ),
    ) );

    // Snapchat
    $wp_customize->add_setting( 'snapchat', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.snapchat.com/add/lifeatpurdue',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'snapchat', array(
        'type' => 'text',
        'section' => 'social_medias', // Add a default or your own section
        'label' => __( 'Snapchat' ),
        'description' => __( '' ),
    ) );

    // LinkedIn
    $wp_customize->add_setting( 'linkedin', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.linkedin.com/edu/purdue-university-18357',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'linkedin', array(
        'type' => 'text',
        'section' => 'social_medias', // Add a default or your own section
        'label' => __( 'LinkedIn' ),
        'description' => __( '' ),
    ) );

    // YouTube
    $wp_customize->add_setting( 'youtube', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.youtube.com/purdueuniversity',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'youtube', array(
        'type' => 'text',
        'section' => 'social_medias', // Add a default or your own section
        'label' => __( 'YouTube' ),
        'description' => __( '' ),
    ) );



    //add footer layout section section
    $wp_customize->add_section('footer_layout', array(
        'title' => 'Footer Layout',
        'description' => 'Select between the different Footer column layout options. The three columns layout only applies when the "Simple" headfer layout option is selected.',
        'priority' => 31
    ));

    $wp_customize->add_setting('footer_layout_settings', array(
        'type'=>'theme_mod',
        'default'=>'four',
        'capability'=>'edit_theme_options',
        'transport'=>'refresh',
        'sanitize_callback'=>'purdue_footer_radio_select'
    ));


    //add controls to header options section
    $wp_customize->add_control('footer_layout_radio', array(
        'type'=>'radio',
        'priority'=>'10',
        'section'=>'footer_layout',
        'settings'=>'footer_layout_settings',
        'Label'=>'Layout',
        'choices'=>array(
            'three'=>_('Three Columns'),
            'four'=>_('Four Columns')
        )
    ));
    
}
add_action('customize_register', 'purdue_footer_options');

function purdue_header_radio_search($input, $setting)
{
    // list of valid choices
    $valid = array(
        'wordpress'=>_('Wordpress Default'),
        'google'=>_('Google Custom Search')
    );
    // Ensure input is a slug.
    $input = sanitize_key($input);

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $valid) ? $input : 'wordpress');
}
function purdue_header_radio_select($input, $setting)
{
    // list of valid choices
    $valid = array(
        'simple'=>_('Simple'),
        'global'=>_('Global')
    );
    // Ensure input is a slug.
    $input = sanitize_key($input);

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $valid) ? $input : 'global');
}

function purdue_footer_radio_select($input, $setting)
{
    // list of valid choices
    $valid = array(
        'three'=>_('Three Columns'),
        'four'=>_('Four Columns')
    );
    // Ensure input is a slug.
    $input = sanitize_key($input);

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $valid) ? $input : 'global');
}

// Changing excerpt length
function new_excerpt_length($length)
{
    return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');
//Remove ellipsis from excerp
add_filter('excerpt_more', '__return_false');
add_theme_support('post-thumbnails');
function purdueBrand_default_colors()
{
    add_theme_support('disable-custom-colors');
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Black', 'purdue-wp-theme'),
            'slug' => 'black',
            'color' => '#000000',
        ),
        array(
            'name' => __('Boiler Gold', 'purdue-wp-theme'),
            'slug' => 'boiler-gold',
            'color' => '#cfb991',
        ),
        array(
            'name' => __('Aged Gold', 'purdue-wp-theme'),
            'slug' => 'aged-gold',
            'color' => '#8e6f3e',
        ),
        array(
            'name' => __('White', 'purdue-wp-theme'),
            'slug' => 'white',
            'color' => '#ffffff',
        ),
        array(
            'name' => __('Dust Gold', 'purdue-wp-theme'),
            'slug' => 'dust-gold',
            'color' => '#EBD99F',
        ),
        array(
            'name' => __('Field Gold', 'purdue-wp-theme'),
            'slug' => 'field-gold',
            'color' => '#DDB945',
        ),
        array(
            'name' => __('Rush Gold', 'purdue-wp-theme'),
            'slug' => 'rush-gold',
            'color' => '#DAAA00',
        ),
        array(
            'name' => __('Steel Gray', 'purdue-wp-theme'),
            'slug' => 'steel-gray',
            'color' => '#555960',
        ),
        array(
            'name' => __('Cool Gray', 'purdue-wp-theme'),
            'slug' => 'cool-gray',
            'color' => '#6F727B',
        ),
        array(
            'name' => __('Railway Gray', 'purdue-wp-theme'),
            'slug' => 'railway-gray',
            'color' => '#9D9795',
        ),
        array(
            'name' => __('Steam Gray', 'purdue-wp-theme'),
            'slug' => 'steam-gray',
            'color' => '#C4BFC0',
        ),
        array(
            'name' => __('Opaque', 'purdue-wp-theme'),
            'slug' => 'opaque',
            'color' => 'rgba(0,0,0,0.65',
        ),
        array(
            'name' => __('Transparent', 'purdue-wp-theme'),
            'slug' => 'transparent',
            'color' => 'rgba(0,0,0,0',
        )
    ));
}
add_action('after_setup_theme', 'purdueBrand_default_colors');


// add acf hero image upload field
if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_5e7911e1a097a',
        'title' => 'Post Subheading',
        'fields' => array(
            array(
                'key' => 'field_5e791227949ae',
                'label' => '',
                'name' => 'post-subheading',
                'type' => 'textarea',
                'instructions' => 'Enter the subheading for this post.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

if (is_plugin_active( 'luckywp-acf-menu-field/luckywp-acf-menu-field.php' )) {
    acf_add_local_field_group(array(
        'key' => 'group_5f56368fb4d9b',
        'title' => 'Side Navigation',
        'fields' => array(
            array(
                'key' => 'field_5f5636d19e862',
                'label' => 'Sub Menu',
                'name' => 'subnav_menu',
                'type' => 'menu',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'allow_null' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_template',
                    'operator' => '==',
                    'value' => 'template-sidenav.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}

endif;

// add the landing page header options dropdown
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6010742c75630',
        'title' => 'Landing Page Header Options',
        'fields' => array(
            array(
                'key' => 'field_60107502938b2',
                'label' => 'Select Header Style',
                'name' => 'select_header_style',
                'type' => 'select',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'standard' => 'Standard',
                    'white' => 'White',
                    'transparent' => 'Transparent',
                    'reverse' => 'Reverse',
                ),
                'default_value' => 'standard',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single-lndngpg.php',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'lndngpg',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;


//image in rss feed
function rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
    $content = '<figure>' . get_the_post_thumbnail($post->ID) .
    '</figure>' . get_the_content();
    }
    return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

