<?php
// Register Custom Post Type - How to buy
function xpertos_how_to_buy_post_type() {
    $labels = array(
        'name'                => __( 'How to buy', 'Post Type General Name', 'xpertos' ),
        'singular_name'       => __( 'Step', 'Post Type Singular Name', 'xpertos' ),
        'menu_name'           => __( 'How to buy', 'xpertos' ),
        'parent_item_colon'   => __( 'Parent step:', 'xpertos' ),
        'all_items'           => __( 'All Steps', 'xpertos' ),
        'view_item'           => __( 'View Step', 'xpertos' ),
        'add_new_item'        => __( 'Add New Step', 'xpertos' ),
        'add_new'             => __( 'New Step', 'xpertos' ),
        'edit_item'           => __( 'Edit Step', 'xpertos' ),
        'update_item'         => __( 'Update Step', 'xpertos' ),
        'search_items'        => __( 'Search Step', 'xpertos' ),
        'not_found'           => __( 'No Steps found', 'xpertos' ),
        'not_found_in_trash'  => __( 'No Steps found in Trash', 'xpertos' ),
    );
    $args = array(
        'label'               => __( 'Step', 'xpertos' ),
        'description'         => __( 'Step of how to buy', 'xpertos' ),
        'labels'              => $labels,
        'supports'            => array('editor', 'title', 'excerpt', 'thumbnail', 'page-attributes'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-status',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'how-to-buy', $args );
}
// Hook into the 'init' action
add_action( 'init', 'xpertos_how_to_buy_post_type', 0 );




// Register Custom Post Type - Xpertos values
function xpertos_values_post_type() {

    $labels = array(
        'name'                => __( 'Values', 'Post Type General Name', 'xpertos' ),
        'singular_name'       => __( 'Value', 'Post Type Singular Name', 'xpertos' ),
        'menu_name'           => __( 'Values', 'xpertos' ),
        'parent_item_colon'   => __( 'Parent Value:', 'xpertos' ),
        'all_items'           => __( 'All Values', 'xpertos' ),
        'view_item'           => __( 'View Value', 'xpertos' ),
        'add_new_item'        => __( 'Add New Value', 'xpertos' ),
        'add_new'             => __( 'New Value', 'xpertos' ),
        'edit_item'           => __( 'Edit Value', 'xpertos' ),
        'update_item'         => __( 'Update Value', 'xpertos' ),
        'search_items'        => __( 'Search Values', 'xpertos' ),
        'not_found'           => __( 'No Values found', 'xpertos' ),
        'not_found_in_trash'  => __( 'No Values found in Trash', 'xpertos' ),
    );
    $args = array(
        'label'               => __( 'Value', 'xpertos' ),
        'description'         => __( 'Value information pages', 'xpertos' ),
        'labels'              => $labels,
        'supports'            => array('thumbnail', 'title', 'editor', 'excerpt', 'page-attributes'),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-awards',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'values', $args );

}

// Hook into the 'init' action
add_action( 'init', 'xpertos_values_post_type', 0 );


// Register Custom Post Type - Services
function xpertos_services_post_type() {

    $labels = array(
        'name'                => __( 'Services', 'Post Type General Name', 'xpertos' ),
        'singular_name'       => __( 'Service', 'Post Type Singular Name', 'xpertos' ),
        'menu_name'           => __( 'Services', 'xpertos' ),
        'parent_item_colon'   => __( 'Parent Service:', 'xpertos' ),
        'all_items'           => __( 'All Services', 'xpertos' ),
        'view_item'           => __( 'View Service', 'xpertos' ),
        'add_new_item'        => __( 'Add New Service', 'xpertos' ),
        'add_new'             => __( 'New Service', 'xpertos' ),
        'edit_item'           => __( 'Edit Service', 'xpertos' ),
        'update_item'         => __( 'Update Service', 'xpertos' ),
        'search_items'        => __( 'Search Services', 'xpertos' ),
        'not_found'           => __( 'No Services found', 'xpertos' ),
        'not_found_in_trash'  => __( 'No Services found in Trash', 'xpertos' ),
    );
    $args = array(
        'label'               => __( 'Service', 'xpertos' ),
        'description'         => __( 'Service information pages', 'xpertos' ),
        'labels'              => $labels,
        'supports'            => array('editor', 'title', 'thumbnail', 'excerpt', 'page-attributes'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-multisite',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'services', $args );

}

// Hook into the 'init' action
add_action( 'init', 'xpertos_services_post_type', 0 );

// Register Custom Post Type - Frequent Questions
function xpertos_frequent_questions_post_type() {

    $labels = array(
        'name'                => __( 'Frequent Questions', 'Post Type General Name', 'xpertos' ),
        'singular_name'       => __( 'Frequent Question', 'Post Type Singular Name', 'xpertos' ),
        'menu_name'           => __( 'Frequent Questions', 'xpertos' ),
        'parent_item_colon'   => __( 'Parent Frequent Question:', 'xpertos' ),
        'all_items'           => __( 'All Frequent Questions', 'xpertos' ),
        'view_item'           => __( 'View Frequent Question', 'xpertos' ),
        'add_new_item'        => __( 'Add New Frequent Question', 'xpertos' ),
        'add_new'             => __( 'New Frequent Question', 'xpertos' ),
        'edit_item'           => __( 'Edit Frequent Question', 'xpertos' ),
        'update_item'         => __( 'Update Frequent Question', 'xpertos' ),
        'search_items'        => __( 'Search Frequent Question', 'xpertos' ),
        'not_found'           => __( 'No Frequent Questions found', 'xpertos' ),
        'not_found_in_trash'  => __( 'No Frequent Questions found in Trash', 'xpertos' ),
    );
    $args = array(
        'label'               => __( 'Frequent Question', 'xpertos' ),
        'description'         => __( 'Frequent Questions information pages', 'xpertos' ),
        'labels'              => $labels,
        'supports'            => array('editor', 'title', 'page-attributes'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-chat',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'frequent-questions', $args );

}

// Hook into the 'init' action
add_action( 'init', 'xpertos_frequent_questions_post_type', 0 );


// Register Custom Post Type - Slider
function xpertos_slider_post_type() {

    $labels = array(
        'name'                => __( 'Sliders', 'Post Type General Name', 'xpertos' ),
        'singular_name'       => __( 'Slider', 'Post Type Singular Name', 'xpertos' ),
        'menu_name'           => __( 'Slider', 'xpertos' ),
        'parent_item_colon'   => __( 'Parent Slider:', 'xpertos' ),
        'all_items'           => __( 'All Sliders', 'xpertos' ),
        'view_item'           => __( 'View Slider', 'xpertos' ),
        'add_new_item'        => __( 'Add New Slider', 'xpertos' ),
        'add_new'             => __( 'New Slider', 'xpertos' ),
        'edit_item'           => __( 'Edit Slider', 'xpertos' ),
        'update_item'         => __( 'Update Slider', 'xpertos' ),
        'search_items'        => __( 'Search Slider', 'xpertos' ),
        'not_found'           => __( 'No Sliders found', 'xpertos' ),
        'not_found_in_trash'  => __( 'No Sliders found in Trash', 'xpertos' ),
    );
    $args = array(
        'label'               => __( 'Slider', 'xpertos' ),
        'description'         => __( 'Slider information pages', 'xpertos' ),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-images-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'xpertos_slider_post_type', 0 );
