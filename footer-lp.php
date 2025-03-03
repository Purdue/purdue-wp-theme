<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package purdue-wp-theme
 */
?>

</div><!-- #content -->
<footer id="colophon" role="contentinfo" class="footer">
    <div class="footer footer__global__logo">
        <div class="container is-fullhd">
            <?php 
                echo '<a href="' . esc_url(home_url('/')) . '" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>';
            ?>
        </div>
    </div>
	<div class="footer footer__signature">
            <?php
				echo '<p><em>Last modified:</em> ' . get_the_modified_time('F j, Y') . '</p>';
			?>
		<div class="container is-fullhd">
		&copy 2020 - <?php echo date('Y'); ?> Purdue University <?php purdueBrand_signatureLinks(); ?> 
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
