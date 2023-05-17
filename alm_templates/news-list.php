<div class="columns marcom-news-list">
    <div class="column">
		<div class="columns news-list-content">
			<div class="column is-narrow">
				<?php 
				if(get_field('publisher_logo')){?>
					<img src="<?php echo(get_field('publisher_logo')["url"]); ?>" alt="<?php echo(get_field('publisher_logo')["alt"]); ?>" />
				<?php
				}else{?>
				<p class="news-publisher-name"><?php echo get_field('publisher_name');?></p>
				<?php } ?>
			</div>
			<div class="column">
				<a class="news-link" href="<?php echo(get_field('news_link')); ?>" target="_blank"><?php the_title(); ?></a>
				
			</div>
		</div>
    </div>
	<div class="column is-narrow">
		<?php echo(get_field('news_publish_date')); ?>
	</div>
</div>