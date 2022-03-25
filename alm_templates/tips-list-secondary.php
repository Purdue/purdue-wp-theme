<button data-open="<?php $post->ID ?>" class="tip-item box" onclick="openModal(this)">
    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-4">
                    <?php the_title(); ?>
                </p>
                <p class="date">
                    (<?php the_time('F j, Y'); ?>)
                </p>
                <p class="read-more">
                    Read this week's Tip of the Week >
                </p>
            </div>
        </div>
    </div>
</button>
<div data-open="<?php $post->ID ?>" class="tip-modal" >
    <div class="container">
        <div class="box">
            <button class="modal-close-button" onclick="closeModal(this)"><i class="fas fa-times"></i></button>
            <p class="title">
                <?php the_title(); ?>
            </p>
            <p class="date">
                (<?php the_time('F j, Y'); ?>)
            </p>
            <?php
                echo get_the_content( $post->ID );
            ?>
        </div>
    </div>
</div>