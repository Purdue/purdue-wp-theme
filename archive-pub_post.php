<?php

/**
  * The template for displaying an archive of publications
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<main id="site-content" role="main">
	<div class="bulma-blocks-50-50-hero">
		<div class="columns is-mobile is-gapless">
			<div class="column is-half-desktop is-half-widescreen is-half-fullhd">
				<div class="section content">
					<h1>Annual Reports</h1>
					<p>This page lists all Purdue Executive Vice President for Research and Partnerships publications.</p>
				</div>
			</div>
			<div class="column is-half-desktop is-half-widescreen is-half-fullhd">
				<span class="background-image" role="img" style="background-image:url(<?php echo (esc_url( home_url( '/' ) ));?>/app/uploads/2020/03/Landing_AnnualReports_Hero.jpg )" aria-label=""></span>
			</div>
		</div>
	</div>

	<?php
	dynamic_sidebar('pubs-all-page');
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>