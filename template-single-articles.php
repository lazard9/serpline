<?php
/*
 * Template Name: SEO Articles
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package serpline
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		

			<div class="cat-articles-header">
				<h1><?php if( class_exists('acf') && get_field('title_line_1') && get_field('title_line_2') ) { echo do_shortcode(get_field('title_line_1')); echo '<span>'; echo do_shortcode(get_field('title_line_2')); echo '</span>'; } else { the_title(); } ?></h1>
				<?php echo do_shortcode('[addtoany buttons="facebook,twitter,linkedin"]'); ?>
				<div class="cat-articles-row">
					<div class="lft-inline">
						<?php the_content(); ?>
					</div>
					<?php if (has_post_thumbnail()) : ?>
	            		<?php the_post_thumbnail(); ?>
					<?php endif; ?>
				</div>
			</div>

		<?php endwhile;

		endif;

		if( class_exists('acf') && get_field('enter_taxonomy_slug') ) { 
			$article = do_shortcode(get_field('enter_taxonomy_slug')); 
		} else {
			$article = 'nocat';
		}

		$articles_query = new WP_Query( array( 'post_type' => 'articles', 'post_status' => 'publish', 'order' => 'asc', 
			'tax_query' => array(
		        array(
		            'taxonomy' => 'articles_categories',
		            'field' => 'slug',
		            'terms' => $article,
		        )
		    )
		 ) );
		if( $articles_query->have_posts() ) : ?>

			<div class="cat-articles-contents">
				<div class="locate"><a id="contents" class="chapter"></a></div>
				<h2>I'LL WALK YOU THROUGH</h2>

				<div class="contents-inner clear">
				<?php while ( $articles_query->have_posts() ) : $articles_query->the_post();
					if( class_exists('acf') && get_field('icon') ) {
						global $post;
	    				$post_slug = $post->post_name; ?>
						<div class="article">
	            			<a href="#<?php echo $post_slug; ?>">
	            				<img src="<?php echo do_shortcode(get_field('icon')); ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" height="135" width="auto" />
								<span><?php the_title(); ?></span>
							</a>
							<div class="item-overlay">
								<?php the_excerpt(); ?>
							</div>
						</div>
					<?php } ?>
				<?php endwhile; ?>
				</div>
				<span class="outher-border"></span>
			</div>

		<?php

		$articles_query->rewind_posts(); ?>

		<div id="affix-navbar">
			<?php while ( $articles_query->have_posts() ) : $articles_query->the_post();
				if( class_exists('acf') && get_field('icon') ) {
					global $post;
					$post_slug = $post->post_name; ?>
					<a href="#<?php echo $post_slug; ?>">
						<img src="<?php echo do_shortcode(get_field('icon')); ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" height="54" width="auto" />
					</a>
				<?php } ?>
			<?php endwhile; ?>
        </div>

		<?php $articles_query->rewind_posts();
		
		while ( $articles_query->have_posts() ) : $articles_query->the_post();
			global $post;
    		$post_slug = $post->post_name; ?>						

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="cat-articles-chapter">
					<?php if( class_exists('acf') && get_field('icon') ) { ?>
					<div class="locate"><a id="<?php echo $post_slug; ?>" class="chapter"></a></div>
					<?php } ?>
					<span class="cat-articles-chapter-title"><?php the_title(); ?></span>
				    <div class="cat-articles-chapter-excerpt" <?php if( class_exists('acf') && get_field('article_background_color') ) { ?> style="background-color: <?php echo do_shortcode(get_field('article_background_color')); ?>" <?php } ?>>
						<h2 <?php if( class_exists('acf') && get_field('article_title_color') ) { ?> style="color: <?php echo do_shortcode(get_field('article_title_color')); ?>" <?php } ?>><?php echo(get_the_excerpt()); ?></h2>
						<div <?php if (has_post_thumbnail()) { echo "class='cat-articles-row'"; } else { echo "class='cat-articles-col'"; } ?>>
							<?php if( class_exists('acf') && get_field('introduction_text') ) { ?>
								<div class="lft-inline"><p <?php if( class_exists('acf') && get_field('article_introduction_color') ) { ?> style="color: <?php echo do_shortcode(get_field('article_introduction_color')); ?>" <?php } ?>><?php echo do_shortcode(get_field('introduction_text')); ?></p></div>
							<?php } ?>
							<?php if (has_post_thumbnail()) : ?>
			            		<?php the_post_thumbnail(); ?>
	        				<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="cat-articles-chapter-content">
					<?php
					$thecontent = get_the_content();
					if(!empty($thecontent)) {

					    the_content();
			        	echo '<span class="back-to-contents"><a href="#contents">Back to Contents</a></span>';

					} ?>
			    </div>
			</article>

		<?php endwhile; wp_reset_postdata(); endif; ?>

		<div id="hide-social"></div>

		<div class="post-width post-article-pd">

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		</div>

	</main>
</div>

<?php
get_footer();