<div class="column is-full">
    <div class="card listed-faculty">
        <div class="media">
            <?php if (has_post_thumbnail()) { ?>
                <div class="media-left">
                    <figure class="image">
                        <?php the_post_thumbnail();?>
                    </figure>
                </div>
            <?php } ?>
            <div class="media-content">
                <div class="top">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo(get_field('title')); ?></p> 
                </div>
                <div class="middle">
                    <p>					
                    <?php 
                    $bio = (get_field('short_bio'));
                    if ($bio) {
                        echo $bio;
                    } elseif(!empty(the_excerpt()) && sizeof(the_excerpt())!==0) {
						the_excerpt();
					} else {
						echo purdue_get_excerpt(get_the_content()); 
					}
                    ?>
                    </p>
                </div>
                <div class="bottom">
                    <p class="phone"><?php echo(get_field('phone_number')); ?></p>
                    <p class="email"><?php echo(get_field('email')); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>