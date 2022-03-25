<div class="box tip-main" >
    <div class="tip-header">
        <p class="title">
            <?php the_title(); ?>
        </p>
        <p class="date">
            (<?php the_time('F j, Y'); ?>)
        </p>
    </div>
    <div class="tip-content">
        <div class="content">
            <?php
                echo get_the_content( $post->ID );
            ?>
        </div>
    </div>
</div>