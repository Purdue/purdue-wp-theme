<div class="column is-one-third-desktop is-half-tablet is-full-mobile">
	<a class="card listed-year" href="<?php the_permalink(); ?>">
		<?php if (has_post_thumbnail()) { ?>
			<div class="card-image image is-4by3" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">

			</div>
		<?php } ?>
		<div class="card-content">
			<div class="content">
				<?php the_title(); ?>
			</div>
		</div>
	</a>
</div>