<?php 
function news_register() {

    $newsDescription = 'Read the latest News';
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'News', 'Post Type General Name', 'serpline' ),
            'singular_name'       => _x( 'News', 'Post Type Singular Name', 'serpline' ),
            'menu_name'           => __( 'News', 'serpline' ),
            'parent_item_colon'   => '', //__( 'Parent News', 'serpline' ),
            'all_items'           => __( 'All News', 'serpline' ),
            'view_item'           => __( 'View News', 'serpline' ),
            'add_new_item'        => __( 'Add New News', 'serpline' ),
            'add_new'             => __( 'Add New', 'serpline' ),
            'edit_item'           => __( 'Edit News', 'serpline' ),
            'update_item'         => __( 'Update News', 'serpline' ),
            'new_item'            => __( 'New News', 'serpline' ),
            'search_items'        => __( 'Search News', 'serpline' ),
            'not_found'           => __( 'Not Found', 'serpline' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'serpline' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'News', 'serpline' ),
            'description'         => __( $newsDescription, 'serpline' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_icon'           => 'dashicons-edit-page',
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 6,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            //'show_in_rest'        => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'News', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'news_register', 0 );