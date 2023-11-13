<?php
/**
 * Navigation Functions
 *
 * @package purdue-wp-theme
 */

 if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'top-nav' => esc_html__( 'Top Navifation', 'purdue-home-theme' ),
		'second-nav' => esc_html__( 'Top Second Navifation', 'purdue-home-theme' ),
		'quick-links' => esc_html__( 'Helpful Links On Header', 'purdue-home-theme' ),
		'other-links' => esc_html__( 'Quick Links On Header', 'purdue-home-theme' ),
	));
	register_nav_menus( array(
			'footer-links-1' => esc_html__( 'Footer Links column 1', 'purdue-home-theme' ),
			'footer-links-2' => esc_html__( 'Footer Links column 2', 'purdue-home-theme' ),
			'footer-links-3' => esc_html__( 'Footer Links column 3', 'purdue-home-theme' ),
			'footer-links-4' => esc_html__( 'Footer Links column 4', 'purdue-home-theme' ),
		)
	 );		
}


// main navigation
if ( ! function_exists( 'purdueHome_navigation' ) ) {
	function purdueHome_navigation()
	{
		wp_nav_menu( array(
			'theme_location'    => 'top-nav',
			'depth'             => 3,
			'container'         => false,
			'items_wrap'    	=> '%3$s',
			'menu_class'        => '',
			'fallback_cb'       => 'purdueHome_nav_primary::fallback',
			'walker'            => new purdueHome_nav_mainlMenu()
			)
		);
	}
}

// quick links
if ( ! function_exists( 'purdueHome_quicklinks' ) ) {
	function purdueHome_quicklinks()
	{
		$location = 'quick-links';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => '',
				'container_class' => '',
				'items_wrap'=> '<ul class="navbar-quick-links">%3$s</ul>'
			)); 
		endif;
	}
}
// other links
if ( ! function_exists( 'purdueHome_otherlinks' ) ) {
	function purdueHome_otherlinks()
	{
		$location = 'other-links';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => '',
				'container_class' => '',
				'items_wrap'=> '<ul class="navbar-other-links">%3$s</ul>'
			)); 
		endif;
	}
}
//Top second navigation
if ( ! function_exists( 'purdueHome_secondNav' ) ) {
	function purdueHome_secondNav()
	{
		global $post;
		$location = 'second-nav';
		$menu_obj = false;
		$menu_name = false;		
		if (function_exists('get_field')) {	
			$menu_obj = get_field( "second_menu" );
			$menu_name = wp_get_nav_menu_object($menu_obj)->name;
			if( !$menu_obj ) {
				if ($post->post_parent) {
					$menu_obj = get_field( "second_menu", $post->post_parent );
				}
			}
		}
		
		if (!$menu_obj) {
			if (has_nav_menu($location)){
				$menu_obj = purdue_get_menu_by_location($location); 
				$menu_name = $menu_obj->name;
			}
		}	

		if ($menu_obj){
			wp_nav_menu( array( 
				'menu'  => $menu_obj,
				'depth'             => 4,
				'container'         => false,
				'items_wrap'        => '%3$s',
				'menu_class'        => '',
				'fallback_cb'       => 'purdueHome_nav_primary::fallback',
				'walker'            => new purdueHome_nav_mainlMenu()
				)); 
		}
	}
}

// Top second menu
if ( ! function_exists( 'purdueBrand_topSecondMenu' ) ) {
	function purdueBrand_topSecondMenu()
	{
		global $post;
		$location = 'side-nav';
		$menu_obj = false;
		$menu_name = false;
		if ( class_exists('acf') ) {
			$menu_obj = get_field( "subnav_menu" );
			$menu_name = wp_get_nav_menu_object($menu_obj)->name;
			if( !$menu_obj ) {
				if ($post->post_parent) {
					$menu_obj = get_field( "subnav_menu", $post->post_parent );
				}
			}
		}
		
		if (!$menu_obj) {
			if (has_nav_menu($location)){
				$menu_obj = purdue_get_menu_by_location($location); 
				$menu_name = $menu_obj->name;
			}
		}
		if ($menu_obj){
			wp_nav_menu( array(
				'menu'  => $menu_obj,
				'depth'             => 0,
				'container'         => false,
				'items_wrap'    	=> '%3$s',
				'menu_class'        => '',
				'fallback_cb'       => 'purdueBrand_nav_blackBar::fallback',
				'walker'            => new purdueBrand_nav_secondnav()
				)
			);
		}
	}
}

