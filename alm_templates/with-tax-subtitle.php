<div class="column is-one-third-desktop is-half-tablet is-full-mobile">
	<div class="card listed-post listed-template with-tax-subtitle">
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
				<?php 
					$tax="";
					if ( get_post_type( $post->ID ) == 'template' ) {
						$terms = get_the_terms( $post->ID, 'temptype' );
						if ( $terms && ! is_wp_error( $terms ) ) {
							$tax=$terms[0]->name;
						}	
					}
					if ( get_post_type( $post->ID ) == 'socialasset' ) {
						$terms = get_the_terms( $post->ID, 'assettype' );
						if ( $terms && ! is_wp_error( $terms ) ) {
							$tax=$terms[0]->name;
						}
					}
					if($tax!=""){
				?>
					<p class="sub-title"><?php echo $tax; ?></p>
				<?php } ?>
					
				</div>
			</div>
		</div>
		</a>
	</div>
</div>