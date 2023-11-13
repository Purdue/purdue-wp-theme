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

if ( ! function_exists( '_purdueBrand_convert_heading' ) ) {
	function _purdueBrand_convert_heading($class)
	{
		switch ($class) {
			case 'is-1':
			$heading = 'h1';
			break;

			case 'is-2':
			$heading = 'h2';
			break;

			case 'is-3':
			$heading = 'h3';
			break;

			case 'is-4':
			$heading = 'h4';
			break;

			case 'is-5':
			$heading = 'h5';
			break;

			case 'is-6':
			$heading = 'h6';
			break;

			default:
			$heading = 'h3';
			break;
		}
		return $heading;
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
					<button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion'.$data->column.'id" aria-controls="sect'.$data->column.'">'.$data->header.'
					<svg aria-hidden="true" class="accordion__icon accordion__icon__plus" width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<title>plus_icon</title>
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<g stroke="#cfb991" stroke-width="4">
								<circle cx="26" cy="26" r="24"></circle>
								<line x1="26.5" y1="14" x2="26.5" y2="38" stroke-linecap="round" stroke-linejoin="round"></line>
								<line x1="25.6896552" y1="14.5116279" x2="25.6896552" y2="38.6976744" stroke-linecap="round" stroke-linejoin="round" transform="translate(25.6897, 26.6047) rotate(-90) translate(-25.6897, -26.6047)"></line>
							</g>
						</g>
					</svg>
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
	
if ( ! function_exists( 'purdueBrand_header_links' ) ) {
	function purdueBrand_header_links($file)
	{
		$directory = trailingslashit( get_template_directory_uri() ).'json/';
		$url = $directory . $file;
		$request = wp_remote_get( "$url" );
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		$linkGroups=$data->linkGroups;
		$featuredStory=$data->featuredStory;
		$output='';

		if(($linkGroups && sizeof($linkGroups)>0)){
			foreach ($data->linkGroups as $key=>$linkGroup) {  
				if($linkGroup->type == "normal"){					
					$output.='<div class="navbar-find-info__item">';
				}else{
					$output.='<div class="navbar-find-info__item navbar-find-info__item-highlighted">';
				}
				$output.='<button class="accordion__heading" aria-expanded="false" id="findInfoItem-button-'.$key.'" aria-controls="findInfoItem-list-'.$key.'">
							'.$linkGroup->header.'
							</button>';
				$output.='<ul class="accordion__content hide" id="findInfoItem-list-'.$key.'" aria-labelledby="findInfoItem-button-'.$key.'">';
				foreach ($linkGroup->links as $link) {
					$external=$link->external?"_blank":"_self";  
					$output.='<li><a href="'.$link->link_url.'" target="'.$external.'">'.$link->link_text.'</a></li>';
				}
				$output.='</ul>';
				$output.='</div>';
			}
		}
		if($featuredStory && $featuredStory->is_included){
			if($featuredStory->description){
				$output.='<p class="navbar-find-info__item-intro">'.$featuredStory->description.'</p>';
			}
			if($featuredStory->link_url){
				$output.='<a href="'.$featuredStory->link_url.'" class="navbar-find-info__item-link">'.$featuredStory->link_text.'</a>';
			}
		}
		echo $output;
	}
}

if ( ! function_exists( 'purdueBrand_header_buttons' ) ) {
	function purdueBrand_header_buttons($file)
	{
		$directory = trailingslashit( get_template_directory_uri() ).'json/';
		$url = $directory . $file;
		$request = wp_remote_get( "$url" );
		$body = wp_remote_retrieve_body( $request );
		$linkGroups = json_decode( $body );
		$output='';

		if(($linkGroups && sizeof($linkGroups)>0)){
			foreach ($linkGroups as $linkGroup) {  
				$output.='<li><a href="'.$linkGroup->link_url.'">'.$linkGroup->link_text.'</a></li>';
			}
		}
		echo $output;
	}
}

if ( ! function_exists( 'purdue_search_placeholder_google' ) ) {
	function purdue_search_placeholder_google()
	{	

		$body = file_get_contents(__DIR__ . '/../json/search-quick-links.json');
		$data = json_decode( $body );
		$output = '';
		foreach ($data->links as $key => $link) {  
			$output.=$link->link_text;
			if($key!=sizeof($data->links)-1){
				$output.=", ";
			}
		}

		return $output;
	}
}
if ( ! function_exists( 'purdue_search_placeholder_wordpress' ) ) {
	function purdue_search_placeholder_wordpress()
	{
		$placeholderText_1 = get_theme_mod('quick_link_1_text', '');	
		$placeholderText_2 = get_theme_mod('quick_link_2_text', '');
		$placeholderText_3 = get_theme_mod('quick_link_3_text', '');
		$placeholderText_4 = get_theme_mod('quick_link_4_text', '');
		$placeholderText_5 = get_theme_mod('quick_link_5_text', '');
		$placeholdertexts=[];
	
		if($placeholderText_1 !=""){
			$placeholdertexts[]=$placeholderText_1;
		}
		if($placeholderText_2 !=""){
			$placeholdertexts[]=$placeholderText_2;
		}
		if($placeholderText_3 !=""){
			$placeholdertexts[]=$placeholderText_3;
		}
		if($placeholderText_4 !=""){
			$placeholdertexts[]=$placeholderText_4;
		}
		if($placeholderText_5 !=""){
			$placeholdertexts[]=$placeholderText_5;
		}
		$placeholder=implode( ', ', $placeholdertexts ); 
		
		return $placeholder;
	}
}
if ( ! function_exists( 'purdue_search_popular_google' ) ) {
	function purdue_search_popular_google()
	{
		$body = file_get_contents(__DIR__ . '/../json/search-quick-links.json');
		$data = json_decode( $body );
		$output='<div class="purdue-home-search-bar__links"><span>Most Popular Searches:</span><ul>';
		foreach ($data->links as $key => $link) {  
			$output.='<li><a href="'.$link->link_url.'">'.$link->link_text.'</a>';
			if($key!=sizeof($data->links)-1){
				$output.=",";
			}
			$output.="</li>";
		}
		$output.="</ul></div>";
		return $output;
	}
}
if ( ! function_exists( 'purdue_search_popular_wordpress' ) ) {
	function purdue_search_popular_wordpress()
	{
		$placeholderText_1 = get_theme_mod('quick_link_1_text', '');	
		$placeholderText_2 = get_theme_mod('quick_link_2_text', '');
		$placeholderText_3 = get_theme_mod('quick_link_3_text', '');
		$placeholderText_4 = get_theme_mod('quick_link_4_text', '');
		$placeholderText_5 = get_theme_mod('quick_link_5_text', '');
		$link_1 = get_theme_mod('quick_link_1_text', '');	
		$link_2 = get_theme_mod('quick_link_2_text', '');
		$link_3 = get_theme_mod('quick_link_3_text', '');
		$link_4 = get_theme_mod('quick_link_4_text', '');
		$link_5 = get_theme_mod('quick_link_5_text', '');
		$links=[];
		if($link_1 !="" && $placeholderText_1 !=""){
			$link=array(
				"link_text" => $placeholderText_1,
				"link_URL" => $link_1,
			);
			array_push($links, $link);
		}
		if($link_2 !="" && $placeholderText_2 !=""){
			$link=array(
				"link_text" => $placeholderText_2,
				"link_URL" => $link_2,
			);
			array_push($links, $link);
		}
		if($link_3 !="" && $placeholderText_3!=""){
			$link=array(
				"link_text" => $placeholderText_3,
				"link_URL" => $link_3,
			);
			array_push($links, $link);

		}
		if($link_4 !="" && $placeholderText_4!=""){
			$link=array(
				"link_text" => $placeholderText_4,
				"link_URL" => $link_4,
			);
			array_push($links, $link);

		}
		if($link_5 !="" && $placeholderText_5!=""){
			$link=array(
				"link_text" => $placeholderText_5,
				"link_URL" => $link_5,
			);
			array_push($links, $link);

		}
	if(sizeof($links)>0){
		$output='<div class="purdue-home-search-bar__links"><span>Most Popular Searches:</span><ul>';
		foreach ($links as $key=>$link) {  
			$output.='<li><a href="'.$link['link_URL'].'">'.$link['link_text'].'</a>';
			if($key!=sizeof($links)-1){
				$output.=",";
			}
			$output.="</li>";
		}
		$output.="</ul></div>";
		return $output;
	}
	}
}
if ( ! function_exists( 'purdue_search_trending' ) ) {
	function purdue_search_trending()
	{
		$directory = trailingslashit( get_template_directory_uri() ).'json/';
		$url = $directory . 'trending-search-items.json';
		$request = wp_remote_get( "$url" );
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		$output='<ul>';
		foreach ($data->links as $key => $link) {  
			$output.='<li><a href="'.$link->link_url.'">'.$link->link_text.'</a>';
			$output.="</li>";
		}
		$output.="</ul>";
		return $output;
	}
}
if ( ! function_exists( 'purdue_404_trending' ) ) {
	function purdue_404_trending()
	{
		$directory = trailingslashit( get_template_directory_uri() ).'json/';
		$url = $directory . 'trending-search-items.json';
		$request = wp_remote_get( "$url" );
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		$output='<ul class="purdue-home-button-list">';
		foreach ($data->links as $key => $link) {  
			$output.='<li><a class="purdue-home-button" href="'.$link->link_url.'">'.$link->link_text.'</a>';
			$output.="</li>";
		}
		$output.="</ul>";
		return $output;
	}
}