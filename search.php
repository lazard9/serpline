<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package serpline
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="search-list-outher">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search results for: %s', 'serpline' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
					</header><!-- .page-header -->

					<div class="post-list-container clear">

						<div class="post-list-left">

							<div class="post-list">

								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile; ?>

							</div>

							<?php the_posts_navigation(); ?>

						</div>

					<?php else :

						get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

					<?php get_sidebar(); ?>

				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
