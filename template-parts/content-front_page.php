<?php

/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php if (!has_block('purdue-blocks/site-hero')) { ?>
	<?php
	$title = get_the_title();
	if (function_exists('get_field')) {
		$subheading = get_field('post-subheading');
	} else {
		$subheading = '';
	}
	$img = get_the_post_thumbnail_url();

	$currUrl = get_permalink();
	?>
	<div class="bulma-blocks-50-50-hero">
		<div class="columns is-mobile is-gapless">
			<div class="column is-half-desktop is-half-widescreen is-half-fullhd">
				<div class="section content">
					<h1> <?php echo ($title); ?> </h1>
					<p> <?php echo ($subheading); ?> </p>
					<div class="level is-mobile">
						<div class="level-left">

							<div class="level-item">
								<a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo ($currUrl); ?>" class="icon">
									<i class="fab fa-lg fa-facebook-f" aria-hidden="true"></i>
								</a>
							</div>
							<div class="level-item">
								<a target="_blank" rel="noopener noreferrer" href="https://twitter.com/intent/tweet?url=<?php echo ($currUrl); ?>" class="icon">
									<i class="fab fa-lg fa-twitter" aria-hidden="true"></i>
								</a>
							</div>
							<div class="level-item">
								<a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo ($currUrl); ?>" class="icon">
									<i class="fab fa-lg fa-linkedin-in" ß aria-hidden="true"></i>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="column is-half-desktop is-half-widescreen is-half-fullhd">
				<span class="background-image" role="img" style="background-image: url(<?php echo ($img); ?>)" aria-label="" />
			</div>
		</div>
	</div>
	<?php if ('' !== get_post()->post_content) { ?>

			<?php the_content(); ?>

	<?php } ?>
<?php } else { ?>

		<?php the_content(); ?>

<?php } ?>
