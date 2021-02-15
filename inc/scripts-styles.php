<?php
/**
 * Scripts & Styles
 *
 * @package purdue-wp-theme
 */

if ( ! function_exists( 'purdueBrand_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function purdueBrand_scripts() {
		wp_enqueue_style( 'purdueBrand-style', get_stylesheet_uri() );
		// include the css file
		$cssFilePath = glob( get_template_directory() . '/build/css/app.*.css' );
		$cssFileURI = get_template_directory_uri() . '/build/css/' . basename($cssFilePath[0]);
		wp_enqueue_style( 'purdueBrand-brand-style', $cssFileURI );
		// include the javascript file
		$jsFilePath = glob( get_template_directory() . '/build/js/app.*.js' );
		$jsFileURI = get_template_directory_uri() . '/build/js/' . basename($jsFilePath[0]);
		wp_enqueue_script( 'purdueBrand-mainscript', $jsFileURI, array('jquery'), '1.0.0', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
}
}
add_action( 'wp_enqueue_scripts', 'purdueBrand_scripts' );
