<?php
/*
 * Template Name: Experts Share
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="experts-share-intro">
			<h1><span><?php the_title(); ?></span></h1>
			<?php
				while ( have_posts() ) : the_post();
				
					the_content();

				endwhile; // End of the loop.
			?>
		</div>

		<?php 
		$experts_query = new WP_Query( array( 'post_type' => 'Experts Share', 'post_status' => 'publish', 'order' => 'desc', 'posts_per_page'   => -1) );
		$w=0;
		if( $experts_query->have_posts() ) : 

			echo '<div class="experts-wrapper">';

			while ( $experts_query->have_posts() ) : $experts_query->the_post();

			$w++;
			global $post;
    		$post_slug = $post->post_name; ?>						

    		<div class="locate"><a id="<?php echo $post_slug; ?>" class="chapter"></a></div>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div <?php if ( $w % 2 == 0 ) { echo 'class="exp-info exp-clr-purple"'; } else { echo 'class="exp-info exp-clr-blue"'; } ?>>
					<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
					<div>
						<h3><?php the_title(); ?></h3>
						<div>
							<?php 
							if( class_exists('acf') && get_field('expert_links') ) {
								echo do_shortcode(get_field('expert_links'));
							}
							?>
						</div>
				    </div>
				    <a class="share-this-section" href='https://twitter.com/share?url=https%3A%2F%2Fserpline.com%2Fsocial-media-marketing-tools%2F%23<?php echo $post_slug; ?>&text=48%20Experts%20Share%20Amazing%20SMM%20Tools%20That%20Rock%20The%20Web%20%5B2019%5D&via=serpline_' title="Share this section" rel="noopener" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>Share this section</a>
				</div>
				<div class="exp-content">
					<?php the_content(); ?>
				</div>
			</article>

		<?php endwhile; echo '</div>'; wp_reset_postdata(); endif; ?>

		<div class="experts-share-conclusion">
			<?php 
			if( class_exists('acf') && get_field('experts_conclusion_title') ) {
				echo '<h2 class="ft"><span>';
				echo do_shortcode(get_field('experts_conclusion_title'));
				echo '</h2></span>';
			}
			if( class_exists('acf') && get_field('experts_conclusion') ) {
				echo do_shortcode(get_field('experts_conclusion'));
			} ?>
		</div>

		<div id="hide-social"></div>

		<div class="post-width post-article-pd">

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		</div>

	</main>
</section>

<?php
get_footer();