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
					<?php if(get_theme_mod('header_layout_settings') == 'oldglobalfooter') { 
						purdueBrand_footerLinks_1();  
						purdueBrand_footerLinks_2(); 
						purdueBrand_footerLinks_3(); 
						purdueBrand_footerLinks_4(); }?>
					<?php if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');} ?>
					<?php if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');} ?>
					<?php if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');} ?>
					<?php if (is_active_sidebar('footer-column-4')) {dynamic_sidebar('footer-column-4');} ?>
					<div class="resources__column resources__info">
						<!-- <div class="resources__address">
							<h5 class="title">Address</h5>
							<p>610 Purdue Mall<br>West Lafayette, IN 47906</p>
						</div>
						<div class="resources__contact">
							<h5 class="title">
								Contact Us
							</h5>
							<p>765-494-4600</p>
						</div> -->
						<?php if (is_active_sidebar('footer-address')) { ?>
							<div class="resources__address">
								<h5 class="title">Address</h5>
								<?php dynamic_sidebar('footer-address');?>
							</div>
						<?php } ?>
						<?php if (is_active_sidebar('footer-contact')) {?>
							<div class="resources__contact">
								<h5 class="title">Contact Us</h5>
								<?php dynamic_sidebar('footer-contact'); ?>
							</div>
						<?php } ?>
						<?php if(has_nav_menu( 'footer-social' )){?>
							<div class="resources__social">
								<h5 class="title">Follow Us</h5>
								<ul class="social">
									<?php purdueBrand_footerSocial(); ?>
								</ul>
								<!-- <div class="social">                          
									<a href="https://www.facebook.com/PurdueUniversity/" rel="noopener" target="_blank"><span class="sr-only">Facebook</span><span aria-hidden="true" class="fa fa-facebook"></span></a>                      
									<a href="https://twitter.com/lifeatpurdue" rel="noopener" target="_blank"><span class="sr-only">Twitter</span><span aria-hidden="true" class="fa fa-twitter"></span></a>                             
									<a href="https://www.youtube.com/user/PurdueUniversity" rel="noopener" target="_blank"><span class="sr-only">YouTube</span><span aria-hidden="true" class="fa fa-youtube"></span></a>                             
									<a href="https://www.instagram.com/lifeatpurdue/" rel="noopener" target="_blank"><span class="sr-only">Instagram</span><span aria-hidden="true" class="fa fa-instagram"></span></a>                         
									<a href="https://www.pinterest.com/lifeatpurdue/" rel="noopener" target="_blank"><span class="sr-only">Pinterest</span><span aria-hidden="true" class="fa fa-pinterest"></span></a>                           
									<a href="https://www.snapchat.com/add/lifeatpurdue" rel="noopener" target="_blank"><span class="sr-only">Snapchat</span><span aria-hidden="true" class="fa fa-snapchat-ghost"></span></a>                         
									<a href="https://www.linkedin.com/edu/purdue-university-18357" rel="noopener" target="_blank"><span class="sr-only">LinkedIn</span><span aria-hidden="true" class="fa fa-linkedin"></span></a>
								</div> -->
							</div>
						<?php }?>
					</div>
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
