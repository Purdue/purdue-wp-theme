<div class="column is-one-third-desktop is-half-tablet is-full-mobile">
	<div class="card listed-post listed-template">
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
					<p class="title is-4">
						<?php the_title(); ?>
					</p>
				</div>
			</div>
		</div>
		</a>
	</div>
</div>