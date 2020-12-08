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
	<?php if (get_theme_mod('header_layout_settings') == 'oldsimplefooter') { ?>
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
				<?php if(has_nav_menu( 'footer-social' )){?>
					<div class="column is-2 footer__social">	
						<?php purdueBrand_footerSocial(); ?>
					</div>
				<?php }?>
				</div> 
			</div><!-- .container -->
		</div>
	<?php }else{ ?>
		<div class="footer footer__global__logo">
			<div class="container is-fullhd">
				<?php 
					echo '<a href="' . esc_url(home_url('/')) . '" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>';
				?>
			</div>
		</div>
		<div class="footer footer__global__resources">
			<div class="container is-fullhd">
				<div class="resources__columns">
					<?php if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');} ?>
					<?php if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');} ?>
					<?php if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');} ?>
					<?php if (is_active_sidebar('footer-column-4')) {dynamic_sidebar('footer-column-4');} ?>
					<?php if (is_active_sidebar('footer-address')||is_active_sidebar('footer-contact')||has_nav_menu( 'footer-social' )) { ?>
						<div class="resources__column resources__info">
							<?php if (is_active_sidebar('footer-address')) { ?>
								<div class="resources__address">
									<?php dynamic_sidebar('footer-address');?>
								</div>
							<?php } ?>
							<?php if (is_active_sidebar('footer-contact')) {?>
								<div class="resources__contact">
									<?php dynamic_sidebar('footer-contact'); ?>
								</div>
							<?php } ?>
							<?php if(has_nav_menu( 'footer-social' )){?>
								<div class="resources__social">
									<h2 class="title">Follow Us</h2>
									<ul class="social">
										<?php purdueBrand_footerSocial(); ?>
									</ul>
								</div>
							<?php }?>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="footer footer__signature">
		<div class="container is-fullhd">
		©<?php echo date('Y'); ?> Purdue University <?php purdueBrand_signatureLinks(); ?> 
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
