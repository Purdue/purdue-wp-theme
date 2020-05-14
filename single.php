<?php

/**
 * Template Name: Single Post
 *
 * @package Purdue-brand
 */
?>
<?php get_header(); ?>
<?php
$taxonomy = "pub_tax";
$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
echo '<section class="breadcrumbs">
<ul>';
echo '<li><a href="' . home_url() . '">Home</a></li>';
$out = '';

foreach ($terms as $term){
	wp_reset_query();
	$args = array('post_type' => 'pub_post',
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $term->slug,
			),
		),
	);	
	$loop = new WP_Query($args);		
	if($loop->have_posts()) {
		while($loop->have_posts()) : $loop->the_post();
		$out.='<li><a href="'.get_permalink().'">'.$term->name.'</a></li>';
		endwhile;
	}
}
$out.='<li>Current Article</li>';

echo $out;
echo '</ul>
</section>';
wp_reset_query();
$subheading = "";
$includeDate = "";
$includeSocialTop = "";
$includeSocialbottom = "";

if (function_exists('get_field')) {	
	$subheading = get_field('post-subheading');
	if(is_array(get_field('date'))){
		if(sizeof(get_field('date'))>0){
			$includeDate = get_field('date')[0];
		}
	}
	else{
		$includeDate = "";
	}
	if(is_array(get_field('social_header'))){
		if(sizeof(get_field('social_header'))>0){
			$includeSocialTop = get_field('social_header')[0];
		}
	}else{
		$includeSocialTop = "";
	}
	if(is_array(get_field('social_bottom'))){
		if(sizeof(get_field('social_bottom'))>0){
			$includeSocialbottom = get_field('social_bottom')[0];
		}
	}else{
		$includeSocialbottom = "";
	}
	
} else {	
	$subheading = "";
	$includeDate = "Yes";
	$includeSocialTop = "Yes";
	$includeSocialbottom = "";
}

?>

<main id="site-content" role="main">
	<section class="container section-container">
		<?php if (is_active_sidebar('post-related-content')) : ?>
			<div class="columns is-multiline with-sideContent">
				<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
					<?php purdueBrand_the_title('is-1', False); ?>
					<p class="post__subheading">
						<?php echo ($subheading); ?>
					</p>

					<?php while (have_posts()) : the_post(); ?>
						<?php if($includeDate=="Yes" || $includeSocialTop=="Yes"){ ?>
							<div class="post__date-line">
								<?php if($includeDate=="Yes"){ ?>
									<div class="post__date-line--date">
										<?php echo get_the_date("F j, Y"); ?>
									</div>
								<?php } ?>
								<?php if($includeSocialTop=="Yes"){ ?>
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
						<?php if($includeSocialbottom=="Yes"){ ?>
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
						<?php dynamic_sidebar('post-related-content'); ?>
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
						<?php if($includeDate=="Yes" || $includeSocialTop=="Yes"){ ?>
							<div class="post__date-line">
							<?php if($includeDate=="Yes"){ ?>
								<div class="post__date-line--date">
									<?php echo get_the_date("F j, Y"); ?>
								</div>
							<?php } ?>
							<?php if($includeSocialTop=="Yes"){ ?>
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
							<?php if($includeSocialbottom=="Yes"){ ?>
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
	</section>

</main><!-- #site-content -->

<?php get_footer(); ?>