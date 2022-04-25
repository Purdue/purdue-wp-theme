<?php
/**
 *
 * Template Name: Landing Page
 * @package purdue-wp-theme
 */
?>

<?php get_header("lp"); ?>

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
			<span class="sr-only">Scroll back to the top of the page.</span>
			<i class="fas fa-chevron-up" aria-hidden="true"></i>
		</button>
	<?php } ?>
</main><!-- #site-content -->

<?php get_footer(); ?>
