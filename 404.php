<?php
/**
 * The template for displaying 404 pages (Not Found)
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<main id="site-content" role="main" class="main-content">

	<?php
		get_template_part( 'template-parts/content-404', get_post_type() );
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
