<?php

/**
 * Default archive page
 *
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<main id="site-content" role="main" class="main-content">
	<section class="section container">
		<div class="content">
			<h1><?php echo get_bloginfo( 'name' ); ?></h1>
			<?php if(get_bloginfo( 'description' )){
						echo '<p>'.get_bloginfo( 'description' ).'</p>'; 
					} 
			?>
		</div>
	</section>
	<div class="section post-container">
		<div class="container">
			<div class="columns is-multiline post-list">
				<?php 
				/* $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'post',  'paged' => $paged);
				$wp_query = new WP_Query($args);
				*/
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
									if(sizeof(the_excerpt())!==0){
										the_excerpt();
									}else{
										echo wp_trim_words(get_the_content(), 40, '...'); 
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
				<?php endwhile; ?>
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
	
	<button id="to-top" class="to-top-hidden">
		<i class="fas fa-chevron-up" aria-hidden="true"></i>
	</button>
</main><!-- #site-content -->

<?php get_footer(); ?>