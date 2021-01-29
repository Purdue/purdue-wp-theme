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

				<?php
					if (get_theme_mod('footer_layout_settings') == "three" && get_theme_mod('header_layout_settings') !== "global") {
						if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');}
						if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');}
						if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');}
					} else {
						if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');}
						if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');}
						if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');}
						if (is_active_sidebar('footer-column-4')) {dynamic_sidebar('footer-column-4');}
					}
				?>



					<?php
					// ------------- Address ---------------- //
						if (get_theme_mod('address_line_1') !== '' && get_theme_mod('city') !== '' && get_theme_mod('state') !== '' && get_theme_mod('zipcode') !== '') {
					?>

						<div class="resources__column resources__info">
							<div class="resources__address">
								<h2 class="title">Address</h2>
								<p>
									<?php
										echo(get_theme_mod('address_line_1'));
										echo('<br>');
										if (get_theme_mod('address_line_2') !== '') {
											echo(get_theme_mod('address_line_2'));
											echo('<br>');
										}
										$address_last_line = get_theme_mod('city') . ", " . get_theme_mod('state') . " " . get_theme_mod('zipcode');
										echo($address_last_line);
									?>
								</p>  
							</div>

					<?php
						} else {
					?>

						<div class="resources__column resources__info">
							<div class="resources__address">
								<h2 class="title">Address</h2>
								<p>
									Purdue University<br>
									610 Purdue Mall<br>
									West Lafayette, IN 47907
								</p>  
							</div>
					
					<?php
						}

						// ---------  Contact Us -------------//
						if (get_theme_mod('phone_number') !== '') {
					?>

							<div class="resources__contact">
								<h2 class="title">Contact Us</h2>
								<p>
									<?php
										echo(get_theme_mod('phone_number'));
									?>
								</p>
								<p><a href="https://www.purdue.edu/purdue/contact-us/index.php">Email Us</a></p>
							</div>

					<?php
						} else {
					?>

							<div class="resources__contact">
								<h2 class="title">Contact Us</h2>
								<p>
									765-494-4600
								</p>
								<p><a href="https://www.purdue.edu/purdue/contact-us/index.php">Email Us</a></p>
							</div>

					<?php
						}

						// --------------- Social Media Links ------------------- //
					?>

							<div class="resources__social">
								<h2 class="title">Follow Us</h2>
								<ul class="social">
									<li class="navbar-item">
										<a title="Facebook" href="<?php echo(get_theme_mod('facebook') !== '' ? get_theme_mod('facebook') : "https://www.facebook.com/PurdueUniversity/");?>">
											<i class="fab fa-facebook" aria-hidden="true"></i> 
										</a>
									</li>
									
									<li class="navbar-item">
										<a title="Twitter" href="<?php echo(get_theme_mod('twitter') !== '' ? get_theme_mod('twitter') : "https://www.twitter.com/LifeAtPurdue");?>">
											<i class="fab fa-twitter" aria-hidden="true"></i> 
										</a>
									</li>
									
									<li class="navbar-item">
										<a title="Instagram" href="<?php echo(get_theme_mod('instagram') !== '' ? get_theme_mod('instagram') : "https://www.instagram.com/lifeatpurdue/");?>">
											<i class="fab fa-instagram" aria-hidden="true"></i> 
										</a>
									</li>
									
									<li class="navbar-item">
										<a title="Snapchat" href="<?php echo(get_theme_mod('snapchat') !== '' ? get_theme_mod('snapchat') : "https://www.snapchat.com/add/lifeatpurdue");?>">
											<i class="fab fa-snapchat" aria-hidden="true"></i> 
										</a>
									</li>
									
									<li class="navbar-item">
										<a title="LinkedIn" href="<?php echo(get_theme_mod('linkedin') !== '' ? get_theme_mod('linkedin') : "https://www.linkedin.com/edu/purdue-university-18357");?>">
											<i class="fab fa-linkedin" aria-hidden="true"></i> 
										</a>
									</li>
									
								</ul>
							</div>

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
