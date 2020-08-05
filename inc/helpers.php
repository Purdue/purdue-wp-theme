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
if ( ! function_exists( 'purdueBrand_footer_logo' ) ) {
	function purdueBrand_footer_logo()
	{
		if(function_exists( 'the_custom_logo' )){
			$hlogo_id = get_theme_mod( 'custom_logo' );
			$imgH = wp_get_attachment_image_src( $hlogo_id , 'full' );
		}
		if(function_exists( 'purdue_customizer_footer_mark' )){
			$imgV = get_theme_mod( 'footer_mark' );
			
		}
		if($imgH[0]){
			if($imgV){
				$output = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="'.$imgV.'" alt="Purdue Logo"></a>';
			}else{
				$output = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="'.$imgH[0].'" alt="Purdue Logo"></a>';

			}
		
		}else{
			$output = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo('name') . '</a>';

		}
		echo $output;
	}
}
if ( ! function_exists( 'purdueBrand_blog_description' ) ) {
	function purdueBrand_blog_description($class)
	{
		$description = get_bloginfo( 'description', 'display' );
		$output = '';
		if ( $description || is_customize_preview() ) {
			$output.= '<p class="'. $class .' site-description is-hidden-mobile">'. $description . '</p>';
		}
		echo $output;
	}
}

if ( ! function_exists( 'purdueBrand_skip_link_screen_reader_text' ) ) {
	function purdueBrand_skip_link_screen_reader_text()
	{
		$output = '<a class="skip-link is-sr-only" href="#content">Skip to content</a>';
		echo $output;
	}
}

