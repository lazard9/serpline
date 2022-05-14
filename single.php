<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package serpline
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="post-wrapper clear">

				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

					endwhile; // End of the loop.
				?>

				<div class="post-single-sidebar">
					<?php get_sidebar(); ?>
				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
