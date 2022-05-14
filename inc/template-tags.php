<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package serpline
 */

if ( ! function_exists( 'serpline_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function serpline_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'serpline' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'serpline' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'serpline_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function serpline_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'serpline' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'serpline' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'serpline' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'tagged %1$s', 'serpline' ) . '.</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'serpline' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'serpline_entry_single' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function serpline_entry_single() {
		// Hide category and tag text for pages.

		$author_display_name = get_the_author_meta('display_name');

		echo '<span class="byline">By '. $author_display_name .'</span>'; // Author

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'serpline' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		// Last Updated Date of Your Posts
		$u_time = get_the_time('U'); 
		$u_modified_time = get_the_modified_time('U'); 
		if ($u_modified_time >= $u_time + 86400) { 
			//$updated_date = get_the_modified_time('F jS, Y');
			$updated_date = sprintf( esc_html_x( '%s ago', '%s = human-readable time difference', 'serpline' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) );
		} else {
			//$updated_date = get_the_time('F jS, Y');
			$updated_date = sprintf( esc_html_x( '%s ago', '%s = human-readable time difference', 'serpline' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
		}

		echo '<span class="last-updated">Last updated '. $updated_date . '</span>';

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'serpline' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'serpline_entry_posts' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function serpline_entry_posts() {
		// Hide category and tag text for pages.

		// Last Updated Date of Your Posts
		$u_time = get_the_time('U'); 
		$u_modified_time = get_the_modified_time('U'); 
		if ($u_modified_time >= $u_time + 86400) { 
			//$updated_date = get_the_modified_time('F jS, Y');
			$updated_date = sprintf( esc_html_x( '%s ago', '%s = human-readable time difference', 'serpline' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) );
		} else {
			//$updated_date = get_the_time('F jS, Y');
			$updated_date = sprintf( esc_html_x( '%s ago', '%s = human-readable time difference', 'serpline' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
		}

		echo '<span class="last-updated">'. $updated_date . '</span>';

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'serpline' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'serpline' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
