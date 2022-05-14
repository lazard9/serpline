<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'serpline' ); ?></h3>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<h5><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'serpline' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></h5>

		<?php elseif ( is_search() ) : ?>

			<h5><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'serpline' ); ?></h5>
			<div class="searchbardiv-style">
				<?php get_search_form(); ?>
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>

		<?php else : ?>

			<h5><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'serpline' ); ?></h5>
			<div class="searchbardiv-style">
				<?php get_search_form(); ?>
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->