<?php
/**
 * Template Name: Sidebar Nav
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<?php if(function_exists('bcn_display')) : ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">   
    <?php bcn_display();	?>
</div>
<?php endif; ?>

<div id="content-sidenav" class="site-content-sidenav">

<aside class="side-nav">
	<div class="aside-wrapper">
		<?php purdueBrand_sideNav();?>	
</div>
</aside>

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

</div>

<?php get_footer(); ?>
