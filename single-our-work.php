<?php
/**
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<?php if(function_exists('bcn_display')&&!has_block('bcn/breadcrumb-trail')) : ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">   
    <?php bcn_display();	?>
</div>
<?php endif; ?>

<main id="site-content" role="main" class="main-content">

	<?php

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			the_content();			
		}
	}
	?>

	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden" aria-label="Back to Top Button">
			<span class="icon"><i class="fa-solid fa-arrow-up" aria-hidden="true"></i></span>
		</button>
	<?php } ?>
</main><!-- #site-content -->

<?php get_footer(); ?>
