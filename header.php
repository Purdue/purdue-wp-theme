<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package purdue-home-theme
 */

 $customCSS = "";
 if (function_exists('get_field')) {	
	 $customCSS = get_field('custom_styles');
 }
 $headerSetting = "global";
 if(get_theme_mod( 'header_layout_settings' ) == "simple"){
	 $headerSetting = "simple";
 }

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight<?php if ($headerSetting == 'global'){echo " has-global-header"; }?>">
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
		<header id="header" class="header--global<?php if ( is_active_sidebar( 'sidebar-1' ) ) {echo " has-top-alert";} ?><?php if ($headerSetting == 'global'){echo " header--two-rows"; }?>">
			<nav class="navbar is-transparent purdue-top-nav<?php if ($headerSetting == 'global'){echo " purdue-top-nav__first-row"; }?>" role="navigation">
			<?php if ($headerSetting == 'simple'){ ?>	
				<div class="navbar-brand">
					<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="<?php echo get_template_directory_uri() ?>/imgs/PU-H-light.svg" alt="Purdue Logo"></a>
					
					<button class="icon is-large navbar-burger navbar-open" data-target="navbar-find-info" aria-expanded="false" aria-label="Search and menu">
						<span>MENU</span>
						<img src="<?php echo get_template_directory_uri() ?>/icons/search-menu-icon.png" aria-hidden="true" alt="" class="burger-icon">
					</button>
				</div>
				<div class="navbar-menu">
					<ul class="navbar-end menu-items">
						<?php purdueHome_navigation(); ?>
					</ul>
					<button class="icon is-large navbar-open" data-target="navbar-find-info" aria-expanded="false" aria-label="open search and menu">
						<img src="<?php echo get_template_directory_uri() ?>/icons/search-menu-icon.png" aria-hidden="true" alt="" class="burger-icon">
					</button>
				</div>
				<?php }else{ ?>
					<div class="navbar-brand">
						<div class="navbar-logo">
							<a href="https://www.purdue.edu/" class="navbar-item" rel="home"><img src="<?php echo get_template_directory_uri() ?>/imgs/PU-H-light.svg" alt="Purdue Logo"></a>
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="navbar-site-name" rel="home"><?php echo get_bloginfo( 'name' ); ?></a>
						</div>
						<div class="navbar-buttons">
							<button class="icon is-large navbar-burger navbar-open is-active" data-target="navbar-find-info" aria-expanded="false" aria-label="Search and menu">
								<img src="<?php echo get_template_directory_uri() ?>/icons/search-menu-icon.png" aria-hidden="true" alt="" class="burger-icon">
							</button>
							<button class="icon is-large navbar-close is-hidden" data-target="navbar-find-info" aria-label="close search and menu">	
								<img src="<?php echo get_template_directory_uri() ?>/imgs/close_icon_black.svg" aria-hidden="true" alt="" class="close-icon">
							</button>
						</div>
					</div>
				<?php } ?>
			</nav>
			<?php if ($headerSetting == 'global'){ ?>	
			<nav id="top-nav" class="navbar navbar-menu purdue-top-nav__second-row" role="navigation">					
				<ul class="navbar-start menu-items">
					<?php if (has_nav_menu('global-menu')) {
						purdueBrand_globalMenu();
					}else{
						purdueHome_navigation();
					} ?>
				</ul>				
			</nav>
			<?php } ?>
			<?php if ($headerSetting == 'global'){ ?>	
			<div class="navbar-find-info is-hidden is-global"  data-menu="navbar-find-info">
				<button class="icon is-large navbar-close" data-target="navbar-find-info" aria-label="close search and menu">	
					<span>CLOSE</span>
					<img src="<?php echo get_template_directory_uri() ?>/imgs/close_icon.svg" aria-hidden="true" alt="" class="close-icon">
				</button>
				<div class="navbar-find-info__items">
					<div class="nav-brand">
						<?php echo get_bloginfo( 'name' ); ?>
					</div>
					<div class="form-group search-box">
						<?php get_search_form(); ?>
					</div>	
					<div class="navbar-find-info__menu">
						<ul class="menu-items">
							<?php if (has_nav_menu('global-menu')) {
								purdueBrand_globalMenu();
							}else{
								purdueHome_navigation();
							} ?>
						</ul>
					</div>
					<div class="navbar-find-info__quicklinks">
						<span class="navbar-links-description">Helpful links</span>
						<?php if (has_nav_menu('quick-links')) {
								purdueHome_quicklinks();
							}else{ ?>
								<ul class="navbar-quick-links">
									<?php purdueBrand_header_links("global-header-buttons.json"); ?>
								</ul>
						<?php } ?>
					</div>

					<div class="navbar-other-links-wrapper">
						<span class="navbar-links-description">Quick links</span>
							<?php if (has_nav_menu('other-links')) {
								purdueHome_otherlinks();
							}else{ ?>
								<ul class="navbar-other-links">
									<?php purdueBrand_header_links("global-header-links.json"); ?>
								</ul>
							<?php } ?>
					</div>
				</div>
			</div>
			<?php }else{ ?>
				<div class="navbar-find-info is-hidden"  data-menu="navbar-find-info">
				<button class="icon is-large navbar-close" data-target="navbar-find-info" aria-label="close search and menu">	
					<span>CLOSE</span>
					<img src="<?php echo get_template_directory_uri() ?>/imgs/close_icon.svg" aria-hidden="true" alt="" class="close-icon">
				</button>
				<div class="navbar-find-info__items">
					<div class="nav-brand">
						<img src="<?php echo get_template_directory_uri() ?>/imgs/PU-H.svg" alt="Purdue Logo">
					</div>
					<div class="form-group search-box">
						<?php get_search_form(); ?>
					</div>	
					<div class="columns is-multiline">
						<div class="column">
							<ul class="menu-items">
								<?php purdueHome_navigation(); ?>
							</ul>
						</div>
						<div class="column is-narrow">
							<span class="navbar-links-description">Helpful links</span>
							<?php if (has_nav_menu('quick-links')) {
								purdueHome_quicklinks();
							}else{ ?>
								<ul class="navbar-quick-links">
									<?php purdueBrand_header_links("global-header-buttons.json"); ?>
								</ul>
						<?php } ?>
						</div>
					</div>
					<div class="navbar-other-links-wrapper">
						<span class="navbar-links-description">Quick links</span>
							<?php if (has_nav_menu('other-links')) {
								purdueHome_otherlinks();
							}else{ ?>
								<ul class="navbar-other-links">
									<?php purdueBrand_header_buttons("global-header-links.json"); ?>
								</ul>
							<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php
				if (function_exists('get_field')) {	
					$hasSecondMenu = get_field('add_second_menu');	
					$menuTitle=get_field('menu_title')?get_field('menu_title'):"Additional Links";
					if($hasSecondMenu&&$hasSecondMenu[0]=="Yes"){
			?>			
			<?php
				}
			}
			?>
		</header>

		<div id="content" class="site-content<?php if ($headerSetting == 'global'){echo " has-global-header"; }?>">
