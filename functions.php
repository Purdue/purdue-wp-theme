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

// add second logo
// function purdue_customizer_footer_mark($wp_customize)
// {
//     // add a setting
//     $wp_customize->add_setting('footer_mark');
//     // Add a control to upload the hover logo
//     $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_mark', array(
//             'label' => 'Footer Mark',
//             'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
//             'settings' => 'footer_mark',
//             'priority' => 8 // show it just below the custom-logo
//         )));
// }
// add_action('customize_register', 'purdue_customizer_footer_mark');

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
      //Dateline line on posts
//   acf_add_local_field_group(array(
//     'key' => 'group_5ea9cbe1bfa6d',
//     'title' => 'Date line with social share buttons',
//     'fields' => array(
//         array(
//             'key' => 'field_5ea9cc2e54212',
//             'label' => 'Include Date?',
//             'name' => 'date',
//             'type' => 'checkbox',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//                 'width' => '',
//                 'class' => '',
//                 'id' => '',
//             ),
//             'choices' => array(
//                 'Yes' => 'Yes',
//             ),
//             'allow_custom' => 0,
//             'default_value' => array(
//                 0 => 'Yes',
//             ),
//             'layout' => 'vertical',
//             'toggle' => 0,
//             'return_format' => 'value',
//             'save_custom' => 0,
//         ),
//         array(
//             'key' => 'field_5ea9cc6354213',
//             'label' => 'Include social share buttons below the header?',
//             'name' => 'social_header',
//             'type' => 'checkbox',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//                 'width' => '',
//                 'class' => '',
//                 'id' => '',
//             ),
//             'choices' => array(
//                 'Yes' => 'Yes',
//             ),
//             'allow_custom' => 0,
//             'default_value' => array(
//                 0 => 'Yes',
//             ),
//             'layout' => 'vertical',
//             'toggle' => 0,
//             'return_format' => 'value',
//             'save_custom' => 0,
//         ),
        
//         array(
//             'key' => 'field_5ea9cca054214',
//             'label' => 'Include social share button at the bottom?',
//             'name' => 'social_bottom',
//             'type' => 'checkbox',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//                 'width' => '',
//                 'class' => '',
//                 'id' => '',
//             ),
//             'choices' => array(
//                 'Yes' => 'Yes',
//             ),
//             'allow_custom' => 0,
//             'default_value' => array(
//             ),
//             'layout' => 'vertical',
//             'toggle' => 0,
//             'return_format' => 'value',
//             'save_custom' => 0,
//         ),
//     ),
//     'location' => array(
//         array(
//             array(
//                 'param' => 'post_type',
//                 'operator' => '==',
//                 'value' => 'post',
//             ),
//         ),
//         array(
//             array(
//                 'param' => 'post_type',
//                 'operator' => '==',
//                 'value' => 'faculty_post',
//             ),
//         ),
//         array(
//             array(
//                 'param' => 'post_type',
//                 'operator' => '==',
//                 'value' => 'page',
//             ),
//         ),
//     ),
//     'menu_order' => 0,
//     'position' => 'side',
//     'style' => 'default',
//     'label_placement' => 'top',
//     'instruction_placement' => 'label',
//     'hide_on_screen' => '',
//     'active' => true,
//     'description' => '',
// ));

endif;
