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

<?php
	$header_option = get_theme_mod('header_layout_settings', 'global');
	$footer_option = get_theme_mod('footer_layout_settings', 'four');
	var_dump($header_option);
?>
<footer id="colophon" role="contentinfo" class="footer">
	<div class="footer footer__global__logo">
		<div class="container is-fullhd">
			<?php 
				$ftr_link = "https://www.purdue.edu/";
				echo '<a href="' . $ftr_link . '" rel="home"><img src="https://www.purdue.edu/purdue/images/PU-H.svg" alt="Purdue Logo"></a>';
			?>
		</div>
	</div>
	<div class="footer footer__global__resources">
		<div class="container is-fullhd">
			<div class="columns is-desktop">
				<div class="column is-four-fifths-desktop columns is-desktop">
					<div class="column<?php echo(($header_option == "simple"||$header_option == "global2")&&$footer_option == "three" ? ' is-half-desktop' :'') ?>">
						<?php 
							if($header_option == "global"){
								purdueBrand_footer_links("global-footer-1.json");
							}elseif(is_active_sidebar('footer-column-1')){
								dynamic_sidebar('footer-column-1');
							}
						?>
					</div>
					<div class="column<?php echo(($header_option == "simple"||$header_option == "global2")&&$footer_option == "three" ? ' is-one-quarter-desktop' :'') ?>">
						<?php 
							if($header_option == "global"){
								purdueBrand_footer_links("global-footer-2.json");
							}elseif(is_active_sidebar('footer-column-2')){
								dynamic_sidebar('footer-column-2');
							}
						?>
					</div>
					<div class="column<?php echo(($header_option == "simple"||$header_option == "global2")&&$footer_option == "three" ? ' is-one-quarter-desktop' :'') ?>">
						<?php if (is_active_sidebar('footer-column-3')) {dynamic_sidebar('footer-column-3');} ?>
					</div>

					<?php
						if (($footer_option !== "three" && ($header_option == "simple"||$header_option == "global2")) || $header_option == "global") {
							echo('<div class="column">');
							if (is_active_sidebar('footer-column-4')) {dynamic_sidebar('footer-column-4');}
							echo('</div>');
						}						
					$ftr_add1 = get_theme_mod('address_line_1', 'Purdue University');
					$ftr_add2 = get_theme_mod('address_line_2', '610 Purdue Mall');
					$ftr_add3 = get_theme_mod('address_line_3', '');
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
								echo('<a href="https://www.google.com/maps/search/?api=1&query=610+Purdue+Mall%2CWest+Lafayette%2CIN%2C47907" target="_blank">');
								echo ('Purdue University<br/>');
								echo ('610 Purdue Mall<br/>');
								echo ('West Lafayette, IN 47906');
								echo('</a>');
							} else {
								if($ftr_add1 != ''){
									$add1=str_replace(" ", "+", $ftr_add1);
									if(strpos($add1, ',')!== false){
										$add1=str_replace(",", "%2C", $add1);
									}
									$add1=$add1."%2C";
								}else{
									$add1="";
								}
								if($ftr_add2 != ''){
									$add2=str_replace(" ", "+", $ftr_add2);
									if(strpos($add2, ',')!== false){
										$add2=str_replace(",", "%2C", $add2);
									}
									$add2=$add2."%2C";
								}else{
									$add2="";
								}
								if($ftr_add3 != ''){
									$add3=str_replace(" ", "+", $ftr_add3);
									if(strpos($add3, ',')!== false){
										$add3=str_replace(",", "%2C", $add3);
									}
									$add3=$add3."%2C";
								}else{
									$add3="";
								}

								$city=str_replace(" ", "+", $ftr_city)."%2C";
								$query=$add1.$add2.$add3.$city.$ftr_state;
								echo('<a href="https://www.google.com/maps/search/?api=1&query='.$query.'" target="_blank">');
								echo (($ftr_add1 == '') ? '' : $ftr_add1 . '<br/>');
								echo (($ftr_add2 == '') ? '' : $ftr_add2 . '<br/>');
								echo (($ftr_add3 == '') ? '' : $ftr_add3 . '<br/>');
								echo (($ftr_city == '') ? '' : $ftr_city . ', ' . $ftr_state . ' ' . $ftr_zip);
								echo('</a>');
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
								if(strpos($ftr_phone, '-')!== false){
									$phone=str_replace("-", "", $ftr_phone);
								}else{
									$phone=$ftr_phone;
								}
								echo (($ftr_phone == '') ? '' : '<p><a href="tel://' . $phone . '">' . $ftr_phone . '</a></p>');
								if(filter_var($ftr_email, FILTER_VALIDATE_EMAIL)){
									$ftr_email="mailto:".$ftr_email;
								}
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
										    <span class="screen-reader-text">Facebook</span>
											<i class="fab fa-facebook" aria-hidden="true"></i> 
										</a>
									</li>
								<?php
								}

								if ($ftr_twitter != '') {
									?>
									<li class="navbar-item">
										<a title="Twitter" href="<?php echo $ftr_twitter; ?>">
										<span class="screen-reader-text">Twitter</span>
											<i class="fab fa-twitter" aria-hidden="true"></i> 
										</a>
									</li>
								<?php
								}

								if ($ftr_linkedin != '') {
									?>
									<li class="navbar-item">
										<a title="LinkedIN" href="<?php echo $ftr_linkedin; ?>">
											<span class="screen-reader-text">LinkedIn</span>
											<i class="fab fa-linkedin" aria-hidden="true"></i> 
										</a>
									</li>
								<?php
								}

								if ($ftr_instagram != '') {
									?>
									<li class="navbar-item">
										<a title="Instagram" href="<?php echo $ftr_instagram; ?>">
										  <span class="screen-reader-text">Instagram</span>
											<i class="fab fa-instagram" aria-hidden="true"></i> 
										</a>
									</li>
								<?php
								}

								if ($ftr_youtube != '') {
									?>
									<li class="navbar-item">
										<a title="YouTube" href="<?php echo $ftr_youtube; ?>">
											<span class="screen-reader-text">Youtube</span>
											<i class="fab fa-youtube-square" aria-hidden="true"></i> 
										</a>
									</li>
								<?php
								}

								if ($ftr_snapchat != '') {
									?>
									<li class="navbar-item">
										<a title="SnapChat" href="<?php echo $ftr_snapchat; ?>">
											<span class="screen-reader-text">snapchat</span>
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
	<div class="footer footer__signature">
		<div class="container is-fullhd">
		<a href="https://www.purdue.edu/securepurdue/security-programs/copyright-policies/reporting-alleged-copyright-infringement.php" target="_blank">Copyright</a>
		 &copy; <?php echo date('Y'); ?> Purdue University. All Rights Reserved.<br /> 
		 <a href="https://www.purdue.edu/accessibilityresources/" target="_blank">Accessibility</a> | <a href="https://www.purdue.edu/purdue/ea_eou_statement.php" target="_blank">EA/EO University</a> | <a href="https://www.purdue.edu/purdue/about/integrity_statement.php" target="_blank">Integrity Statement</a> | <a href="https://www.purdue.edu/purdue/about/privacy-notice.php" target="_blank">Privacy Policy</a>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
