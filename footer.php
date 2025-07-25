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
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
										</a>
									</li>
								<?php
								}

								if ($ftr_twitter != '') {
									?>
									<li class="navbar-item">
										<a title="Twitter" href="<?php echo $ftr_twitter; ?>">
										<span class="screen-reader-text">Twitter</span>
										<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg>
									</li>
								<?php
								}

								if ($ftr_linkedin != '') {
									?>
									<li class="navbar-item">
										<a title="LinkedIN" href="<?php echo $ftr_linkedin; ?>">
											<span class="screen-reader-text">LinkedIn</span>
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
										</a>
									</li>
								<?php
								}

								if ($ftr_instagram != '') {
									?>
									<li class="navbar-item">
										<a title="Instagram" href="<?php echo $ftr_instagram; ?>">
										  <span class="screen-reader-text">Instagram</span>
										  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"/></svg>
										</a>
									</li>
								<?php
								}

								if ($ftr_youtube != '') {
									?>
									<li class="navbar-item">
										<a title="YouTube" href="<?php echo $ftr_youtube; ?>">
											<span class="screen-reader-text">Youtube</span>
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M186.8 202.1l95.2 54.1-95.2 54.1V202.1zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-42 176.3s0-59.6-7.6-88.2c-4.2-15.8-16.5-28.2-32.2-32.4C337.9 128 224 128 224 128s-113.9 0-142.2 7.7c-15.7 4.2-28 16.6-32.2 32.4-7.6 28.5-7.6 88.2-7.6 88.2s0 59.6 7.6 88.2c4.2 15.8 16.5 27.7 32.2 31.9C110.1 384 224 384 224 384s113.9 0 142.2-7.7c15.7-4.2 28-16.1 32.2-31.9 7.6-28.5 7.6-88.1 7.6-88.1z"/></svg>
										</a>
									</li>
								<?php
								}

								if ($ftr_snapchat != '') {
									?>
									<li class="navbar-item">
										<a title="SnapChat" href="<?php echo $ftr_snapchat; ?>">
											<span class="screen-reader-text">snapchat</span>
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384,32H64A64,64,0,0,0,0,96V416a64,64,0,0,0,64,64H384a64,64,0,0,0,64-64V96A64,64,0,0,0,384,32Zm-3.907,319.309-.083.1a32.364,32.364,0,0,1-8.717,6.823,90.26,90.26,0,0,1-20.586,8.2,12.694,12.694,0,0,0-3.852,1.76c-2.158,1.909-2.1,4.64-4.4,8.55a23.137,23.137,0,0,1-6.84,7.471c-6.707,4.632-14.244,4.923-22.23,5.23-7.214.274-15.39.581-24.729,3.669-3.761,1.245-7.753,3.694-12.377,6.533-11.265,6.9-26.68,16.353-52.3,16.353s-40.925-9.4-52.106-16.279c-4.657-2.888-8.675-5.362-12.543-6.64-9.339-3.08-17.516-3.4-24.729-3.67-7.986-.307-15.523-.6-22.231-5.229a23.085,23.085,0,0,1-6.01-6.11c-3.2-4.632-2.855-7.8-5.254-9.895a13.428,13.428,0,0,0-4.1-1.834,89.986,89.986,0,0,1-20.313-8.127,32.905,32.905,0,0,1-8.3-6.284c-6.583-6.757-8.276-14.776-5.686-21.824,3.436-9.338,11.571-12.111,19.4-16.262,14.776-8.027,26.348-18.055,34.433-29.884a68.236,68.236,0,0,0,5.985-10.567c.789-2.158.772-3.329.241-4.416a7.386,7.386,0,0,0-2.208-2.217c-2.532-1.676-5.113-3.353-6.882-4.5-3.27-2.141-5.868-3.818-7.529-4.98-6.267-4.383-10.65-9.04-13.4-14.245a28.4,28.4,0,0,1-1.369-23.584c4.134-10.924,14.469-17.706,26.978-17.706a37.141,37.141,0,0,1,7.845.83c.689.15,1.37.307,2.042.482-.108-7.43.058-15.357.722-23.119,2.358-27.261,11.912-41.589,21.874-52.994a86.836,86.836,0,0,1,22.28-17.931C188.254,100.383,205.312,96,224,96s35.828,4.383,50.944,13.016a87.169,87.169,0,0,1,22.239,17.9c9.961,11.406,19.516,25.709,21.874,52.995a231.194,231.194,0,0,1,.713,23.118c.673-.174,1.362-.332,2.051-.481a37.131,37.131,0,0,1,7.844-.83c12.5,0,22.82,6.782,26.971,17.706a28.37,28.37,0,0,1-1.4,23.559c-2.74,5.2-7.123,9.861-13.39,14.244-1.668,1.187-4.258,2.864-7.529,4.981-1.835,1.187-4.541,2.947-7.164,4.682a6.856,6.856,0,0,0-1.951,2.034c-.506,1.046-.539,2.191.166,4.208a69.015,69.015,0,0,0,6.085,10.792c8.268,12.1,20.188,22.313,35.454,30.407,1.486.772,2.98,1.5,4.441,2.258.722.332,1.569.763,2.491,1.3,4.9,2.723,9.2,6.01,11.455,12.153C387.821,336.915,386.269,344.7,380.093,351.309Zm-16.719-18.461c-50.313-24.314-58.332-61.918-58.689-64.749-.431-3.379-.921-6.035,2.806-9.472,3.594-3.328,19.541-13.19,23.965-16.278,7.33-5.114,10.534-10.219,8.16-16.495-1.66-4.316-5.686-5.976-9.961-5.976a18.5,18.5,0,0,0-3.993.448c-8.035,1.743-15.838,5.769-20.354,6.857a7.1,7.1,0,0,1-1.66.224c-2.408,0-3.279-1.071-3.088-3.968.564-8.783,1.759-25.925.373-41.937-1.884-22.032-8.99-32.948-17.432-42.6-4.051-4.624-23.135-24.654-59.536-24.654S168.53,134.359,164.479,139c-8.434,9.654-15.531,20.57-17.432,42.6-1.386,16.013-.141,33.147.373,41.937.166,2.756-.68,3.968-3.088,3.968a7.1,7.1,0,0,1-1.66-.224c-4.507-1.087-12.31-5.113-20.346-6.856a18.494,18.494,0,0,0-3.993-.449c-4.25,0-8.3,1.636-9.961,5.977-2.374,6.276.847,11.381,8.168,16.494,4.425,3.088,20.371,12.958,23.966,16.279,3.719,3.437,3.237,6.093,2.805,9.471-.356,2.79-8.384,40.394-58.689,64.749-2.946,1.428-7.96,4.45.88,9.331,13.88,7.628,23.111,6.807,30.3,11.43,6.093,3.927,2.5,12.394,6.923,15.449,5.454,3.76,21.583-.266,42.335,6.6,17.433,5.744,28.116,22.015,58.963,22.015s41.788-16.3,58.938-21.973c20.795-6.865,36.89-2.839,42.336-6.6,4.433-3.055.822-11.522,6.923-15.448,7.181-4.624,16.411-3.8,30.3-11.472C371.36,337.355,366.346,334.333,363.374,332.848Z"/></svg>
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
			<?php
				echo '<p><em>Last modified:</em> ' . get_the_modified_time('F j, Y') . '</p>';
			?>
		<div class="container is-fullhd">
		<a href="https://www.purdue.edu/securepurdue/security-programs/copyright-policies/reporting-alleged-copyright-infringement.php" target="_blank">Copyright</a>
		 &copy; <?php echo date('Y'); ?> Purdue University. All Rights Reserved. <a href="https://www.purdue.edu/trademarks-licensing/about/policy/trademark-statement.php" target="_blank">Trademark Statement</a>.<br /> 
		 <a href="https://www.purdue.edu/accessibilityresources/" target="_blank">Accessibility</a> | <a href="https://www.purdue.edu/purdue/ea_eou_statement.php" target="_blank">EA/EO University</a> | <a href="https://www.purdue.edu/purdue/about/integrity_statement.php" target="_blank">Integrity Statement</a> | <a href="https://www.purdue.edu/home/free-speech/" target="_blank">Free Expression</a> | <a href="https://collegescorecard.ed.gov/school/fields/?243780-Purdue-University-Main-Campus" target="_blank">DOE Degree Scorecards</a> | <a href="https://www.purdue.edu/purdue/about/privacy-notice.php" target="_blank">Privacy Policy</a>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php
	$customJS ="";
	if (function_exists('get_field')) {	
		$customJS = get_field('custom_scripts');
		if($customJS != ""){
			echo '<script type="text/javascript">' . wp_strip_all_tags(html_entity_decode($customJS)) . '</script>';
		}
	}
	?>
</body>
</html>
