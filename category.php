<?php

/**
 * Category archive page
 *
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<main id="site-content" role="main" class="main-content">
	<section class="section">
		<div class="container">
			<div class="content">
				<h1><?php single_cat_title('Category: '); ?></h1>
				<?php if(category_description() ){
							echo '<p>'.category_description().'</p>'; 
						} 
				?>
			</div>
		</div>
	</section>
	<div class="section post-container">
		<div class="container">
			<div class="columns is-multiline">
				<?php 
				if ( have_posts() ){
				while ( have_posts() ) : the_post(); ?>
				<div class="column is-one-third-desktop is-half-tablet is-full-mobile">
					<div class="card listed-post">
						<a href="<?php the_permalink(); ?>">
						<?php if (has_post_thumbnail()) { ?>
							<div class="card-image">
								<figure class="card-bg-image image is-2by1" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
								</figure>
							</div>
						<?php } ?>
						<div class="card-content">
							<div class="media">

								<div class="media-content">
									<p class="subtitle">
										<?php the_time('F j, Y'); ?>
									</p>
									<p class="title is-4">
										<?php the_title(); ?>
									</p>
								</div>
							</div>
							<div class="content-text">
								<?php 
									if(!empty(the_excerpt()) && sizeof(the_excerpt())!==0){
										the_excerpt();
									}else{
										echo purdue_get_excerpt(get_the_content());  
									}
									?>
							</div>
							<div class="read-more-button">
								<span>Read More</span>
							</div>
						</div>
						</a>
					</div>
				</div>	
				<?php endwhile; 
				}else{?>
					<p>Sorry, no posts matched your criteria.</p>
				<?php } ?>
				</div>
			<?php 
			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( 'Prev', 'textdomain' ),
				'next_text' => __( 'Next', 'textdomain' ),
				) );
			?>
		</div>
	</div>
	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden" aria-label="Back to Top Button">
			<i class="fas fa-chevron-up" aria-hidden="true"></i>
		</button>
	<?php } ?>
</main><!-- #site-content -->

<?php get_footer(); ?>