if ( ! function_exists( 'purdueBrand_menu_toggle' ) ) {
	function purdueBrand_menu_toggle()
	{
		$output = '
			<a role="button" class="navbar-burger" data-target=".navbar-menu" aria-label="menu" aria-expanded="false">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>';
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

if ( ! function_exists( 'purdueBrand_get_searchID' ) ) {
	function purdueBrand_get_searchID(){
		if(get_option( 'is_search_all_purdue' )==="part" && get_option('search_engine_code')) {
			$cx = get_option('search_engine_code');
		}else{
			$cx = '017690826183710227054:mjxnqnpskjk';
		}
		echo $cx;
	}

}	

if ( ! function_exists( 'purdueBrand_get_footerSocialLinks' ) ) {
	function purdueBrand_get_footerSocialLinks(){
		if(get_option( 'use_custom_socialLinks' ) == 0){
			echo '
		<a href="https://www.facebook.com/PurdueUniversity/" rel="noopener" target="_blank"><span class="sr-only">Facebook</span><i aria-hidden="true" class="fab fa-facebook-f"></i></a>                                     
		<a href="https://twitter.com/lifeatpurdue" rel="noopener" target="_blank"><span class="sr-only">Twitter</span><i aria-hidden="true" class="fab fa-twitter"></i></a>                                  
		<a href="https://www.youtube.com/user/PurdueUniversity" rel="noopener" target="_blank"><span class="sr-only">YouTube</span><i aria-hidden="true" class="fab fa-youtube"></i></a>                                    
		<a href="https://www.instagram.com/lifeatpurdue/" rel="noopener" target="_blank"><span class="sr-only">Instagram</span><i aria-hidden="true" class="fab fa-instagram"></i></a>                                     
		<a href="https://www.pinterest.com/lifeatpurdue/" rel="noopener" target="_blank"><span class="sr-only">Pinterest</span><i aria-hidden="true" class="fab fa-pinterest"></i></a>                                   
		<a href="https://www.snapchat.com/add/lifeatpurdue" rel="noopener" target="_blank"><span class="sr-only">Snapchat</span><i aria-hidden="true" class="fab fa-snapchat-ghost"></i></a>                                     
		<a href="https://www.linkedin.com/edu/purdue-university-18357" rel="noopener" target="_blank"><span class="sr-only">LinkedIn</span><i aria-hidden="true" class="fab fa-linkedin-in"></i></a>                                     
		';
		}else{
			$social_links_1 = get_option( 'social_links_1' );
			$social_links_1_label = get_option( 'social_links_1_label' );
			if($social_links_1){
				purdueBrand_display_socialLink($social_links_1,$social_links_1_label);
			}
			$social_links_2 = get_option( 'social_links_2' );
			$social_links_2_label = get_option( 'social_links_2_label' );
			if($social_links_2){
				purdueBrand_display_socialLink($social_links_2,$social_links_2_label);
			}
			$social_links_3 = get_option( 'social_links_3' );
			$social_links_3_label = get_option( 'social_links_3_label' );
			if($social_links_3){
				purdueBrand_display_socialLink($social_links_3,$social_links_3_label);
			}
			$social_links_4 = get_option( 'social_links_4' );
			$social_links_4_label = get_option( 'social_links_4_label' );
			if($social_links_4){
				purdueBrand_display_socialLink($social_links_4,$social_links_4_label);
			}
			$social_links_5 = get_option( 'social_links_5' );
			$social_links_5_label = get_option( 'social_links_5_label' );
			if($social_links_5){
				purdueBrand_display_socialLink($social_links_5,$social_links_5_label);
			}
			$social_links_6 = get_option( 'social_links_6' );
			$social_links_6_label = get_option( 'social_links_6_label' );
			if($social_links_6){
				purdueBrand_display_socialLink($social_links_6,$social_links_6_label);
			}
			$social_links_7 = get_option( 'social_links_7' );
			$social_links_7_label = get_option( 'social_links_7_label' );
			if($social_links_7){
				purdueBrand_display_socialLink($social_links_7,$social_links_7_label);
			}
		}
	}

}
if ( ! function_exists( 'purdueBrand_display_socialLink' ) ) {
	function purdueBrand_display_socialLink($social_link,$social_link_label){
		if($social_link_label=="Facebook"){
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Facebook</span><i aria-hidden="true" class="fab fa-facebook-f"></i></a>';
		}elseif($social_link_label=="Twitter"){
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Twitter</span><i aria-hidden="true" class="fab fa-twitter"></i></a>';                                  
		}elseif($social_link_label=="Youtube"){
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Youtube</span><i aria-hidden="true" class="fab fa-youtube"></i></a>';                                  
		}elseif($social_link_label=="Instagram"){
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Instagram</span><i aria-hidden="true" class="fab fa-instagram"></i></a>';                                  
		}elseif($social_link_label=="Pinterest"){
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Pinterest</span><i aria-hidden="true" class="fab fa-pinterest"></i></a>';                                  
		}elseif($social_link_label=="Snapchat"){
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Snapchat</span><i aria-hidden="true" class="fab fa-snapchat-ghost"></i></a>';                                  
		}else{
			echo '<a href="'.$social_link.'" rel="noopener" target="_blank"><span class="sr-only">Linkedin</span><i aria-hidden="true" class="fab fa-linkedin-in"></i></a>';                                  
		}
	}
}

if ( ! function_exists( 'purdueBrand_display_footerColumn3' ) ) {
	function purdueBrand_display_footerColumn3(){
		if(get_option( 'use_custom_footer_column_3' )==1){
			$linkTexts = array(
				get_option( 'column_3_links_1_text' ),
				get_option( 'column_3_links_2_text' ),
				get_option( 'column_3_links_3_text' ),
				get_option( 'column_3_links_4_text' ),
				get_option( 'column_3_links_5_text' ),
				get_option( 'column_3_links_6_text' )
			);
			$links = array(
				get_option( 'column_3_links_1_link' ),
				get_option( 'column_3_links_2_link' ),
				get_option( 'column_3_links_3_link' ),
				get_option( 'column_3_links_4_link' ),
				get_option( 'column_3_links_5_link' ),
				get_option( 'column_3_links_6_link' )
			);
			echo '	<h3><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion3id" aria-controls="sect3">'.get_option( 'column_3_header' ).'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h3>
					<ul role="list" class="accordion__content--footer" id="sect3" aria-labelledby="accordion3id">';
			for($in = 0; $in <6; $in++){
				if($links[$in]){
					echo '<li role="listitem"><a href="'.$links[$in].'">'.$linkTexts[$in].'</a></li>';
				}
			}
		}else{
			echo '	<h3><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion3id" aria-controls="sect3">Information <i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h3>
					<ul role="list" class="accordion__content--footer" id="sect3" aria-labelledby="accordion3id">      
						<li role="listitem"><a href="http://www.purdue.edu/newsroom/purduetoday/">Purdue Today</a></li>
						<li role="listitem"><a href="https://calendar.purdue.edu/">Calendar</a></li>
						<li role="listitem"><a href="https://www.lib.purdue.edu/">Libraries</a></li>
						<li role="listitem"><a href="https://www.purdue.edu/physicalfacilities/construction/">Construction</a></li>
						<li role="listitem"><a href="https://www.purdue.edu/bursar/tuition/calculator/">Tuition Calculator</a></li>
						<li role="listitem"><a href="http://www.purdue.edu/hr/CHL/">Center for Healthy Living</a></li>
					</ul>';
		}
	}
}
if ( ! function_exists( 'purdueBrand_display_footerColumn4' ) ) {
	function purdueBrand_display_footerColumn4(){
		if(get_option( 'use_custom_footer_column_4' )==1){
			$linkTexts = array(
				get_option( 'column_4_links_1_text' ),
				get_option( 'column_4_links_2_text' ),
				get_option( 'column_4_links_3_text' ),
				get_option( 'column_4_links_4_text' ),
				get_option( 'column_4_links_5_text' ),
				get_option( 'column_4_links_6_text' )
			);
			$links = array(
				get_option( 'column_4_links_1_link' ),
				get_option( 'column_4_links_2_link' ),
				get_option( 'column_4_links_3_link' ),
				get_option( 'column_4_links_4_link' ),
				get_option( 'column_4_links_5_link' ),
				get_option( 'column_4_links_6_link' )
			);
			echo '	<h3><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion4id" aria-controls="sect4">'.get_option( 'column_4_header' ).'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h3>
					<ul role="list" class="accordion__content--footer" id="sect4" aria-labelledby="accordion4id">';
			for($in = 0; $in <6; $in++){
				if($links[$in]){
					echo '<li role="listitem"><a href="'.$links[$in].'">'.$linkTexts[$in].'</a></li>';
				}
			}
		}else{
			echo '	<h3><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion4id" aria-controls="sect4">People <i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h3>
					<ul role="list" class="accordion__content--footer" id="sect4" aria-labelledby="accordion4id">      
						<li role="listitem"><a href="https://www.purdue.edu/hotline/">Speak Up</a></li>
						<li role="listitem"><a href="https://www.purdue.edu/diversity-inclusion/">Diversity and Inclusion</a></li>
						<li role="listitem"><a href="https://www.purdue.edu/ethics/">Ethics and Compliance</a></li>
						<li role="listitem"><a href="https://www.itap.purdue.edu/">Information Technology</a></li>
						<li role="listitem"><a href="https://www.purdue.edu/ehps/police/reports/index.html">Annual Security Report</a></li>
						<li role="listitem"><a href="https://www.purdue.edu/timely-warnings/">Timely Warnings</a></li>
					</ul>';
		}
	}
}
