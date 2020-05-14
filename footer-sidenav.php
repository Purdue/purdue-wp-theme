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
						<?php purdueBrand_footer_logo();?>
					</div>
					<?php if (is_active_sidebar('footer-address')) {dynamic_sidebar('footer-address');} ?>
				</div>
					<?php if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');} ?>

					<?php if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');} ?>

					<?php if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');} ?>

				<div class="column is-2 footer__social">	
					<?php purdueBrand_footerSocial(); ?>
				</div>
			</div> 
		</div><!-- .container -->
	</div>
	<div class="footer footer__signature">
		<div class="container is-fullhd">
		©<?php echo date('Y'); ?> Purdue University <?php if (is_active_sidebar('footer-signature')) {dynamic_sidebar('footer-signature');} ?> 
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
