<?php
/**
 *  The template for displaying search pages
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<main id="site-content" role="main" class="main-content">
	<section class="section container">
		<div class="columns is-centered">
			<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
				<div class="content">
					<h1>Search <?php echo get_bloginfo( 'name' ); ?></h1>
					<div class="form-group search-box search-box-fullwidth">
						<form action="<?php echo esc_url( home_url( '/' ) );?>/search" id="cse-search-box-fullwidth" method="get">
							<span class="sr-only">Search for:</span>
							<input type="search" class="search-field" placeholder="Google Custom Search" name="q" value='<?php echo isset($_GET['q']) ? $_GET['q'] : ""; ?>'>
							<button type="submit" class="search-button"><span class="sr-only">Submit</span>
								<i class="fas fa-search search-icon"></i>
							</button>
						</form>
					</div>
					<script>
						(function() {
							var cx = '000644513606665216020:olj7bswxyxf';
							var gcse = document.createElement('script');
							gcse.type = 'text/javascript';
							gcse.async = true;
							gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(gcse, s);
						})();
					</script>
					<gcse:searchresults-only></gcse:searchresults-only>
				</div>
			</div>
		</div>
	</section>

	<button id="to-top" class="to-top-hidden">
		<i class="fas fa-chevron-up" aria-hidden="true"></i>
	</button>
</main><!-- #site-content -->

<?php get_footer(); ?>
