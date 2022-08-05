<?php

/**
* The template for displaying faculty post (Not Found)
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<main id="site-content" role="main">
<?php
if (function_exists('get_field')) {	
	$facultyTitle = get_field('title');
	$phone = get_field('phone');
	$email = get_field('email');

}else{
	$facultyTitle = "";
	$phone = "";
	$email = "";
}
$img = get_the_post_thumbnail_url();
?>
	<section class="section">
		<div class="container">
	<?php if (is_active_sidebar('post-related-content')) : ?>
		<div class="columns is-multiline with-sideContent">
			<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">

				<h1 id="main-heading"><?php the_title(); ?></h1>

				<p class="post__subheading">
					<?php echo ($facultyTitle); ?>
				</p>
				<p class="post__subheading">
					<?php echo ($phone); ?>
				</p>
				<p class="post__subheading">
					<?php echo ($email); ?>
				</p>

				<?php while (have_posts()) : the_post(); ?>

						<?php the_content(); ?>

				<?php endwhile; // end of the loop. 
				?>
			</div>
			<aside class="column is-one-quarter-desktop is-full-tablet is-full-mobile">
				<div class="side-content">
					<?php dynamic_sidebar('post-related-content'); ?>
				</div>
			</aside>
	</div>
		<?php else : ?>
			<div class="columns is-centered">
				<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
					<h1 id="main-heading"><?php the_title(); ?></h1>

					<p class="post__subheading">
						<?php echo ($facultyTitle); ?>
					</p>
					<p class="post__subheading">
						<?php echo ($phone); ?>
					</p>
					<p class="post__subheading">
						<?php echo ($email); ?>
					</p>

					<?php while (have_posts()) : the_post(); ?>
\
							<?php the_content(); ?>

					<?php endwhile; // end of the loop. 
					?>
				</div>
		</div>
			<?php endif; ?>
	</div>
</section>


</main><!-- #site-content -->

<?php get_footer(); ?>