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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<div id="page" class="site">
		<?php purdueBrand_skip_link_screen_reader_text(); ?>

		<?php
        if (get_theme_mod('header_layout_settings') == 'simple') {
					echo('<header id="header" class="header--simple">');
						echo('<nav class="navbar is-black purdue-navbar-black" role="navigation">');
							echo('<div class="navbar-brand">');
								echo '<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>'; 
								echo('<button class="icon is-large navbar-burger" data-target="simple-nav">');
									echo('<i arial-hidden="true" class="fas fa-bars fa-2x burger-icon"></i><i arial-hidden="true" class="fas fa-times close-icon"></i>');
								echo('</button>');
							echo('</div>');

							echo('<div class="navbar-end">');
							purdueBrand_headerButtons();
								echo('<div class="form-group search-box">');
									get_search_form();
								echo('</div>');
							echo('</div>');

						echo('</nav>');
						echo('<nav id="site-navigation" class="navbar has-shadow purdue-navbar-white" data-menu="simple-nav" role="navigation">');
							echo('<div class="navbar-menu" id="navMenu">');
								echo('<ul class="navbar-start">');
									purdueBrand_navigation();
								echo('</ul>');
								echo('</div>');
							echo('</div>');
						echo('</nav>');
					echo('</header>');

        } else if (get_theme_mod( 'header_layout_settings' ) == 'global') {
					echo('<header id="header" class="header--global">');
						echo('<nav class="navbar is-black purdue-navbar-black" role="navigation" data-menu="global-nav">');
							echo('<div class="navbar-menu" id="blackBarMenu">');
								echo('<span class="sr-only-lg">Quick Links</span>');
								echo('<ul class="navbar-start">');
									purdueBrand_blackBarMenu();
								echo('</ul>');
								echo('<div class="navbar-end">');
									echo('<div class="form-group search-box">');
										get_search_form();
									echo('</div>');
								echo('</div>');
							echo('</div>');
						echo('</nav>');
						echo('<nav class="navbar has-shadow purdue-navbar-white navbar--global" data-menu="global-nav">');
							echo('<div class="navbar-brand">');
							echo '<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H-light.svg" alt="Purdue Logo"></a>'; 
								echo('<button class="icon is-large navbar-burger" data-target="global-nav">');
									echo('<i arial-hidden="true" class="fas fa-bars fa-2x burger-icon"></i><i arial-hidden="true" class="fas fa-times close-icon"></i>');
								echo('</button>');
							echo('</div>');
							echo('<ul class="navbar-start" data-menu="global-nav">');
								purdueBrand_globalMenu();
							echo('</ul>');
						echo('</nav>');
					echo('</header>');
				}       

            
        ?>


