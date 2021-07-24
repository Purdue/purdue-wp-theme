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
				<nav class="navbar is-black purdue-navbar-black" role="navigation">
					<div class="navbar-brand">
						<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>
						<button class="icon is-large navbar-burger" data-target="navbar-find-info" aria-expanded="false">
							<span class="icon__button-text">Purdue Menu</span>	
							<img src="<?php echo get_template_directory_uri() ?>/icons/search-menu-icon.png" arial-hidden="true" class="burger-icon"><img src="<?php echo get_template_directory_uri() ?>/icons/close-icon.png" class="close-icon">
						</button>
					</div>
					<div class="navbar-menu">
						<div class="navbar-end">
							<ul class="navbar-end__quick-links">
								<li>
									<a href="https://www.purdue.edu/purdue/apply/">Apply</a>
								</li>
								<li>
									<a href="https://www.purdue.edu/purdue/visit/">Visit</a>
								</li>
								<li>
									<a href="https://www.purdue.edu/purdue/givenow/">Give</a>
								</li>
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
								<li>
									<a href="https://www.purdue.edu/purdue/apply/">Apply</a>
								</li>
								<li>
									<a href="https://www.purdue.edu/purdue/visit/">Visit</a>
								</li>
								<li>
									<a href="https://www.purdue.edu/purdue/givenow/">Give</a>
								</li>
							</ul>	
							<div class="navbar-find-info__item">
								<button class="accordion__heading" aria-expanded="true" id="findInfoItem-button-1" aria-controls="findInfoItem-list-1">Why Purdue
							</button>
								<ul class="accordion__content hide" id="findInfoItem-list-1" aria-labelledby="findInfoItem-button-1">
									<li><a href="#">Test</a></li>
									<li><a href="#">Test</a></li>
									<li><a href="#">Test</a></li>
								</ul>
							</div>
							<div class="navbar-find-info__item navbar-find-info__item-highlighted">
								<button class="accordion__heading" aria-expanded="true" id="findInfoItem-button-2" aria-controls="findInfoItem-list-2">Information For:
								</button>
								<ul class="accordion__content hide" id="findInfoItem-list-2" aria-labelledby="findInfoItem-button-2">
									<li><a href="#">Test</a></li>
									<li><a href="#">Test</a></li>
									<li><a href="#">Test</a></li>
								</ul>
							</div>
							<p class="navbar-find-info__item-intro">Impactful sentence with brand language here ollicitudin aliquam.</p> 
							<a href="#" class="navbar-find-info__item-link">Purdue’s Stories</a>
							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>

							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>

							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>

							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>

							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>

							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>

							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>
							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>
							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>
							<p>Impactful sentence with brand language here ollicitudin aliquam. <br><a href="#">Purdue’s Stories</a></p>
						</div>
					</div>
				</div>
				<nav class="navbar has-shadow purdue-navbar-white navbar--global" data-menu="global-nav">
					<div class="navbar-menu" id="navMenu">
						<ul class="navbar-start" data-menu="global-nav">
							<?php purdueBrand_globalMenu(); ?>
						</ul>
					</div>
				</nav>
			</header>
		<?php	}	?>

		<div id="content" class="site-content">
