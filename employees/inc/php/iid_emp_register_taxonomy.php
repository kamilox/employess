<?php

global $wp;

function iid_emp_taxonomies() {
 
    $labels = array(
        'name'              => _x( 'Employees', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'employee', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Employees', 'textdomain' ),
        'all_items'         => __( 'All Employees', 'textdomain' ),
        'view_item'         => __( 'View employee', 'textdomain' ),
        'parent_item'       => __( 'Parent employee', 'textdomain' ),
        'parent_item_colon' => __( 'Parent employee:', 'textdomain' ),
        'edit_item'         => __( 'Edit employee', 'textdomain' ),
        'update_item'       => __( 'Update employee', 'textdomain' ),
        'add_new_item'      => __( 'Add New employee', 'textdomain' ),
        'new_item_name'     => __( 'New employee Name', 'textdomain' ),
        'not_found'         => __( 'No Employees Found', 'textdomain' ),
        'back_to_items'     => __( 'Back to Employees', 'textdomain' ),
        'menu_name'         => __( 'Employees types', 'textdomain' ),
    );
 
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'employeed' ),
        'show_in_rest'      => true,
    );
 
 
    register_taxonomy( 'employeed', 'employee', $args );
 
}
add_action( 'init', 'iid_emp_taxonomies' );

?>