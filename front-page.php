<?php

/**
 * Template Name: Front Page
 *
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<main id="site-content" role="main">
	<?php while (have_posts()) : the_post();
		get_template_part('template-parts/content-front_page', get_post_type());
	endwhile; // end of the loop. 
	?>

	<button id="to-top" class="to-top-hidden">
		<i class="fas fa-chevron-up" aria-hidden="true"></i>
	</button>

</main><!-- #site-content -->

<?php get_footer(); ?>
