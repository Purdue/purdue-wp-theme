<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-home-theme
 */
?>

<section class="section has-padding-exlarge has-gray-background">
	<div class="container">
	<h1 class="page404-header second-level-page-heading"><?php _e( '404 ERROR', 'purdue-home-theme' ); ?></h1>
	<p class="page404-desc"><?php _e( 'We’re sorry you were not able to find the page you were looking for.', 'purdue-home-theme' ); ?></p>

	<div class="form-group search-box search-box-fullwidth search-box-wide">
		<?php get_search_form();?>
	</div>
	<?php
		$searchOption = get_theme_mod( 'search_option_settings' )?get_theme_mod( 'search_option_settings' ):"wordpress";
		if($searchOption=="wordpress"){
			echo purdue_search_popular_wordpress();
		}else{
			echo purdue_search_popular_google();
		}
	?>
	<div class="page404-quick-links">
	<?php
		echo purdue_404_trending();
	?>
	</div>
	</div>

</section>


