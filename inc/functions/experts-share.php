<?php 
function Experts_Share_register() {

    $labels = array(
        'name'                  => _x( 'Experts', 'post type general name', 'serpline' ),
        'singular_name'         => _x( 'Expert', 'post type singular name', 'serpline' ),
        'menu_name'             => __( 'Experts Share', 'serpline' ),
        'parent_item_colon'     => '',
        'all_items'             => __( 'All Experts', 'serpline' ),
        'view_item'             => __( 'View Expert', 'serpline' ),
        'add_new'               => __( 'Add New', 'serpline' ),
        'add_new_item'          => __( 'Add New Expert', 'serpline' ),
        'edit_item'             => __( 'Edit Expert', 'serpline' ),
        'update_item'           => __( 'Update Expert', 'serpline' ),
        'new_item'              => __( 'New Expert', 'serpline' ),
        'search_items'          => __( 'Search Experts', 'serpline' ),
        'not_found'             => __( 'No Experts found', 'serpline' ),
        'not_found_in_trash'    => __( 'No Experts found in Trash', 'serpline' ), 
    );

    $args = array(
        'label'                 => __( 'Experts Share', 'serpline' ),
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
        'menu_icon'             => 'dashicons-groups',
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
    ); 
    register_post_type('Experts Share',$args);

}

add_action( 'init', 'Experts_Share_register', 0 );