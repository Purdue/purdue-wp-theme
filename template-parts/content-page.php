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


	// get publication taxonomy term for alm shortcode post list
	$terms = get_the_terms($post, 'pub_tax');
	if(is_array($terms)){
		$filter_terms = $terms[0]->slug;
	}
	?>
	<div class="bulma-blocks-40-60-hero">
		<div class="columns is-mobile is-gapless">
			<div class="column is-5-desktop is-5-widescreen is-5-fullhd">
					<div class="content">
					<h1> <?php echo ($title); ?> </h1>
					<p> <?php echo ($subheading); ?> </p>

					<?php
					if ($filter_terms != '') {
						echo ('<a href="#ajax-load-more" class="jump-button">jump to articles <i class="fas fa-arrow-down" aria-hidden="true"></i></a>');
					}
					?>
				</div>
			</div>
			<div class="column is-7-desktop is-7-widescreen is-7-fullhd">
				<span class="background-image" role="img" style="background-image: url(<?php echo ($img); ?>)" aria-label="" />
			</div>
		</div>
	</div>
		<?php the_content(); ?>
<?php } else { ?>
		<?php the_content(); ?>
<?php } ?>
