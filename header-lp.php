<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package purdue-wp-theme
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight">
<head>
	<title><?php wp_title(''); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (function_exists('gtm4wp_the_gtm_tag')) {
    gtm4wp_the_gtm_tag();
} ?>
	<div id="page" class="site">
		<?php purdueBrand_skip_link_screen_reader_text(); ?>

		<?php
			$postId = get_the_ID();
			if (function_exists('get_field')) {	
				$headerSelect = get_field('select_header_style', $postId);				
			} else {	
				$headerSelect = "";
			}

			echo('<script>');
				$consoleLog = "console.log('post id: ". $postId .", header select value: ". $headerSelect ."')";
				echo $consoleLog;
			echo('</script>');

			if ($headerSelect == 'standard') 
			{
				$classes = "navbar is-black purdue-navbar-black navbar--lp";
				$logo = "https://www.purdue.edu/purdue/images/PU-H.svg";
			} 
			elseif ($headerSelect == "white") 
			{
				$classes = "navbar is-white purdue-navbar-black navbar--lp";
				$logo = "https://www.purdue.edu/purdue/images/PU-H-light.svg";
			} 
			elseif ($headerSelect == "transparent") 
			{
				$classes = "navbar is-transparent purdue-navbar-black navbar--lp";
				$logo = "https://www.purdue.edu/purdue/images/PU-H.svg";
			} 
			else // headerSelect == "reverse
			{
				$classes = "navbar is-transparent purdue-navbar-black navbar--lp";
				$logo = "https://www.purdue.edu/purdue/images/PU-H-light.svg";
			}
		?>
		
		<header id="header" class="header--lp">
			<nav class="<?php echo $classes; ?>" role="navigation">
				<div class="navbar-brand">
					<a href="https://www.purdue.edu" class="navbar-item" rel="home"><img src="<?php echo $logo; ?>" alt="Purdue Logo"></a>
				</div>
			</nav>
		</header>


		<div id="content" class="site-content">
