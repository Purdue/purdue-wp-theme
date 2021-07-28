<?php
/**
 * Template Name: Sub Nav w/ Sidebar
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>

<?php if(function_exists('bcn_display')) : ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">   
    <?php bcn_display();	?>
</div>
<?php endif; ?>

<div id="content" class="site-content-sidenav">

<aside class="side-nav">
	<div class="aside-wrapper">
		<?php purdueBrand_sideNav();?>	
    </div>
</aside>

<main id="site-content" role="main" class="main-content">
    <div class="section">
        <section class="container">
            <div class="columns is-multiline with-sideContent">
                <div class="column is-two-thirds-desktop is-full-tablet is-full-mobile">
                <?php

                if ( have_posts() ) {

                    while ( have_posts() ) {
                        the_post();

                        get_template_part( 'template-parts/content', get_post_type() );
                    }
                }

                ?>
                </div>
            
                <?php if (is_active_sidebar('page-sidebar')) : ?>
                <aside class="column is-one-quarter-desktop is-full-tablet is-full-mobile">
                    <div class="side-content">
                        <?php dynamic_sidebar('page-sidebar'); ?>
                    </div>
                </aside>
                <?php endif; ?>
            </div>
        </section>
        <?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
            <button id="to-top" class="to-top-hidden">
                <i class="fas fa-chevron-up" aria-hidden="true"></i>
            </button>
        <?php } ?>
    </div>
</main><!-- #site-content -->

</div>

<?php get_footer(); ?>
