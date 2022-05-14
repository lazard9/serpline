<?php
/**
 * Contact page templete
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section class="contact-wrap"><!-- Contact page content -->
            	<h1 class="glad-to-hear-form-you">Glad to hear form you!</h1>
            	<p class="interested-in-learning">I’m always interested in learning about new projects. Send me a message or finde me on <a target="_blank" href="https://twitter.com/serpline_" title="Twitter" rel="noopener">Twitter</a>.</p>
            	<div class="contact-form">
			        <?php echo do_shortcode( '[ninja_form id=1]' ) ?>
			    </div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();