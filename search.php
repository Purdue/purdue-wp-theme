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
	<section class="section container">
		<div class="columns is-centered">
			<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
				<div class="content">
					<h1>Search <?php if($searchOption=="wordpress"){
										echo get_bloginfo( 'name' );
					 					}else{
										echo "All Purdue";	 
										 } ?></h1>
					<div class="form-group search-box search-box-fullwidth">
						<?php get_search_form();?>
					</div>
					<?php if($searchOption=="wordpress"){
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						if ( have_posts() ){ 
							while ( have_posts() ) : the_post(); ?> 
							<article class="search-post">
								<h2 class="search-post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
								<p class="search-post-link"><?php the_permalink() ?></p>
								<p  class="search-post-content">
									<?php 					
									if(!empty(the_excerpt()) && sizeof(the_excerpt())!==0){
										the_excerpt();
									}else{
										echo purdue_get_excerpt(get_the_content());
									} 
									?>
								</p>
							</article>	
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
					}else{ ?>
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
					<?php }?>
				</div>
			</div>
		</div>
	</section>
	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden">
			<i class="fas fa-chevron-up" aria-hidden="true"></i>
		</button>
	<?php } ?>
</main><!-- #site-content -->

<?php get_footer(); ?>
