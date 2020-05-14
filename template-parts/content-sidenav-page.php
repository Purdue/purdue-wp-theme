<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purdue-wp-theme
 */
?>

<section class="content">
	<!-- <div class="columns is-centered" >
        <div class="content column is-full"> -->
            <?php if (!is_front_page()) { ?>

                <section class="section">
                    <div class="container">
                    
					    <?php purdueBrand_the_title('is-1', False); ?>
                    
                    </div>
                </section>
				
            <?php } ?>

            <?php
                the_content();
            ?>
        <!-- </div>
	</div> -->
</section>
