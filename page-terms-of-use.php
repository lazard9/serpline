<?php
/**
 * Terms of use policy page templete
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="page-wrapper"><!-- Page content -->

				<div class="page-content">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								the_content();

							endwhile;


						endif; ?>

				</div>
				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();