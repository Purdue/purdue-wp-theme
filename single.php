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
					<h1 id="main-heading"><?php the_title(); ?></h1>
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
													<a class="icon is-medium" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a>
												</div>
												<div class="level-item">
													<a class="icon is-medium" href="mailto:placeholder@placeholder.com?body=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM218 271.7L64.2 172.4C66 156.4 79.5 144 96 144H352c16.5 0 30 12.4 31.8 28.4L230 271.7c-1.8 1.2-3.9 1.8-6 1.8s-4.2-.6-6-1.8zm29.4 26.9L384 210.4V336c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V210.4l136.6 88.2c7 4.5 15.1 6.9 23.4 6.9s16.4-2.4 23.4-6.9z"/></svg></a>
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
											<a class="icon is-medium" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg></a>
										</div>
										<div class="level-item">
											<a class="icon is-medium" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg></a>
										</div>
										<div class="level-item">
											<a class="icon is-medium" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a>
										</div>
										<div class="level-item">
											<a class="icon is-medium" href="mailto:placeholder@placeholder.com?body=<?php the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM218 271.7L64.2 172.4C66 156.4 79.5 144 96 144H352c16.5 0 30 12.4 31.8 28.4L230 271.7c-1.8 1.2-3.9 1.8-6 1.8s-4.2-.6-6-1.8zm29.4 26.9L384 210.4V336c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V210.4l136.6 88.2c7 4.5 15.1 6.9 23.4 6.9s16.4-2.4 23.4-6.9z"/></svg></a>
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
			</div>
		<?php else : ?>
			<div class="columns is-centered">
				<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
					<h1 id="main-heading"><?php the_title(); ?></h1>

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
			</div>
		<?php endif; ?>
			
		</div>
	</section>

	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden">
			<i class="fas fa-chevron-up" aria-hidden="true"></i>
		</button>
	<?php } ?>
</main><!-- #site-content -->

<?php get_footer(); ?>