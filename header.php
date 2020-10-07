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
	<no-script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/v4-shims.css" crossorigin="anonymous">
	</no-script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (function_exists('gtm4wp_the_gtm_tag')) {
    gtm4wp_the_gtm_tag();
} ?>
	<div id="page" class="site">
		<?php purdueBrand_skip_link_screen_reader_text(); ?>

		<?php
        if (get_theme_mod('header_layout_settings') == 'simple') {
					echo('<header id="header" class="header--simple">');
						echo('<nav class="navbar is-black purdue-navbar-black" role="navigation">');
							echo('<div class="navbar-brand">');
								echo '<a href="' . esc_url(home_url('/')) . '" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>'; 
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
						// echo('<nav class="navbar is-black purdue-navbar-black" role="navigation" data-menu="global-nav">');
						// 	echo('<div class="navbar-menu" id="blackBarMenu">');
						// 		echo('<span class="sr-only-lg">Quick Links</span>');
						// 		echo('<ul class="navbar-start">');
						// 			purdueBrand_blackBarMenu();
						// 		echo('</ul>');
						// 		echo('<div class="navbar-end">');
						// 			echo('<div class="form-group search-box">');
						// 				get_search_form();
						// 			echo('</div>');
						// 		echo('</div>');
						// 	echo('</div>');
						// echo('</nav>');
						echo('<nav class="navbar has-shadow is-black purdue-navbar-black navbar--global" data-menu="global-nav">');
							echo('<div class="navbar-brand">');
							echo '<a href="' . esc_url(home_url('/')) . '" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>'; 
								echo('<button class="icon is-large navbar-burger" data-target="global-nav">');
									echo('<i arial-hidden="true" class="fas fa-bars fa-2x burger-icon"></i><i arial-hidden="true" class="fas fa-times close-icon"></i>');
								echo('</button>');
								// echo '<a href="' . esc_url(home_url('/')) . '" class="navbar-item" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>'; 
							echo('</div>');
							echo('<ul class="navbar-start" data-menu="global-nav">');
								echo('<li class="navbar-top-item">');
									echo('<a class="navbar-top-item-link" href="#" data-for-menu="prospective-students-manual">Prospective Students</a>');
									echo('<ul data-menu="prospective-students-manual" class="mega-menu" aria-hidden="true">');
										echo('<div class="container" >');
											echo('<div class="columns is-centered">');
												echo('<div class="column mega-menu-column">');
													echo('<a class="collection-title" href="#">Academics</a>');
													echo('<a class="collection-title" href="#">Admissions</a>');
													echo('<a class="topic-title" href="#">Visit</a>');
													echo('<a class="topic-title" href="#">Apply</a>');
													echo('<a class="topic-title" href="#">Transfer</a>');
													echo('<a class="topic-title" href="#">Dates / Deadlines</a>');
													echo('<a class="topic-title" href="#">Application Status</a>');
												echo('</div>');
												echo('<div class="column mega-menu-column">');
													echo('<a class="collection-title" href="#">Costs and Financial Aid</a>');
													echo('<a class="topic-title" href="#">Cost Estimator</a>');
													echo('<a class="topic-title" href="#">Financial Aid</a>');
													echo('<a class="inner-title" href="#">> Fafsa</a>');
													echo('<a class="inner-title" href="#">> Scholarships</a>');
													echo('<a class="topic-title" href="#">Tuition and Fees</a>');
													echo('<a class="topic-title" href="#">Value (ROI)</a>');
												echo('</div>');
												echo('<div class="column mega-menu-column">');
													echo('<a class="collection-title" href="#">Campus Life</a>');
													echo('<a class="topic-title" href="#">Diversity</a>');
													echo('<a class="topic-title" href="#">Student Orgs</a>');
													echo('<a class="topic-title" href="#">Health & Wellness</a>');
													echo('<a class="topic-title" href="#">Athletics</a>');
													echo('<a class="topic-title" href="#">Arts and Ideas</a>');
													echo('<a class="topic-title" href="#">Campus Information</a>');
												echo('</div>');
												echo('<div class="column mega-menu-column">');
													echo('<a class="mega-menu-cta" href="#">Call to Action</a>');
													echo('<a class="mega-menu-cta" href="#">Call to Action</a>');
													echo('<a class="mega-menu-cta" href="#">Call to Action</a>');
												echo('</div>');
											echo('</div>');
										echo('</div>');
									echo('</ul>');
								echo('</li>');
							echo('</ul>');

							// -- Original Global menu using wordpress navigation settings -- 
							// echo('<ul class="navbar-start" data-menu="global-nav">');
							// 	purdueBrand_globalMenu();
							// echo('</ul>');
						echo('</nav>');
					echo('</header>');
				}
            

            
        ?>

		<div id="content" class="site-content">
