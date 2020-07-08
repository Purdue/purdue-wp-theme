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



<footer id="colophon" role="contentinfo" class="narrow-footer">
	<div class="footer footer__resources">
		<div class="container is-fullhd">
			<div class="columns is-desktop is-multiline">
				<div class="column is-4">	
					<div class="footer__motto">
						<?php 
							echo '<a href="' . esc_url(home_url('/')) . '" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>';

						?>
					</div>
					<?php if (is_active_sidebar('footer-address')) {dynamic_sidebar('footer-address');} ?>
				</div>
					<?php if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');} ?>

					<?php if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');} ?>

					<?php if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');} ?>
				<?php if(purdueBrand_footerSocial()){?>
				<div class="column is-2 footer__social">	
					<?php purdueBrand_footerSocial(); ?>
				</div>
				<?php }?>
			</div> 
		</div><!-- .container -->
	</div>
	<div class="footer footer__signature">
		<div class="container is-fullhd">
			©<?php echo date('Y'); ?> Purdue University <?php purdueBrand_signatureLinks(); ?> 
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
