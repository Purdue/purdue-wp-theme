<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package purdue-wp-theme
 */
$customCSS = "";
if (function_exists('get_field')) {	
   $customCSS = wp_strip_all_tags(html_entity_decode(get_field('custom_styles')));
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight">
<head>
	<title><?php is_front_page() ? bloginfo('name') : wp_title(''); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php 
		 if($customCSS != ""){
			echo '<style type="text/css">' . $customCSS . '</style>';
		}
		wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>

<?php if (function_exists('gtm4wp_the_gtm_tag')) {
    gtm4wp_the_gtm_tag();
} ?>
	<div id="page" class="site">
		<?php purdueBrand_skip_link_screen_reader_text(); ?>
		<?php dynamic_sidebar('top-alert'); ?>
		<?php
        if (get_theme_mod('header_layout_settings') == 'simple') {	?>
			<header id="header" class="header--simple">
				<nav class="navbar is-black purdue-navbar-black" role="navigation">
					<div class="navbar-brand">
						<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>
						<button class="icon is-large navbar-burger" data-target="simple-nav">
							<i aria-hidden="true" class="fas fa-bars fa-2x burger-icon"></i><i aria-hidden="true" class="fas fa-times close-icon"></i>
						</button>
					</div>
					<div class="navbar-end">
						<?php purdueBrand_headerButtons(); ?>
						<div class="form-group search-box">
							<?php get_search_form(); ?>
						</div>
					</div>
				</nav>
				<nav id="site-navigation" class="navbar has-shadow purdue-navbar-white" data-menu="simple-nav" role="navigation">
					<div class="navbar-menu" id="navMenu">
						<ul class="navbar-start">
							<?php purdueBrand_navigation(); ?>
						</ul>
					</div>
				</nav>
			</header>

        <?php } else if (get_theme_mod( 'header_layout_settings' ) == 'global'||get_theme_mod( 'header_layout_settings' ) == 'global2') { ?>
			<header id="header" class="header--global">
				<nav class="navbar is-black purdue-navbar-black" role="navigation">
					<div class="navbar-brand">
						<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>
						<button class="icon is-large navbar-burger" data-target="navbar-find-info" aria-expanded="false">
							<span class="icon__button-text">Purdue Menu</span>	
							<img src="<?php echo get_template_directory_uri() ?>/icons/search-menu-icon.png" aria-hidden="true" alt="" class="burger-icon">
							<img src="<?php echo get_template_directory_uri() ?>/icons/close-icon.png" aria-hidden="true" alt="" class="close-icon">
						</button>
					</div>
					<div class="navbar-menu">
						<div class="navbar-end">
							<ul class="navbar-end__quick-links">
								<?php purdueBrand_header_buttons("global-header-buttons.json");?>
							</ul>
						</div>
					</div>
				</nav>
				<div class="navbar-find-info"  data-menu="navbar-find-info">
					<div class="navbar-find-info__panel">	
						<div class="navbar-find-info__items">
							<div class="form-group search-box">
								<?php get_search_form(); ?>
							</div>	
							<ul class="navbar-find-info__quick-links">
								<?php purdueBrand_header_buttons("global-header-buttons.json");?>
							</ul>	
							<?php purdueBrand_header_links("global-header-links.json");?>
							<div class="acumin-condensed-preload" aria-hidden="true">
								Lorem
							</div>
							<div class="acumin-condensed-semibold-preload" aria-hidden="true">
								Lorem
							</div>
							<div class="acumin-semicondensed-semibold-preload" aria-hidden="true">
								Lorem
							</div>
							<div class="acumin-preload" aria-hidden="true">
								Lorem
							</div>
						</div>
					</div>
				</div>
				<div class="navbar-site-name">
					<button class="accordion__heading" aria-expanded="true" aria-disabled="true" id="global-nav-button" aria-controls="global-nav">
						<?php echo get_bloginfo( 'name' ); ?>
					</button>
				</div>
				<nav id="global-nav" class="navbar has-shadow purdue-navbar-white navbar--global accordion__content" aria-labelledby="global-nav-button" data-menu="global-nav" role="navigation">					
					<ul class="navbar-start" data-menu="global-nav">
						<?php purdueBrand_globalMenu(); ?>
					</ul>					
				</nav>
			</header>
		<?php	}	?>

		<div id="content" class="site-content">
