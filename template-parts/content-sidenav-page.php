<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php if (!is_front_page() && !has_block('purdue-blocks/cta-hero') && !has_block('purdue-blocks/site-hero') && !has_block('purdue-blocks/title-hero')  && !has_block('purdue-blocks/info-box-hero')) { ?>

    <section class="section">
        <div class="container">
            <div class="content">
                <?php purdueBrand_the_title('is-1', false); ?>
            </div>
        </div>
    </section>
    
<?php } ?>

<?php
    the_content();
?>
