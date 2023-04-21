<?php

/* 
@package purdue-wp-theme
================
Admin page
=============
*/
function admin_scripts() {

    $jsFilePath = glob( get_template_directory() . '/build/js/admin.*.js' );
    $jsFileURI = get_template_directory_uri() . '/build/js/' . basename($jsFilePath[0]);
    wp_enqueue_script( 'admin-script', $jsFileURI, array(), '1.0.0', true );    
}

function admin_styles() {
    $cssFilePath = glob( get_template_directory() . '/build/css/admin.*.css' );
    $cssFileURI = get_template_directory_uri() . '/build/css/' . basename($cssFilePath[0]);
    wp_enqueue_style( 'admin-styles', $cssFileURI );
}
add_action('admin_enqueue_scripts', 'admin_scripts');
add_action('admin_enqueue_scripts', 'admin_styles');

//fontawesome

wp_register_script( 'FontAwesome', 'https://kit.fontawesome.com/439a72c385.js', null, null, false );
wp_enqueue_script('FontAwesome');