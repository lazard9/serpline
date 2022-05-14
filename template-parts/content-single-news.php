<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="header-single">
		<div class="title-wpp1">
			<div class="title-wpp2">
				<?php the_title( '<h1 class="title-single">', '</h1>' ); ?>
				<div class="entry-single">
					<?php serpline_entry_single(); ?>
				</div><!-- .entry-meta -->
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="post-left">

		<div class="post-width">

			<div class="post-content">
				<?php echo do_shortcode('[addtoany buttons="facebook,twitter,linkedin"]'); ?>	

				<?php if (has_post_thumbnail()) : ?>
		            <div class="post-featured post-featured__news-modifier"><?php the_post_thumbnail('full'); ?></div>
		      	<?php endif; ?>
				
				<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'serpline' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'serpline' ),
						'after'  => '</div>',
					) );
				?>

			</div>
			
			<?php
			$currentID = get_the_ID();
			$args = array(
				'post_type' => 'news',
				'post_status' => 'publish',
				'posts_per_page' => 1,
				'orderby' => 'rand',
				'ignore_sticky_posts' => 1,
				'post__not_in' => array($currentID)
			);

			$related_query = new WP_Query( $args );
			if( $related_query->have_posts() ) {
				echo '<div class="post-related"><p class="next-read">NEXT READ</p>';
					while( $related_query->have_posts() ) {
			      		$related_query->the_post(); ?>
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				    <?php } wp_reset_postdata();
		    	echo '</div>'; 
			} ?>

	    	<div id="hide-social" class="written-by clear">
	    		<div class="author-img">
	    			<p class="author">Written by <?php echo  get_the_author_meta('display_name'); ?></p>
	    			<?php echo get_avatar( get_the_author_meta('email'), '120', '/images/no_image.png', get_the_author() ); ?>
	    		</div>
	    		<div>
	    			<p class="author">Written by <?php echo  get_the_author_meta('display_name'); ?></p>
	    			<p class="few-words">I’m founder of SeoProLab and I’ve helped numerous small businesses and elite corporations build their business and ‘pop on Google top’ for about a decade. <a class="see-more" href="<?php echo esc_url( home_url('/about/')); ?>">See more here</a>.</p>
	    		</div>
	    	</div>

	    	
			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		</div>

	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->