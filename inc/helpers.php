<?php
/**
 * Helper Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package purdue-wp-theme
 */

if ( ! function_exists( 'purdueBrand_home_link' ) ) {
	function purdueBrand_home_link($class)
	{
		if(function_exists( 'the_custom_logo' )){
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$output = '<a href="' . esc_url( home_url( '/' ) ) . '" class="' . $class . '" rel="home"><img src="'.$image[0].'" alt="Purdue Logo"></a>';
		}else{
			$output = '<a href="' . esc_url( home_url( '/' ) ) . '" class="' . $class . '" rel="home">' . get_bloginfo('name') . '</a>';
		}
		
		echo $output;
	}
}
if ( ! function_exists( 'purdue_get_excerpt' ) ) {
	function purdue_get_excerpt($content) {
		$output=preg_replace('/<figure[^>]*>.*?<\/figure>/i', ' ', $content);
		$output=strip_shortcodes($output);
		return wp_trim_words($output, 40, '...');	
	}
}

if ( ! function_exists( 'purdueBrand_skip_link_screen_reader_text' ) ) {
	function purdueBrand_skip_link_screen_reader_text()
	{
		$output = '<a class="skip-link is-sr-only" href="#content">Skip to content</a>';
		echo $output;
	}
}


if ( ! function_exists( 'purdueBrand_the_title' ) ) {
	function purdueBrand_the_title($class = 'is-3', $link = TRUE)
	{
		$heading = _purdueBrand_convert_heading($class);
		$title_before = '<' . $heading . ' class="title ' . $class . '">';
		$title_after = '</' . $heading . '>';
		if ($link === TRUE) {
			$output = the_title( sprintf( $title_before .'<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' . $title_after );
		} else {
			$output = $title_before . get_the_title() . $title_after;
		}
		echo $output;
	}
}

if ( ! function_exists( 'purdueBrand_get_comments' ) ) {
	function purdueBrand_get_comments()
	{
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

if ( ! function_exists( 'purdueBrand_footer_links' ) ) {
	function purdueBrand_footer_links($file)
	{
		$directory = trailingslashit( get_template_directory_uri() ).'json/';
		$url = $directory . $file;
		$request = wp_remote_get( "$url" );
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		$output='<div class="footer__links">';
		$output.='<h2>
					<button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion'.$data->column.'id" aria-controls="sect'.$data->column.'">'.$data->header.'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i>
					</button>
				</h2>';
		$output.='<ul class="accordion__content--footer" id="sect'.$data->column.'" aria-labelledby="accordion'.$data->column.'id">';
		foreach ($data->links as $link) {  
			$output.='<li><a href="'.$link->link_url.'">'.$link->link_text.'</a></li>';
		}
		$output.='</ul>';
		$output.='</div>';
		echo $output;
	}
}
	

