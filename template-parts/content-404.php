<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>


<section class="section container">
		<div class="columns is-centered">
			<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
				<div class="content">
					<h1><?php _e( 'Page Not Found', 'purdue-wp-theme' ); ?></h1>
					<p><?php _e( 'We’re sorry you were not able to find the page you were looking for.', 'purdue-wp-theme' ); ?></p>

					<div class="form-group search-box search-box-fullwidth search-box-404">
						<form action="<?php echo esc_url( home_url( '/' ) );?>/search" id="cse-search-box-404" method="get">
							<span class="sr-only">Search for:</span>
							<input type="search" class="search-field" placeholder="What were you looking for?" name="q" value='<?php echo isset($_GET['q']) ? $_GET['q'] : ""; ?>'>
							<button type="submit" class="search-button"><span class="sr-only">Submit</span>
								<i class="fas fa-search search-icon"></i>
							</button>
						</form>
					</div>
					<script async src="https://cse.google.com/cse.js?cx=000644513606665216020:olj7bswxyxf"></script>
					<h2>Suggested links:</h2>
					<div class="gcse-searchresults-only" data-gname="purduesearch"></div>					
					<script>
						window.addEventListener("load", function(event) { 
							var path = window.location.pathname;
							var phrase = decodeURIComponent(path.replace(/\/+/g, ' ').trim());
							const searchElement = google.search.cse.element.getElement('purduesearch');
							searchElement.execute(phrase);
						});						
					</script>
				</div>
			</div>
		</div>
</section>


