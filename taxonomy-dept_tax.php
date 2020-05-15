<?php

/**
 *
 * The template for displaying department archive pages.
 * 
 * @package purdue-wp-theme
 */
?>
<?php get_header(); ?>

<?php
// get the title and description from the taxonomy term settings for current post
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$title = $term->name;
$description = $term->description;

// get the image from the taxonomy term settings for current post.
$tax = $term->taxonomy;
$id = $tax . '_' . $term->term_id;
$imageUrl = '';
if (function_exists('get_field')) {
	$imageUrl = get_field('upload_hero_image', $id);
} 
?>

<main id="site-content" role="main">
	<div class="bulma-blocks-50-50-hero">
		<div class="columns is-mobile is-gapless">
			<div class="column is-half-desktop is-half-widescreen is-half-fullhd">
				<div class="section content">
					<h1><?php echo ($title); ?></h1>
					<p><?php echo ($description); ?></p>
				</div>
			</div>
			<div class="column is-half-desktop is-half-widescreen is-half-fullhd">
				<span class="background-image" role="img" style="background-image:url(<?php echo ($imageUrl); ?>)" aria-label=""></span>
			</div>
		</div>
	</div>

	<?php
	dynamic_sidebar('pubs-dept-page');
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
