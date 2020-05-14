<?php
/**
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<main id="site-content" role="main" class="main-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content-page', get_post_type() );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
