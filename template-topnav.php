<?php
/**
 * Template Name: Top second nav
 *
 * @package purdue-wp-theme
 */
?>

<?php get_header(); ?>
<nav id="top-second-nav" class="purdue-navbar-second" role="navigation">					
	<ul class="navbar-items">
		<?php purdueBrand_topSecondMenu(); ?>
	</ul>					
</nav>
<?php
if (function_exists('get_field')) {	
	$breadCrumb = get_field('include_bread_crumb_on_this_page')[0];
	
} else {	
	$breadCrumb = "Yes";
}
if(function_exists('bcn_display')&&!has_block('bcn/breadcrumb-trail')&&$breadCrumb=="Yes") : ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/" role="navigation">   
    <?php bcn_display();	?>
</div>
<?php endif; ?>

<main id="site-content" role="main" class="main-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>
	<?php if (!has_block('purdue-blocks/anchor-link-navigation')&&!has_block('purdue-blocks/custom-side-menu')) { ?>
		<button id="to-top" class="to-top-hidden">
			<i class="fas fa-chevron-up" aria-hidden="true"></i>
		</button>
	<?php } ?>
</main><!-- #site-content -->


<?php get_footer(); ?>
