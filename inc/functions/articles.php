<?php 
function Articles_register() {

    $labels = array(
        'name'                  => _x( 'Articles', 'post type general name', 'serpline' ),
        'singular_name'         => _x( 'Article', 'post type singular name', 'serpline' ),
        'menu_name'             => __( 'Articles', 'serpline' ),
        'parent_item_colon'     => '',
        'all_items'             => __( 'All Articles', 'serpline' ),
        'view_item'             => __( 'View Article', 'serpline' ),
        'add_new'               => __( 'Add New', 'serpline' ),
        'add_new_item'          => __( 'Add New Article', 'serpline' ),
        'edit_item'             => __( 'Edit Article', 'serpline' ),
        'update_item'           => __( 'Update Article', 'serpline' ),
        'new_item'              => __( 'New Article', 'serpline' ),
        'search_items'          => __( 'Search Articles', 'serpline' ),
        'not_found'             => __( 'No Articles found', 'serpline' ),
        'not_found_in_trash'    => __( 'No Articles found in Trash', 'serpline' ), 
    );

    $args = array(
        'label'                 => __( 'Articles', 'serpline' ),
        'labels'                => $labels,
        'supports'              => array(  'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => false,  // it's not public, it shouldn't have it's own permalink, and so on
        'publicly_queryable'    => false,  // you should be able to query it
        'show_ui'               => true,  // you should be able to edit it in wp-admin
        'exclude_from_search'   => true,  // you should exclude it from search results
        'show_in_nav_menus'     => false,  // you shouldn't be able to add it to menus
        'has_archive'           => false,  // it shouldn't have archive page
        'rewrite'               => false,  // it shouldn't have rewrite rules 
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-media-document',
        'menu_position'         => 4,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
    ); 
    register_post_type('Articles',$args);

}

add_action( 'init', 'Articles_register', 0 );