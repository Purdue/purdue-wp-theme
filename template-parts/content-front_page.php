<?php

/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php if (!has_block('purdue-blocks/video-hero')&&!has_block('purdue-blocks/cta-hero') && !has_block('purdue-blocks/site-hero') && !has_block('purdue-blocks/title-hero') && !has_block('purdue-blocks/info-box-hero')) { ?>

<section class="section">
    <div class="container">
        <div class="content">
            <h1 id="main-heading"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<?php } ?>

<?php
the_content();
?>
