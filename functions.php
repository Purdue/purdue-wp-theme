<?php

/**
 * Purdue Brand functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package purdue-wp-theme
 * @since 1.0.0
 */

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/content-filters.php';
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

//Layout options
function purdue_layout_options($wp_customize){

    $wp_customize->add_section('layout', array(
        'title' => 'Layout Options',
        'description' => 'Select between the different Header layout, Footer layout, and Dateline options.',
        'priority' => 30
    ));
    //add header layout section
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
        'section'=>'layout',
        'settings'=>'header_layout_settings',
        'label'=>'Header Layout',
        'choices'=>array(
            'simple'=>_('Simple with fully customizable footer'),
            'global'=>_('Global with fixed first two columns of links on footer'),
            'global2'=>_('Global with fully customizable footer')
        )
    ));

    $wp_customize->add_setting('footer_layout_settings', array(
        'type'=>'theme_mod',
        'default'=>'four',
        'capability'=>'edit_theme_options',
        'transport'=>'refresh',
        'sanitize_callback'=>'purdue_footer_radio_select'
    ));

    //add controls to footer options section
    $wp_customize->add_control('footer_layout_radio', array(
        'type'=>'radio',
        'priority'=>'10',
        'section'=>'layout',
        'settings'=>'footer_layout_settings',
        'label'=>'Footer Layout',
        'choices'=>array(
            'three'=>_('Three Columns'),
            'four'=>_('Four Columns')
        )
    ));


    $wp_customize->add_setting('date_setting', array(
        'default'    => '1',
        'capability' => 'edit_theme_options'
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_dateline',
            array(
                'label'     => __('Show Date Under the Header', 'purdue-wp-theme'),
                'section'   => 'layout',
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
                'section'   => 'layout',
                'settings'  => 'social_setting',
                'type'      => 'checkbox',
            )
        )
    );
}
add_action('customize_register', 'purdue_layout_options');
add_action( 'customize_render_control_show_dateline', function(){
    printf( '<span class="customize-control-title">Dateline Options for Posts</span>');
});
function hide_footer_layout_script() {
    $jsFilePath = glob( get_template_directory() . '/build/js/customizer.*.js' );
    $jsFileURI = get_template_directory_uri() . '/build/js/' . basename($jsFilePath[0]);
    wp_enqueue_script( 'footer-customize',$jsFileURI, array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'hide_footer_layout_script' );

// add search options
function purdue_search_options($wp_customize)
{
    //add new section
    $wp_customize->add_section('search_option', array(
        'title'       => __( 'Search Options' ), //Visible title of section
        'priority'    => 55, //Determines what order this appears in
        'capability'  => 'edit_theme_options', //Capability needed to tweak
        'description' => __('Choose to use Wordpress default search to search within the site or Google Custom Search to search all of Purdue. Please note if you select Google Custom Search, you will need to create an empty page on your site, name it Search and select the Search template as its template', 'purdue-wp-theme'), //Descriptive tooltip
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
add_action('customize_register', 'purdue_search_options');

// add footer address options
function purdue_contact_options($wp_customize)
{
    //add a new panel
    $wp_customize->add_panel( 'contact_details', 
        array(
            'priority'       => 100,
            'title'            => 'Contact Details',
            'description'      => 'Contact Details displayed on the footer'
        ) 
    );

    //add new section
    $wp_customize->add_section('contact_information', array(
        'title' => 'Footer Contact Information',
        'description' => 'Set custom contact information for the site. If the address fields are left blank they will default to the Purdue University default address.',
        'priority' => 1,
        'panel'         => 'contact_details'
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
    // Address Line 3
    $wp_customize->add_setting( 'address_line_3', array(
        'capability' => 'edit_theme_options',
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
        
    $wp_customize->add_control( 'address_line_3', array(
        'type' => 'text',
        'section' => 'contact_information', // Add a default or your own section
        'label' => __( 'Address Line 3' ),
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
        'description' => 'Set custom Social Media URLs for the site.',
        'priority' => 33,
        'panel'         => 'contact_details'
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
    
}
add_action('customize_register', 'purdue_contact_options');


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
        'simple'=>_('Simple with fully customizable footer'),
        'global'=>_('Global with fixed first two columns of links on footer'),
        'global2'=>_('Global with fully customizable footer')
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
            'color' => 'rgba(0,0,0,0.65)',
        ),
        array(
            'name' => __('Transparent', 'purdue-wp-theme'),
            'slug' => 'transparent',
            'color' => 'rgba(0,0,0,0)',
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
            array(
                array(
                    'param' => 'post_template',
                    'operator' => '==',
                    'value' => 'template-topnav.php',
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
// Make breadcrumb optional on pages with top second nav
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62e83c171dbf5',
        'title' => 'Include bread crumb on this page?',
        'fields' => array(
            array(
                'key' => 'field_62e83d8f32a21',
                'label' => 'Include bread crumb on this page?',
                'name' => 'include_bread_crumb_on_this_page',
                'type' => 'checkbox',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Yes' => 'Yes',
                ),
                'allow_custom' => 0,
                'default_value' => array(
                    0 => 'Yes',
                ),
                'layout' => 'vertical',
                'toggle' => 0,
                'return_format' => 'value',
                'save_custom' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-topnav.php',
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
        'show_in_rest' => 0,
    ));
    
    endif;		

// Make breadcrumb optional on pages with default template
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_641340f3a8918',
        'title' => 'Breadcrumb setting',
        'fields' => array(
            array(
                'key' => 'field_641340f382cb3',
                'label' => 'Remove Breadcrumb on this page?',
                'name' => 'remove_breadcrumb_on_this_page',
                'aria-label' => '',
                'type' => 'checkbox',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Yes' => 'Yes',
                ),
                'default_value' => array(
                ),
                'return_format' => 'value',
                'allow_custom' => 0,
                'layout' => 'vertical',
                'toggle' => 0,
                'save_custom' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
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
        'show_in_rest' => 0,
    ));
    
    endif;		

//Custom CSS and JS acf fields
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
    acf_add_local_field_group( array(
		'key' => 'group_650c89da745d9',
		'title' => 'Custom Styles and Scripts',
		'fields' => array(
			array(
				'key' => 'field_650c89dce9501',
				'label' => 'Custom Styles',
				'name' => 'custom_styles',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'rows' => '',
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_650c8a464395b',
				'label' => 'Custom Scripts',
				'name' => 'custom_scripts',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'alert',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
} );
//image in rss feed
function rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
    $content = '<figure>' . get_the_post_thumbnail($post->ID, 'medium') .
    '</figure>' . get_the_content();
    }
    return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

//Add iframe shortcode compiler
add_shortcode( 'iframe' , 'mycustom_shortcode_iframe' );
function mycustom_shortcode_iframe($args, $content) {
    $keys = array("id", "src", "title", "frameborder", "allow");
    $arguments = mycustom_extract_shortcode_arguments($args, $keys);
    return '<iframe ' . $arguments . '></iframe>';
}
//Add script shortcode compiler
add_shortcode( 'custom-script' , 'mycustom_shortcode_script' );
function mycustom_shortcode_script($args, $content) {
    $keys = array("defer", "src");
    $arguments = mycustom_extract_shortcode_arguments($args, $keys);
    return '<script ' . $arguments . '></script>';
}

function mycustom_extract_shortcode_arguments($args, $keys) {
    $result = "";
    foreach ($keys as $key) {
        if ($key === "defer"){
            $result .= $key." ";
        }elseif (isset($args[$key])) {
            $result .= $key . '="' . $args[$key] . '" ';
        }
    }
    return $result;
}
/*
 * Find the images in a gallery and return them in a new wrapping <div>  for Square image gallery block
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block   The full block, including name and attributes.
 *
 * @return string
 */
function pu_block_wrapper_edit_image_gallery( $block_content, $block ) {
	if ( isset( $block['attrs']['className'] ) ) {
		if ( 'core/gallery' === $block['blockName'] && 'purdue-image-gallery' === $block['attrs']['className'] ) {
			$urls = [];
            $captions = [];
            $ids = [];
            $alts = [];
			preg_match_all( '/<figure[^>]*>(.*?)<\/figure>/mi', $block_content, $matches, PREG_SET_ORDER, 0 );

			foreach ( $matches as $match ) {
				preg_match("/\<img.+src\=(?:\"|\')(.+?)(?:\"|\')(?:.+?)\>/", $match[0], $matches1);
                $urls[]=$matches1[1];
                preg_match("/<figcaption[^>]*>(.*?)<\/figcaption>/mi", $match[0], $matches2);
                $captions[]=$matches2[1];
                preg_match("/\<img[^>]+alt=\"([^>]*)\"[^>]*>/iU", $match[0], $matches4);
                $alts[]=$matches4[1];

			}
            $class="is-one-quarter-widescreen";
            if ( isset( $block['attrs']['columns'] ) ) {
				if($block['attrs']['columns']<=3){
                    $class="is-one-third-widescreen";
                }
            }
			$output = "<div class='purdue-image-gallery purdue-image-gallery-core'>
            <div class='container'>
            <div class='columns is-multiline'>";
            for($i=0; $i<sizeof($urls); $i++){
                $output.= "<div class='column is-half-tablet is-full-mobile is-one-third-desktop ".$class."'>";
                $imageClass="image-gallery-open";
                if($captions[$i] =="" ){
                    $imageClass.=" image-no-caption";
                }
                $output.= "<div class='".$imageClass."'>";
                $output.= "<div class='image is-square' role='image' data-src='".$urls[$i]."' aria-label='".$alts[$i]."'></div>";
                if($captions[$i] !="" ){
                $output.='<button class="image-modal-button" aria-label="More information">
                <i class="fas fa-plus" aria-hidden="true"></i></button>';
                }
                $output.= "</div>";
                if($captions[$i] !="" ){
                $output.='<div class="image-modal-content">
                <div class="image-modal-close"><p>'.$captions[$i].'</p></div>
                <button class="image-modal-button" aria-label="close">
                <i class="fas fa-minus" aria-hidden="true"></i></button>
                </div>';}
                $output.= "</div>";
            }
            $output.= "</div></div></div>";
			return $output;
		}
	}
	return $block_content;
}
add_filter( 'render_block', 'pu_block_wrapper_edit_image_gallery', 10, 2 );