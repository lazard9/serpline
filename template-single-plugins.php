<?php
/*
 * Template Name: Best Plugins
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

			<div class="cat-plugins-header">
				<?php if (has_post_thumbnail()) : ?>
            		<?php the_post_thumbnail(); ?>
				<?php endif; ?>
				<?php echo do_shortcode('[addtoany buttons="facebook,twitter,linkedin"]'); ?>
				<h1><?php if( class_exists('acf') && get_field('alternate_title') ) { echo do_shortcode(get_field('alternate_title')); } else { the_title(); } ?></h1>
				<div class="hd-txt">
					<?php the_content(); ?>
				</div>
			</div>
			
			<?php
			endwhile;

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

			<div class="cat-plugins-contents">
				<div class="locate"><a id="contents" class="chapter"></a></div>

				<?php while ( $articles_query->have_posts() ) : $articles_query->the_post();
					if( class_exists('acf') && get_field('icon') ) {
						global $post;
	    				$post_slug = $post->post_name; ?>
						<div class="lct-plg">
	            			<a href="#<?php echo $post_slug; ?>">
	            				<img src="<?php echo do_shortcode(get_field('icon')); ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" height="135" width="auto" />
	            				<div>
									<h5><?php the_title(); ?></h5>
									<?php the_excerpt(); ?>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php endwhile; ?>
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

		$sections_query = new WP_Query( array( 'post_type' => 'articles', 'post_status' => 'publish',  'order' => 'asc', 'category_name' => $article ) );
		
		while ( $articles_query->have_posts() ) : $articles_query->the_post();
			global $post;
    		$post_slug = $post->post_name; ?>						

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="cat-plugins-chapter">
					<?php if( class_exists('acf') && get_field('icon') ) { ?>
					<div class="locate"><a id="<?php echo $post_slug; ?>" class="chapter"></a></div>
					<?php } ?>
				    <div class="cat-plugins-chapter-excerpt" <?php if( class_exists('acf') && get_field('article_background_color') ) { ?> style="background-color: <?php echo do_shortcode(get_field('article_background_color')); ?>" <?php } ?>>
						<h2 <?php if( class_exists('acf') && get_field('article_title_color') ) { ?> style="color: <?php echo do_shortcode(get_field('article_title_color')); ?>" <?php } ?>><?php the_title(); ?></h2>
						<div <?php if (has_post_thumbnail()) { echo "class='cat-plugins-row'"; } else { echo "class='cat-plugins-col'"; } ?>>
							<?php if( class_exists('acf') && get_field('introduction_text') ) { ?>
								<div class="lft-inline"><p <?php if( class_exists('acf') && get_field('article_introduction_color') ) { ?> style="color: <?php echo do_shortcode(get_field('article_introduction_color')); ?>" <?php } ?>><?php echo do_shortcode(get_field('introduction_text')); ?></p></div>
							<?php } ?>
							<?php if (has_post_thumbnail()) : ?>
			            		<?php the_post_thumbnail(); ?>
	        				<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="cat-plugins-chapter-content">
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