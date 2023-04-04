<li class="grid-item">
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
					if(!empty(the_excerpt()) && sizeof(the_excerpt())!==0){
						the_excerpt();
					}else{
						echo purdue_get_excerpt(get_the_content()); 
					}
					?>
				</div>
				<div class="read-more-button">
					<span>Read More</span>
				</div>
			</div>
		</a>
	</div>
</li>