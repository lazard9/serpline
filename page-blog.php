<?php
/**
 * Blog page templete
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="blog-banner-section">
			<div class="blog-banner">
				<h1>Want to boost your Google rankings? Read thoroughly.</h1>
				<img class="blog-author" src="<?php echo esc_url( get_template_directory_uri('template_directory')); ?>/images/Serpline-home-slika.png" alt="Author" height="933" width="699"/>
				<img class="blog-arrow" src="<?php echo esc_url( get_template_directory_uri('template_directory')); ?>/images/blog-strelica.png" alt="Background" height="581" width="938"/>
			</div>
			<div class="blog-email-address">
				<p class="private-list-b">Join my private email list</p>
		        <div class="newsletter-form-b clear">

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
		</section>

		<?php

		$paged = get_query_var( 'paged' );
		$bp_query = new WP_Query( array( 'paged' => $paged, 'post_type' => 'post', 'posts_per_page' => 6, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'orderby' => 'post_modified' ) );
		
		if( $bp_query->have_posts() ) : ?>
		
			<div class="post-list-outher">

				<div class="post-list-container clear">

					<div class="post-list-left">

						<div class="post-list">

							<?php
							/* Start the Loop */
							while ( $bp_query->have_posts() ) : $bp_query->the_post();

								get_template_part( 'template-parts/content-search', get_post_type() ); ?>

							<?php endwhile; ?>

						</div>

						<div class="page-pagination">
				      		<?php echo paginate_links(array(
				      			'total' => $bp_query->max_num_pages,
					        	'prev_text' => __(  'Previous', 'serpline' ),
								'next_text' => __( 'Next', 'serpline' ),
					      	)); ?>
					    </div>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>	

		<?php wp_reset_postdata(); endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();