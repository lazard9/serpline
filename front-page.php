<?php
/**
 * Landing page templete
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="front-banner-section">
			<div class="front-banner">
				<h1 class="fade-away2">SEO Justified!</h1>
			</div>
			<div class="front-banner-textu fade-away1">
				<p class="boost-your-seo">Skyrocket your business and boost <span>your SEO knowledge and skills</span> <span>with  powerful  guidelines, practical</span> tutorials and in-depth analysis.</p>
				<div class="front-email-address">
					<p class="private-list-h">Join my private email list</p>
			        <div class="newsletter-form-h clear">

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
			</div>
			<div class="front-banner-textd">
				<div>
					<h2>Hi!</h2>
					<p>I’m Marko Velickovic, <span>certified and results-oriented SEO</span> <span>specialist with 10 years experience</span> in the SEO domain.</p>
					<p>I am also the founder of <span><a href="http://www.seoprolab.com/" target="_blank" title="SeoProLab" rel="noopener">SeoProLab</a>, the 200K worth</span> <span>innovative Agency for digital</span> <span>marketing and Search Engine</span> Optimization.</p>
					<p class="last"><a href="<?php echo esc_url( home_url('/about/')); ?>">About Marko</a></p>
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

		<?php endwhile;  wp_reset_postdata(); endif;

		$fp_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'orderby' => 'post_modified' ) ); $j=0;
		
		if( $fp_query->have_posts() ) : ?>
		
			<div class="front-posts-wrapper">

				<div class="front-posts">

					<?php
					/* Start the Loop */
					while ( $fp_query->have_posts() ) : $fp_query->the_post(); $j++; ?>						

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						    <div <?php if ( $j == 1 ) { echo 'class="front-list-1"'; } elseif ( $j == 4 ) { echo 'class="front-list btm"'; } else { echo 'class="front-list"'; } ?>>
						        <?php if (has_post_thumbnail()) : $feat_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
						        	<div class="front-list-img">     
						              	<div class="front-list-background" style="background-image:url('<?php echo $feat_image ?>');">
						              		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
						              	</div>
						        	</div>
							        <div class="front-list-txt">
							        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							            <div><?php serpline_entry_posts(); ?></div>
							        </div>
							    <?php else: ?>
							    	<div class="front-list-txt wdt">
						        		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						            	<div><?php serpline_entry_posts(); ?></div>
						        	</div>
						        <?php endif; ?>
						        <div class="front-vertical"></div>
						    </div>
						</article>

						<?php if ( $j == 1 ) {
							echo '<p class="latest-posts">LATEST POSTS</p>';
						}

						endwhile; ?>

					<div class="read-all-posts">
						<h4><a title="Read all posts" href="<?php echo esc_url( home_url('/blog/')); ?>">Read all posts</a></h4>
					</div>

				</div>

			</div>	

		<?php wp_reset_postdata(); endif; ?>

	</main>
</div>

<?php
get_footer();