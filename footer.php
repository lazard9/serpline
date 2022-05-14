<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package serpline
 */

?>

	</div><!-- #content -->

	<div class="newsletter-outher clear">
		<div class="newsletter-inner">
			<h2 class="come-on-in">Want Higher Rankings and More Traffic?</h2>
			<p class="private-email-list">Just enter your email below and get my latest SEO tips straight to your inbox.</p>
	        <div class="newsletter-form clear">

				<!-- /AWeber Web Form Generator 3.0.1 -->
		        <form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl"  >
					<div class="aweber-none">
						<input type="hidden" name="meta_web_form_id" value="490880515" />
						<input type="hidden" name="meta_split_id" value="" />
						<input type="hidden" name="listname" value="awlist4963433" />
						<input type="hidden" name="redirect" value="" id="redirect_601f295854c98028194c8e13f0010a46" />

						<input type="hidden" name="meta_adtracking" value="Serpline_Form" />
						<input type="hidden" name="meta_message" value="1" />
						<input type="hidden" name="meta_required" value="email" />

						<input type="hidden" name="meta_tooltip" value="email||Enter your email" />
					</div>
					<div id="af-form-490880515" class="af-form">
						<div id="af-body-490880515" class="af-body af-standards">
							<div class="af-element">
								<label class="previewLabel" for="awf_field-96302582"></label>
								<div class="af-textWrap"><input class="text" id="awf_field-96302582" type="text" name="email" value="Enter your email" tabindex="500" onfocus=" if (this.value == 'Enter your email') { this.value = ''; }" onblur="if (this.value == '') { this.value='Enter your email';} " />
								</div><div class="af-clear"></div>
								</div>
								<div class="af-element buttonContainer">
								<input name="submit" class="submit" type="submit" value="Sign up" tabindex="501" />
								<div class="af-clear"></div>
							</div>
						</div>
					</div>
				</form>

			</div>
	    </div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-branding-footer">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->
		<div class="footer-social-icons">
			<a target="_blank" href="https://www.facebook.com/marko.serpline/" title="Facebook" rel="noopener"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
			<a target="_blank" href="https://twitter.com/marko_serpline" title="Twitter" rel="noopener"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	    </div>
		<nav class="footer-menu">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
				) );
			?>
        </nav>
		<p class="copyright">Copyright &copy;<?php echo date('Y'); ?> Serpline. Serpline is a Trademark of Serpline LLC | All Rights Reserved.</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>