<?php
/**
 *
 * @package Purdue-brand
 */
?>
<?php get_header(); ?>

<?php if(function_exists('bcn_display')) : ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">   
    <?php bcn_display();	?>
</div>
<?php endif; 
if (function_exists('get_field')) {	
	$subheading = get_field('post-subheading');
	
} else {	
	$subheading = "";
}
$incDate = get_theme_mod('date_setting',false);
$incShare = get_theme_mod('social_setting',false);
?>

<main id="site-content" role="main">
	<section class="section">
		<div class="container">
		<?php if (is_active_sidebar('right-sidebar')) : ?>
			<div class="columns is-multiline with-sideContent">
				<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
					<?php purdueBrand_the_title('is-1', False); ?>
					<p class="post__subheading">
						<?php echo ($subheading); ?>
					</p>

					<?php 
					while (have_posts()) : the_post(); 
						if($incDate || $incShare){ ?>
							<div class="post__date-line">
								<?php if($incDate){ ?>
									<div class="post__date-line--date">
										<?php echo get_the_date("F j, Y"); ?>
									</div>
								<?php } ?>
								<?php if($incShare){ ?>
									<div class="post__date-line--share">
										<p>Share: </p>
										<div class="level is-mobile">
											<div class="level-left">
												<div class="level-item">
													<a class="icon is-medium" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-lg fa-facebook-f"></i></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-twitter"></i></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-linkedin-in"></i></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="mailto:placeholder@placeholder.com?body=<?php the_permalink(); ?>"><i class="fas fa-lg fa-envelope"></i></a>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
							<?php the_content(); ?>
						<?php if($incShare){ ?>
						<div class="post__date-line share-button-bottom">	
							<div class="post__date-line--share">
								<p>Share: </p>
								<div class="level is-mobile">
									<div class="level-left">
										<div class="level-item">
											<a class="icon is-medium" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-lg fa-facebook-f"></i></a>
										</div>
										<div class="level-item">
											<a class="icon is-medium" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-twitter"></i></a>
										</div>
										<div class="level-item">
											<a class="icon is-medium" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-linkedin-in"></i></a>
										</div>
										<div class="level-item">
											<a class="icon is-medium" href="mailto:placeholder@placeholder.com?body=<?php the_permalink(); ?>"><i class="fas fa-lg fa-envelope"></i></a>
										</div>
									</div>
								</div>
							</div>							
						</div>
						<?php } ?>
					<?php endwhile; // end of the loop. 
					?>
				</div>
				<aside class="column is-one-quarter-desktop is-full-tablet is-full-mobile">
					<div class="side-content">
						<?php dynamic_sidebar('right-sidebar'); ?>
					</div>
				</aside>
			<?php else : ?>
				<div class="columns is-centered">
					<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
						<?php purdueBrand_the_title('is-1', False); ?>

						<p class="post__subheading">
							<?php echo ($subheading); ?>
						</p>

						<?php while (have_posts()) : the_post(); ?>
						<?php if($incDate || $incShare){ ?>
							<div class="post__date-line">
							<?php if($incDate){ ?>
								<div class="post__date-line--date">
									<?php echo get_the_date("F j, Y"); ?>
								</div>
							<?php } ?>
							<?php if($incShare){ ?>
								<div class="post__date-line--share">
									<p>Share: </p>
									<div class="level is-mobile">
										<div class="level-left">
											<div class="level-item">
												<a class="icon is-medium" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-lg fa-facebook-f"></i></a>
											</div>
											<div class="level-item">
												<a class="icon is-medium" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-twitter"></i></a>
											</div>
											<div class="level-item">
												<a class="icon is-medium" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-linkedin-in"></i></a>
											</div>
											<div class="level-item">
												<a class="icon is-medium" href="mailto:placeholder@placeholder.com?body=<?php the_permalink(); ?>"><i class="fas fa-lg fa-envelope"></i></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
							<?php } ?>
								<?php the_content(); ?>
							<?php if($incShare){ ?>
								<div class="post__date-line share-button-bottom">	
									<div class="post__date-line--share">
										<p>Share: </p>
										<div class="level is-mobile">
											<div class="level-left">
												<div class="level-item">
													<a class="icon is-medium" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-lg fa-facebook-f"></i></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-twitter"></i></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-lg fa-linkedin-in"></i></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="mailto:placeholder@placeholder.com?body=<?php the_permalink(); ?>"><i class="fas fa-lg fa-envelope"></i></a>
												</div>
											</div>
										</div>
									</div>							
								</div>
								<?php } ?>
						<?php endwhile; // end of the loop. 
						?>
					</div>
					
				<?php endif; ?>
			</div>
		</div>
	</section>

	<button id="to-top" class="to-top-hidden">
		<i class="fas fa-chevron-up" aria-hidden="true"></i>
	</button>
</main><!-- #site-content -->

<?php get_footer(); ?>