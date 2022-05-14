<?php 
function Logos_register() {

    $labels = array(
        'name'                  => _x( 'Logos', 'post type general name', 'serpline' ),
        'singular_name'         => _x( 'Logos', 'post type singular name', 'serpline' ),
        'menu_name'             => __( 'Logos', 'serpline' ),
        'parent_item_colon'     => '',
        'all_items'             => __( 'All Logos', 'serpline' ),
        'view_item'             => __( 'View Logos', 'serpline' ),
        'add_new'               => __( 'Add New', 'serpline' ),
        'add_new_item'          => __( 'Add New Logos', 'serpline' ),
        'edit_item'             => __( 'Edit Logos', 'serpline' ),
        'update_item'           => __( 'Update Logos', 'serpline' ),
        'new_item'              => __( 'New Logos', 'serpline' ),
        'search_items'          => __( 'Search Logos', 'serpline' ),
        'not_found'             => __( 'No Logos found', 'serpline' ),
        'not_found_in_trash'    => __( 'No Logos found in Trash', 'serpline' ), 
    );

    $args = array(
        'label'                 => __( 'Logos', 'serpline' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => false,  // it's not public, it shouldn't have it's own permalink, and so on
        'publicly_queryable'    => false,  // you should be able to query it
        'show_ui'               => true,  // you should be able to edit it in wp-admin
        'exclude_from_search'   => true,  // you should exclude it from search results
        'show_in_nav_menus'     => false,  // you shouldn't be able to add it to menus
        'has_archive'           => false,  // it shouldn't have archive page
        'rewrite'               => false,  // it shouldn't have rewrite rules 
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-images-alt2',
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'can_export'            => true
    ); 
    register_post_type('Logos',$args);

}

add_action( 'init', 'Logos_register', 0 );