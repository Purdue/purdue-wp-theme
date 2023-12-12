<?php
/**
 * Template Name: Top second nav
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); 

$location = 'side-nav';
$locations = get_nav_menu_locations();

if (has_nav_menu($location)){

	$menu_obj = get_term($locations[$location], 'nav_menu');
	$menuTitle = $menu_obj->name;

}else{

	if ( class_exists('acf') ) {
		
		$menu_obj = get_field( "subnav_menu" );
		$menuTitle = wp_get_nav_menu_object($menu_obj)->name;
	}

}
?>

	<nav class="navbar is-black purdue-second-nav tablet-hidden" role="navigation">
		<ul class="menu-items">
			<?php purdueBrand_topSecondMenu(); ?>
		</ul>
	</nav>
	<nav class="navbar is-black purdue-second-nav desktop-hidden" role="navigation">
		<button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="top-second-menu-title" aria-controls="top-second-menu">
			<?php echo $menuTitle; ?>
		</button>
		<ul class="menu-items" id="top-second-menu" aria-labelledby="top-second-menu-title">
			<?php purdueBrand_topSecondMenu(); ?>
			</ul>
		</nav>
<?php
if (function_exists('get_field')) {	
	$breadCrumb = get_field('include_bread_crumb_on_this_page')[0];
	
} else {	
	$breadCrumb = "Yes";
}
if(function_exists('bcn_display')&&!has_block('bcn/breadcrumb-trail')&&$breadCrumb=="Yes") : ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/" role="navigation">   
    <?php bcn_display();	?>
</div>
<?php endif; ?>

<main id="site-content" role="main" class="main-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>
	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden">
			<i class="fas fa-chevron-up" aria-hidden="true"></i>
		</button>
	<?php } ?>
</main><!-- #site-content -->


<?php get_footer(); ?>
