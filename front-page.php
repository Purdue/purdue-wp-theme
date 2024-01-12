<?php

/**
 * Front Page design template
 *
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<main id="site-content" role="main" class="main-content">
	<?php while (have_posts()) : the_post();
		get_template_part('template-parts/content-page', get_post_type());
	endwhile; // end of the loop. 
	?>

	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden" aria-label="Back to Top Button">
			<span class="icon"><i class="fa-solid fa-arrow-up" aria-hidden="true"></i></span>
		</button>
	<?php } ?>

</main><!-- #site-content -->

<?php get_footer(); ?>
