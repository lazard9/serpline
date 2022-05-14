<?php
/**
 * About page templete
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="about-banner-section">
				<div class="form-decor">
					<div class="about-banner">
						<img class="about-author" src="<?php echo esc_url( get_template_directory_uri('template_directory')); ?>/images/Serpline-about-slika.png" alt="Author" height="669" width="699"/>
						<img class="about-arrow" src="<?php echo esc_url( get_template_directory_uri('template_directory')); ?>/images/about-strelica.png" alt="Background" height="581" width="938"/>
					</div>
					<div class="want-to-know">
						<div>
							<h1 class="top-ranking">Looking to Generate Top Google Rankings & Flood Your Site with Free Organic Traffic?</h1>
							<p class="top-ranking">Serpline Is Your Go-to Source for Proven SEO Tips & Expert Insights!</p>
						</div>
					</div>
					<div class="form-decor-d"></div>
				</div>

				<div class="about-optin clear">
					<div class="about-email-address">
						<p class="private-list-a1">Want Proven and Actionable SEO Tips From Me?</p>
						<p class="private-list-a2">Join my private email list and dig in into my best strategies and techniques!</p>
				        
				        <div class="newsletter-form-a clear">
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
							<!-- /AWeber Web Form Generator 3.0.1 -->
				        </div>
					</div>
					<div class="seo-advice">
						<p>Does SEO sound confusing or complicated to you?</p>
						<p>Are you tired of risky, outdated, ineffective and superficial SEO tips?</p>
						<p><span class="ab-bld">You’re not alone!</p>
						<p>You want the <a href="<?php echo esc_url( home_url('/seo-articles/')); ?>">best SEO advice</a>.</p>
						<p>You want to KNOW how to easily rank sites while minimizing risk, time and cost.</p>
						<p>That’s why we reveal only proven traffic-getting, Google ranking methods such as <span class="ab-bld">Power Page writing</span>, <span class="ab-bld">content promotion</span> and link building strategies such as <span class="ab-bld"><b>Guest Post writing</b></span> and other expert insights.</p>
						<p>Trust Serpline, as your go-to SEO advisor for generating stable, free, <a href="<?php echo esc_url( home_url('/organic-search/')); ?>">organic search</a> traffic and you can see your online business grow exponentially, month after month, year after year.</p>
					</div>
				</div>
			</section>

			<?php $logosf_query = new WP_Query( array( 'post_type' => 'logos', 'posts_per_page' => 1, 'post_status' => 'publish', 'order' => 'asc' ) );
			if( $logosf_query->have_posts() ) : while ( $logosf_query->have_posts() ) : $logosf_query->the_post(); ?>

				<div class="logo-section">
					<div class="logo-gallery-wrapper">
						<?php the_content(); ?>
					</div>
				</div>

			<?php endwhile;  wp_reset_postdata(); endif; ?>

			<section class="something-seo-personal">
				<div class="seo-content clear">
					<h2>Something very SEO personal</h2>
					<div class="flt-451">
						<p>Want to know who you’re dealing with?</p>
						<p>That’s an easy one!</p>
						<p>I’ve been helping businesses ‘pop on Google top’ for about a decade.</p>
						<p>Being an SEO Agency CEO, my greatest achievement is definitely a satisfied client (read this: well-ranked client)!</p>
						<p>Together with my SEOProLab team, I’ve helped numerous small businesses and elite corporations build their business.</p>
						<p>What’s more, our SEOProLab company is estimated to 200K value. It means we’re doing it right!</p>
					</div>
					<div class="flt-452">
						<p>I’m here to help you skyrocket your business.</p>
						<p>And also to connect with like-minded people by sharing the tips and tricks based on my experience.</p>
						<p>Stay tuned and I’ll give my best to keep you on the right track when it comes to SEO best practices.</p>
					</div>
				</div>
			</section>

			<section class="behind-the-scenes">
				<div class="behind-inner">
					<h2>Marko: behind the scenes</h2>
					<div>
						<img class="about-author" src="<?php echo esc_url( get_template_directory_uri('template_directory')); ?>/images/Serpline-about-slika-dole.jpg" alt="Author" height="669" width="465"/>
						<div>
							<p>I believe in power of knowledge. Most of my tips are based on hands-on experience in building future-proofed SEO results.</p>
							<p>Every new SEO project is like a new strategy game for me. </p>
							<p>Maybe the tactics are known, but the main plot is not. </p>
							<p>This is my approach to every project I take. And I enjoy it all the way.</p>
							<p>I love growing bees and am currently studying Fine Arts.</p>
							<p>This interesting mixture of interests helps me to better understand life, colors, and design and to take SEO to the next level, while sharing my SEO insights with fellow SEO experts like yourself.</p>
						</div>
					</div>
					<p class="attention"><span>Got your attention? Amazing!</span>
					Then join others that get my weekly SEO tips via email.</p>
				</div>
			</section>
	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();