//side navigation
if ( ! function_exists( 'purdueBrand_sideNav' ) ) {
	function purdueBrand_sideNav()
	{
		global $post;
		$location = 'side-nav';
		$menu_obj = false;
		$menu_name = false;
		if ( class_exists('acf') ) {
			$menu_obj = get_field( "subnav_menu" );
			$menu_name = wp_get_nav_menu_object($menu_obj)->name;
			if( !$menu_obj ) {
				if ($post->post_parent) {
					$menu_obj = get_field( "subnav_menu", $post->post_parent );
				}
			}
		}
		
		if (!$menu_obj) {
			if (has_nav_menu($location)){
				$menu_obj = purdue_get_menu_by_location($location); 
				$menu_name = $menu_obj->name;
			}
		}	

		if ($menu_obj){
			wp_nav_menu( array( 
				'menu'  => $menu_obj,
				'depth'             => 4,
				'container'         => false,
				'items_wrap'        => '<button class="accordion__heading" aria-expanded="true" aria-disabled="true" id="side-nav-button" aria-controls="side-nav">'.$menu_name.'</button><ul class="accordion__content navbar-menu" id="side-nav" aria-labelledby="side-nav-button">%3$s</ul>',
				'menu_class'        => '',
				'fallback_cb'       => 'purdueBrand_nav_sidenav::fallback',
				'walker'            => new purdueBrand_nav_sidenav()
				)); 
		}
	}
}

//footer social links
if ( ! function_exists( 'purdueBrand_footerSocial' ) ) {
	function purdueBrand_footerSocial()
	{
		$location = 'footer-social';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'depth'             => 1,
				'container'         => false,
				'items_wrap'    	=> '%3$s',
				'menu_class'        => '',
				'fallback_cb'       => 'purdueBrand_nav_footerSocial::fallback',
				'walker'            => new purdueBrand_nav_footerSocial()
				)); 
		endif;
	}
}
// Footer signature links

if ( ! function_exists( 'purdueBrand_signatureLinks' ) ) {
	function purdueBrand_signatureLinks()
	{
		$location = 'footer-signatureLinks';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => '',
				'items_wrap'=> '<ul>%3$s</ul>'
			)); 
		endif;
	}
}

//Global footer links columns
if ( ! function_exists( 'purdueHome_footerLinks_1' ) ) {
	function purdueHome_footerLinks_1()
	{
		$location = 'footer-links-1';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion1id" aria-controls="sect1">'.$menu_obj->name.'
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
				</button></h2><ul class="accordion__content--footer" id="sect1" aria-labelledby="accordion1id">%3$s</ul>'
			)); 
		endif;
	}
}
if ( ! function_exists( 'purdueHome_footerLinks_2' ) ) {
	function purdueHome_footerLinks_2()
	{
		$location = 'footer-links-2';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion2id" aria-controls="sect2">'.$menu_obj->name.'
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
				</button></h2><ul class="accordion__content--footer" id="sect2" aria-labelledby="accordion2id">%3$s</ul>'
			)); 
		endif;
	}
}
if ( ! function_exists( 'purdueHome_footerLinks_3' ) ) {
	function purdueHome_footerLinks_3()
	{
		$location = 'footer-links-3';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion3id" aria-controls="sect3">'.$menu_obj->name.'
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
				</button></h2><ul class="accordion__content--footer" id="sect3" aria-labelledby="accordion3id">%3$s</ul>'
			)); 
		endif;
	}
}
if ( ! function_exists( 'purdueHome_footerLinks_4' ) ) {
	function purdueHome_footerLinks_4()
	{
		$location = 'footer-links-4';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion4id" aria-controls="sect4">'.$menu_obj->name.'
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
				</button></h2><ul class="accordion__content--footer" id="sect4" aria-labelledby="accordion4id">%3$s</ul>'
			)); 
		endif;
	}
}

if ( ! function_exists( 'purdue_get_menu_by_location' ) ) {
	function purdue_get_menu_by_location( $location ) {
		if( empty($location) ) return false;

		$locations = get_nav_menu_locations();
		if( ! isset( $locations[$location] ) ) return false;

		$menu_obj = get_term( $locations[$location], 'nav_menu' );

		return $menu_obj;
	}
}
