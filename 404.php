<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package serpline
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found"><!-- error-404 page -->

				<h1>Whoops!</h1>
				
				<h2>You nearly found it.</h2>

				<h6>Try <a href="<?php echo esc_url( home_url( '/' ) ); ?>">back to home</a> ot <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">my blog.</a></h6>

				<h6>Or sign in to my newsletter. What's better than valuable content!</h6>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
