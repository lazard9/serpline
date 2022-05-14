<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package serpline
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function serpline_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'serpline_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function serpline_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'serpline_pingback_header' );

/* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */
function fjarrett_remove_wp_version_strings( $src ) {
 global $wp_version;
 parse_str(parse_url($src, PHP_URL_QUERY), $query);
 if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
 $src = remove_query_arg('ver', $src);
 }
 return $src;
}
add_filter( 'script_loader_src', 'fjarrett_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'fjarrett_remove_wp_version_strings' );
/* Hide WP version strings from generator meta tag */
function wpmudev_remove_version() {
return '';
}
add_filter('the_generator', 'wpmudev_remove_version');

// Remove query strings from static resources
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

//Exclude pages from WordPress Search
if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}

// Ninja Forms filter removes - Fields marked with an * are required
add_filter( 'ninja_forms_i18n_front_end', 'my_custom_ninja_forms_i18n_front_end' );
function my_custom_ninja_forms_i18n_front_end( $strings ) {
    $strings['fieldsMarkedRequired'] = '';
    return $strings;
}

/**
 * Add different Posts Typers
 */

// Articles post type
require get_template_directory() . '/inc/functions/articles.php';

// Experts Share post type
require get_template_directory() . '/inc/functions/experts-share.php';

// Logos post type
require get_template_directory() . '/inc/functions/logos.php';

// News post type
require get_template_directory() . '/inc/functions/news.php';

/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'serpline') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul>
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li class="recent-post-list"><p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p><?php serpline_entry_posts(); ?></li>
				<?php endwhile; ?>
			</ul>
			 
			<?php
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}
}
function my_recent_widget_registration() {
	unregister_widget('WP_Widget_Recent_Posts');
	register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

//use registered commenter display_name if available
add_filter( 'get_comment_author', 'wpse_use_user_real_name', 10, 3 ) ;

function wpse_use_user_real_name( $author, $comment_id, $comment ) {

	if ($comment->user_id) {
		//comment by registered user
	    $author = get_the_author_meta('display_name');

	}

	return $author ;

}

// Hide Author Usernames. Redirect home author
function redirect_to_home( $query ){
    if(is_author() ) {
         wp_redirect( home_url() );
         exit;
     }
}
add_action( 'parse_query', 'redirect_to_home' );

// Redirect Attachment Page
function myprefix_redirect_attachment_page() {
	if ( is_attachment() ) {
		global $post;
		if ( $post && $post->post_parent ) {
			wp_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
			exit;
		} else {
			wp_redirect( esc_url( home_url( '/' ) ), 301 );
			exit;
		}
	}
}
add_action( 'template_redirect', 'myprefix_redirect_attachment_page' );

// Categories for Articles custom post type
function create_articles_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name', 'cnybroker' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'cnybroker' ),
        'search_items'      => __( 'Search Categories', 'cnybroker' ),
        'all_items'         => __( 'All Categories', 'cnybroker' ),
        'parent_item'       => __( 'Parent Category', 'cnybroker' ),
        'parent_item_colon' => __( 'Parent Category:', 'cnybroker' ),
        'edit_item'         => __( 'Edit Category', 'cnybroker' ),
        'update_item'       => __( 'Update Category', 'cnybroker' ),
        'add_new_item'      => __( 'Add New Category', 'cnybroker' ),
        'new_item_name'     => __( 'New Category Name', 'cnybroker' ),
        'menu_name'         => __( 'Categories', 'cnybroker' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'articles-category' ),
    );

    register_taxonomy( 'articles_categories', array( 'articles' ), $args );
}
add_action( 'init', 'create_articles_taxonomies', 0 );

/*
 * Create a shortcode that lists all experts
 */
 
add_shortcode('list_experts', 'experts_listing_shortcode');
function experts_listing_shortcode($atts){
	ob_start();
    // Set the arguments for the query
	$html = "";
    global $post; 
    $argsn = array( 
      	'posts_per_page'   => -1, // -1 is for all
      	'post_type'     => 'Experts Share', // or 'post', 'page'
        'post_status'   => 'publish',
      	'order'         => 'desc', // or 'ASC'
    );

    // Get the posts
    $myposts = get_posts($argsn);

    // If there are posts
    if($myposts):

        $html .= '<div id="contents" class="experts-list"><ul>';

        foreach($myposts as $post):setup_postdata($post);
			$html .= '<li class="expetr-item"><a href="#';
			$html .= get_post_field( 'post_name', $post->ID );;
			$html .= '" rel="noopener">';
			$html .= get_the_post_thumbnail($post->ID);
			$html .= '<span class="press">';
			$html .= get_the_title($post->ID);
			$html .= '</span>';
			$html .= '</a></li>';
        endforeach; wp_reset_postdata();

        $html .= '</ul></div>';    

     	// Prints the HTML
      	echo $html;

      	$myvariable = ob_get_clean();
   		return $myvariable;

    endif;
}

/*
 * Add title attribute to featured image
 */
add_filter( 'wp_get_attachment_image_attributes', 'tl_add_img_title', 10, 2 );
function tl_add_img_title( $attr, $attachment = null){
    $attr['title'] = get_post( $attachment->ID )->post_title;
    return $attr;
}

/*
 * Remove "Archives:" in title for CPT News Archive
 */
add_filter( 'get_the_archive_title', function ($title) {    
	if (is_post_type_archive('news')) {
			$title = post_type_archive_title( '', false );
		}
	return $title;    
});
