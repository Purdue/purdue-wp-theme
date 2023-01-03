<?php
/**
 * Navigation Functions
 *
 * @package purdue-wp-theme
 */

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		// 'black-bar-menu' => esc_html__( 'Black Bar Menu', 'purdue-wp-theme' ),
		'global-menu' => esc_html__( 'Global Header Primary', 'purdue-wp-theme' ),
		'top-nav' => esc_html__( 'Simple Header Primary', 'purdue-wp-theme' ),
		'side-nav' => esc_html__( 'Side Navigation', 'purdue-wp-theme' ),
		'second-nav' => esc_html__( 'Top Second Navigation', 'purdue-wp-theme' ),
		// 'footer-social' => esc_html__( 'Footer Social Links', 'purdue-wp-theme' ),	
		// 'footer-signatureLinks' => esc_html__( 'Footer Signature Links', 'purdue-wp-theme' ),	
		'header-buttons' => esc_html__( 'Header buttons', 'purdue-wp-theme' ),	
		) );
		if(get_theme_mod('header_layout_settings') == 'oldglobalfooter'){
			register_nav_menus( array(
				'footer-links-1' => esc_html__( 'Footer Links column 1', 'purdue-wp-theme' ),
				'footer-links-2' => esc_html__( 'Footer Links column 2', 'purdue-wp-theme' ),
				'footer-links-3' => esc_html__( 'Footer Links column 3', 'purdue-wp-theme' ),
				'footer-links-4' => esc_html__( 'Footer Links column 4', 'purdue-wp-theme' ),
			) );
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
// black bar menu
if ( ! function_exists( 'purdueBrand_blackBarMenu' ) ) {
	function purdueBrand_blackBarMenu()
	{
		wp_nav_menu( array(
			'theme_location'    => 'black-bar-menu',
			'depth'             => 1,
			'container'         => false,
			'items_wrap'    	=> '%3$s',
			'menu_class'        => '',
			'fallback_cb'       => 'purdueBrand_nav_blackBar::fallback',
			'walker'            => new purdueBrand_nav_blackBar()
			)
		);
	}
}

// global(?) menu
if ( ! function_exists( 'purdueBrand_globalMenu' ) ) {
	function purdueBrand_globalMenu()
	{
		wp_nav_menu( array(
			'theme_location'    => 'global-menu',
			'depth'             => 4,
			'container'         => false,
			'items_wrap'    	=> '%3$s',
			'menu_class'        => '',
			'fallback_cb'       => 'purdueBrand_nav_globalMenu::fallback',
			'walker'            => new purdueBrand_nav_globalMenu()
			)
		);
	}
}

// main navigation
if ( ! function_exists( 'purdueBrand_navigation' ) ) {
	function purdueBrand_navigation()
	{
		wp_nav_menu( array(
			'theme_location'    => 'top-nav',
			'depth'             => 4,
			'container'         => false,
			'items_wrap'    	=> '%3$s',
			'menu_class'        => '',
			'fallback_cb'       => 'purdueBrand_nav_primary::fallback',
			'walker'            => new purdueBrand_nav_globalMenu()
			)
		);
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
// Header buttons before searchbox

if ( ! function_exists( 'purdueBrand_headerButtons' ) ) {
	function purdueBrand_headerButtons()
	{
		$location = 'header-buttons';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => '',
				'container_class' => '',
				'items_wrap'=> '<ul>%3$s</ul>'
			)); 
		endif;
	}
}
//Global footer links columns
if ( ! function_exists( 'purdueBrand_footerLinks_1' ) ) {
	function purdueBrand_footerLinks_1()
	{
		$location = 'footer-links-1';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion1id" aria-controls="sect1">'.$menu_obj->name.'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h2><ul class="accordion__content--footer" id="sect1" aria-labelledby="accordion1id">%3$s</ul>'
			)); 
		endif;
	}
}
if ( ! function_exists( 'purdueBrand_footerLinks_2' ) ) {
	function purdueBrand_footerLinks_2()
	{
		$location = 'footer-links-2';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion2id" aria-controls="sect2">'.$menu_obj->name.'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h2><ul class="accordion__content--footer" id="sect2" aria-labelledby="accordion2id">%3$s</ul>'
			)); 
		endif;
	}
}
if ( ! function_exists( 'purdueBrand_footerLinks_3' ) ) {
	function purdueBrand_footerLinks_3()
	{
		$location = 'footer-links-3';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion3id" aria-controls="sect3">'.$menu_obj->name.'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h2><ul class="accordion__content--footer" id="sect3" aria-labelledby="accordion3id">%3$s</ul>'
			)); 
		endif;
	}
}
if ( ! function_exists( 'purdueBrand_footerLinks_4' ) ) {
	function purdueBrand_footerLinks_4()
	{
		$location = 'footer-links-4';
		if (has_nav_menu($location)) :
			$menu_obj = purdue_get_menu_by_location($location); 
			wp_nav_menu( array( 
				'theme_location'  => $location,
				'container'         => 'div',
				'container_class' => 'resources__column footer__links',
				'items_wrap'=> '<h2><button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion4id" aria-controls="sect4">'.$menu_obj->name.'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button></h2><ul class="accordion__content--footer" id="sect4" aria-labelledby="accordion4id">%3$s</ul>'
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
