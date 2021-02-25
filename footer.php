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
					$ftr_link = (get_theme_mod('header_layout_settings') !== "global") ? esc_url(home_url('/')) : "https://www.purdue.edu/";

					echo '<a href="' . $ftr_link . '" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>';
				?>
			</div>
		</div>
		<div class="footer footer__global__resources">
			<div class="container is-fullhd">
				<div class="columns is-desktop">
					<div class="column is-four-fifths-desktop columns is-desktop">
						<div class="column<?php echo(get_theme_mod('footer_layout_settings') == "three" ? ' is-half' :'') ?>">
							<?php if (is_active_sidebar('footer-column-1')) {dynamic_sidebar('footer-column-1');} ?>
						</div>
						<div class="column<?php echo(get_theme_mod('footer_layout_settings') == "three" ? ' is-one-quarter' :'') ?>">
							<?php if (is_active_sidebar('footer-column-2')) {dynamic_sidebar('footer-column-2');} ?>
						</div>
						<div class="column<?php echo(get_theme_mod('footer_layout_settings') == "three" ? ' is-one-quarter' :'') ?>">
							<?php if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');} ?>
						</div>

						<?php
							if (get_theme_mod('footer_layout_settings') !== "three" && get_theme_mod('header_layout_settings') == "simple") {
								echo('<div class="column">');
								if (is_active_sidebar('footer-column-4')) {dynamic_sidebar('footer-column-4');}
								echo('</div>');
							}
							

						$ftr_add1 = get_theme_mod('address_line_1', 'Purdue University');
						$ftr_add2 = get_theme_mod('address_line_2', '610 Purdue Mall');
						$ftr_city = get_theme_mod('city', 'West Lafayette');
						$ftr_state = get_theme_mod('state', 'IN');
						$ftr_zip = get_theme_mod('zipcode', '47906');
						$ftr_phone = get_theme_mod('phone_number', '765-494-4600');
						$ftr_email = get_theme_mod('email_address', 'https://www.purdue.edu/purdue/contact-us/index.php');


						$ftr_facebook = get_theme_mod('facebook', 'https://www.facebook.com/PurdueUniversity/');
						$ftr_twitter = get_theme_mod('twitter', 'https://www.twitter.com/LifeAtPurdue');
						$ftr_linkedin = get_theme_mod('linkedin', 'https://www.linkedin.com/edu/purdue-university-18357');
						$ftr_instagram = get_theme_mod('instagram', 'https://www.instagram.com/lifeatpurdue/');
						$ftr_youtube = get_theme_mod('youtube', 'https://www.youtube.com/purdueuniversity');
						$ftr_snapchat = get_theme_mod('snapchat', 'https://www.snapchat.com/add/lifeatpurdue');

						?>

					</div>
					<div class="column resources__info is-one-fifth-desktop">
						<div class="resources__address">
							<h2 class="title">Address</h2>
							<p>
								<?php
								if (($ftr_add1 == '') || ($ftr_city == '') || ($ftr_state == '') || ($ftr_zip == '')) {
									echo ('Purdue University<br/>');
									echo ('610 Purdue Mall<br/>');
									echo ('West Lafayette, IN 47906');
								} else {
									echo (($ftr_add1 == '') ? '' : $ftr_add1 . '<br/>');
									echo (($ftr_add2 == '') ? '' : $ftr_add2 . '<br/>');
									echo (($ftr_city == '') ? '' : $ftr_city . ', ' . $ftr_state . ' ' . $ftr_zip);
								}

								?>
							</p>  
						</div>
						<?php
							if(!($ftr_phone == '') || !($ftr_email == '')) {
						?>
							<div class="resources__contact">
								<h2 class="title">Contact Us</h2>
								<?php
									echo (($ftr_phone == '') ? '' : '<p>' . $ftr_phone . '</p>');
									echo (($ftr_email == '') ? '' : '<p><a href="' . $ftr_email . '">Email Us</a></p>');
								?>
							</div>

						<?php } ?>

						<?php
							if(!($ftr_facebook == '') || !($ftr_twitter == '') || !($ftr_linkedin == '') || !($ftr_instagram == '') || !($ftr_youtube == '') || !($ftr_snapchat == '')) {
						?>

						<div class="resources__social">
							<h2 class="title">Follow Us</h2>
							<ul class="social">
								<?php
									if ($ftr_facebook != '') {
										?>
										<li class="navbar-item">
											<a title="Facebook" href="<?php echo $ftr_facebook; ?>">
												<i class="fab fa-facebook" aria-hidden="true"></i> 
											</a>
										</li>
									<?php
									}

									if ($ftr_twitter != '') {
										?>
										<li class="navbar-item">
											<a title="Twitter" href="<?php echo $ftr_twitter; ?>">
												<i class="fab fa-twitter" aria-hidden="true"></i> 
											</a>
										</li>
									<?php
									}

									if ($ftr_linkedin != '') {
										?>
										<li class="navbar-item">
											<a title="LinkedIN" href="<?php echo $ftr_linkedin; ?>">
												<i class="fab fa-linkedin" aria-hidden="true"></i> 
											</a>
										</li>
									<?php
									}

									if ($ftr_instagram != '') {
										?>
										<li class="navbar-item">
											<a title="Instagram" href="<?php echo $ftr_instagram; ?>">
												<i class="fab fa-instagram" aria-hidden="true"></i> 
											</a>
										</li>
									<?php
									}

									if ($ftr_youtube != '') {
										?>
										<li class="navbar-item">
											<a title="YouTube" href="<?php echo $ftr_youtube; ?>">
												<i class="fab fa-youtube-square" aria-hidden="true"></i> 
											</a>
										</li>
									<?php
									}

									if ($ftr_snapchat != '') {
										?>
										<li class="navbar-item">
											<a title="SnapChat" href="<?php echo $ftr_snapchat; ?>">
												<i class="fab fa-snapchat" aria-hidden="true"></i> 
											</a>
										</li>
									<?php
									}
								?>
								
							</ul>
						</div>

						<?php } ?>

					</div>


				</div>
			</div>
		</div>
	<?php }?>
	<div class="footer footer__signature">
		<div class="container is-fullhd">
		Copyright &copy; 2020-<?php echo date('Y'); ?> Purdue University. All Rights Reserved.<br /> 
		<?php purdueBrand_signatureLinks(); ?> 
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
