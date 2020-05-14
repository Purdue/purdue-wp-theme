<?php
/**
 * Template Name: Sidebar Nav
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header('sidenav'); ?>

<aside class="side-nav">
	<div class="aside-wrapper">
	<h2 class="title is-5">Side Navigation Area</h2>
	<ul class="navbar-menu">
		<?php purdueBrand_sideNav();?>	
	</ul>
</div>
</aside>

<main id="site-content" role="main" class="main-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content-sidenav', get_post_type() );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_footer('sidenav'); ?>
