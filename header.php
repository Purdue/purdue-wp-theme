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

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight">
<head>
	<title><?php wp_title(''); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- Font Awesome -->
	<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/v4-shims.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
	<no-script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/v4-shims.css" crossorigin="anonymous">
	</no-script>
</head>

<body <?php body_class(); ?>>
<?php if (function_exists('gtm4wp_the_gtm_tag')) {
    gtm4wp_the_gtm_tag();
} ?>
	<div id="page" class="site">
		<?php purdueBrand_skip_link_screen_reader_text(); ?>

		<?php
        if (get_theme_mod('header_layout_settings') == 'simple') {	?>
			<header id="header" class="header--simple">
				<nav class="navbar is-black purdue-navbar-black" role="navigation">
					<div class="navbar-brand">
						<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>
						<button class="icon is-large navbar-burger" data-target="simple-nav">
							<i arial-hidden="true" class="fas fa-bars fa-2x burger-icon"></i><i arial-hidden="true" class="fas fa-times close-icon"></i>
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

        <?php } else if (get_theme_mod( 'header_layout_settings' ) == 'global') { ?>
			<header id="header" class="header--global">
				<nav class="navbar is-black purdue-navbar-black" role="navigation" data-menu="global-nav">
					<div class="navbar-menu" id="blackBarMenu">
						<span class="sr-only-lg">Quick Links</span>
						<ul class="navbar-start">
							<?php purdueBrand_blackBarMenu(); ?>
						</ul>
						<div class="navbar-end">
							<div class="form-group search-box">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</nav>
				<nav class="navbar has-shadow purdue-navbar-white navbar--global" data-menu="global-nav">
					<div class="navbar-brand">
						<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H-light.svg" alt="Purdue Logo"></a>
						<button class="icon is-large navbar-burger" data-target="global-nav">
							<i arial-hidden="true" class="fas fa-bars fa-2x burger-icon"></i><i arial-hidden="true" class="fas fa-times close-icon"></i>
						</button>
					</div>
					<ul class="navbar-start" data-menu="global-nav">
						<?php purdueBrand_globalMenu(); ?>
					</ul>
				</nav>
			</header>
		<?php	}	?>

		<div id="content" class="site-content">
