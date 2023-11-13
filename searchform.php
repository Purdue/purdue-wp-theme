<?php
/**
 * 
 * @package purdue-wp-theme
 */
?>
<?php
	$searchOption = get_theme_mod( 'search_option_settings' )?get_theme_mod( 'search_option_settings' ):"wordpress";
	if($searchOption=="wordpress"){
?>
<form action="<?php echo esc_url( home_url( '/' ) );?>" name="searchform" method="get" class="search-form">
	<i class="fas fa-search search-icon"></i>
	<input type="search" title="search" class="search-field" placeholder="<?php echo purdue_search_placeholder_wordpress(); ?>" name="s" value="<?php echo isset($_GET['s']) ? wp_filter_nohtml_kses(sanitize_text_field($_GET['s'])) : ""; ?>">	
	<button type="submit" class="search-button">Search
	</button>
	<button type="button" class="clear-button">
	<i class="fa-regular fa-circle-xmark" aria-label="Clear"></i>
	</button>
</form>
<?php }else{ ?>
	<form action="<?php echo esc_url( home_url( '/' ) );?>search" name="searchform" method="get" class="search-form">
	<i class="fas fa-search search-icon"></i>
	<input type="search" title="search" class="search-field" placeholder="<?php echo purdue_search_placeholder_google(); ?>" name="q" value="<?php echo isset($_GET['q']) ? wp_filter_nohtml_kses(sanitize_text_field($_GET['q'])) : ""; ?>">
	<button type="submit" class="search-button">Search
	</button>
	<button type="button" class="clear-button">
	<i class="fa-regular fa-circle-xmark" aria-label="Clear"></i>
	</button>
</form>
<?php }?>