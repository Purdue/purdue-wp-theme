<?php

/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<?php if (!is_front_page() && !has_block('purdue-blocks/cta-hero') && !has_block('purdue-blocks/site-hero') && !has_block('purdue-blocks/title-hero')) { ?>

    <section class="section">
        <div class="container">
            <div class="content">
                <?php
                if (has_block('purdue-blocks/title-nav')) {
                    $blocks = parse_blocks(get_the_content());
                    foreach ($blocks as $block) {
                        if ('purdue-blocks/title-nav' === $block['blockName']) {
                            echo render_block($block);
                            break;
                        }
                    }
                }

                purdueBrand_the_title('is-1', false);

                ?>
            </div>
        </div>
    </section>

<?php } ?>

<?php
// the_content();
$blocks = parse_blocks(get_the_content());
$content_markup = '';
foreach ($blocks as $block) {
    if ('purdue-blocks/title-nav' === $block['blockName']) {
        continue;
    } else {
        $content_markup .= render_block($block);
    }
}

// Remove wpautop filter so we do not get paragraphs for two line breaks in the content.
$priority = has_filter('the_content', 'wpautop');
if (false !== $priority) {
    remove_filter('the_content', 'wpautop', $priority);
}

echo apply_filters('the_content', $content_markup);

if (false !== $priority) {
    add_filter('the_content', 'wpautop', $priority);
}
?>