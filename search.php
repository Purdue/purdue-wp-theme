<?php
/**
 * Template Name: Search
 * @package purdue-wp-theme
 */
?>

<?php 
	get_header(); 
	$searchOption = get_theme_mod( 'search_option_settings' )?get_theme_mod( 'search_option_settings' ):"wordpress";
?>

<main id="site-content" role="main" class="main-content">
	<section class="section has-gray-background">
		<div class="container<?php
			if($searchOption=="wordpress"){
				echo ' narrow-page-content';
			}
		?>">
			<h1 class="screen-reader-text">What are you looking for?</h1>
			<div class="form-group search-box search-box-wide">
				<?php get_search_form();?>
			</div>
			<?php
				    if($searchOption=="wordpress"){
						echo purdue_search_popular_wordpress();
					}else{
						echo purdue_search_popular_google();
					}
				?>
		</div>
	</section>
	<section class="section">
		<div class="container<?php
			if($searchOption=="wordpress"){
				echo ' narrow-page-content';
			}
		?>">
		<?php
			if($searchOption=="google"){
		?>
			<div class="columns has-sidebar">
				<div class="column is-two-thirds">
					<div class="content">
						<h2>Results for:
						<?php 
						if (isset($_GET['q'])){
								echo wp_filter_nohtml_kses(sanitize_text_field($_GET['q']));
						}
						?>
						</h2>
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
				<div class="column is-one-quarter">
					<div class="trending-search box has-gray-background">
						<h2 class="purdue-home-intro-text__header header-font-united">Trending Searches</h2>
							<?php echo purdue_search_trending();?>
					</div>
				</div>
			</div>

		<?php }else{?>
			<div class="search-results-header">
				<h2>Results for:
				<?php 
					if (isset($_GET['s'])){
						echo wp_filter_nohtml_kses(sanitize_text_field($_GET['s']));
					}
				?>
				</h2>
				<div>Sort by:
					<select class="search-results-sort">
						<option selected="" value="relevance">Relevance</option>
						<option value="date">Date</option>
					</select>
				</div>
			</div>
			<?php
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			global $wp_query;
			$not_singular = $wp_query->found_posts > 1 ? 'results' : 'result';
			?>
			<div class="search-results-count">
			<?php
			echo $wp_query->found_posts . " $not_singular";?>
			</div>
			<div class="search-results-container">
			<?php
				if ( have_posts() ){ 
					while ( have_posts() ) : the_post(); ?> 
					<a class="search-post" href="<?php the_permalink() ?>">
						<h3 class="search-post-title"><?php the_title() ?></h3>
						<p class="search-post-link"><?php the_permalink() ?></p>
						<p  class="search-post-content">
						<?php purdue_get_excerpt(); ?>
						</p>
					</a>	
				<?php 
				endwhile;
				the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __( 'Prev', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				));
				}else {
					echo '<p class="search-post-noresult">No search results found!</p>';
				
				}
			}?>
		</div>
		
		</div>
	</section>
	<button id="to-top" class="to-top-hidden" aria-label="Back to Top Button">
		<span class="icon"><i class="fa-solid fa-arrow-up" aria-hidden="true"></i></span>
	</button>
</main><!-- #site-content -->

<?php get_footer(); ?>
