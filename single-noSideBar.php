<?php
/**
 * Template Name: Single Post Without Sidebar
 *
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<main id="site-content" role="main">
	<section class="container section-container">
		<div class="columns is-centered">
			<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</section>

</main><!-- #site-content -->

<?php get_footer(); ?>
