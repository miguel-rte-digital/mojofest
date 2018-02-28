<?php
register_taxonomy ( 'exhibitor-category', 'exhibitor', array (
    'hierarchical' => true,
    'labels' => array (
        'name' => __( 'Exhibitor Categories', 'dxef' ),
        'singular_name' => __( 'Exhibitor Category', 'dxef' ),
        'search_items' => __( 'Search Exhibitor Categories', 'dxef' ),
        'all_items' => __( 'All Exhibitor Categories', 'dxef' ),
        'parent_item' => __( 'Parent Exhibitor Category', 'dxef' ),
        'parent_item_colon' => __( 'Parent Exhibitor Category:', 'dxef' ),
        'edit_item' => __( 'Edit Exhibitor Category', 'dxef' ),
        'update_item' => __( 'Update Exhibitor Category', 'dxef' ),
        'add_new_item' => __( 'Add New Exhibitor Category', 'dxef' ),
        'new_item_name' => __( 'New Exhibitor Category', 'dxef' ),
        'menu_name' => __( 'Categories', 'dxef' )
    ),
    'query_var' => true,
    'rewrite' => true
) );