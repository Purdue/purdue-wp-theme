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
<form action="<?php echo esc_url( home_url( '/' ) );?>" name="searchform" method="get">
	<span class="sr-only">Search for:</span>
	<input type="search" title="search" class="search-field" placeholder="Search This Site" name="s" value='<?php echo isset($_GET['s']) ? wp_filter_nohtml_kses(sanitize_text_field($_GET['s'])) : ""; ?>'>	
	<button type="submit" class="search-button"><span class="sr-only">Submit</span>
		<i class="fas fa-search search-icon"></i>
	</button>
</form>
<?php }else{ ?>
	<form action="<?php echo esc_url( home_url( '/' ) );?>/search" name="searchform" method="get">
	<span class="sr-only">Search for:</span>
	<input type="search" title="search" class="search-field" placeholder="Search All Purdue" name="q" value='<?php echo isset($_GET['q']) ? wp_filter_nohtml_kses(sanitize_text_field($_GET['q'])) : ""; ?>'>
	<button type="submit" class="search-button"><span class="sr-only">Submit</span>
		<i class="fas fa-search search-icon"></i>
	</button>
</form>
<?php }?>
					