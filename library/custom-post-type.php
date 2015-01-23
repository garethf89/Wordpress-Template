<?php

// CREATE A NEW TYPE OF ITEMS
function create_portfolio_post_type() {
    register_post_type( 'post_portfolio',
        array(
            'labels' => array(
                'name' =>__( 'Portfolios', 'bonestheme'),
                'singular_name' =>__( 'Portfolio', 'bonestheme'),
                'all_items' =>__( 'All Portfolios', 'bonestheme'),
                'add_new_item' => __( 'Add New Portfolio', 'bonestheme'),
                'edit_item' => __( 'Edit Portfolio', 'bonestheme'),
                'new_item' => __( 'New Portfolio', 'bonestheme'),
                'view_item' => __( 'View Portfolio', 'bonestheme'),
                'search_items' => __( 'Search Portfolios', 'bonestheme'),
                'not_found' => __( 'No Portfolios found', 'bonestheme'),
                'not_found_in_trash' => __( 'No Portfolios found in Trash', 'bonestheme')
        ),
        'description' => 'Each post is a product.',
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor','page-attributes','thumbnail','revisions')
        )
    );
}


add_action( 'init', 'create_portfolio_post_type' );

//ADD 'CATEGORIES' TO THIS ITEM
function portfolio_taxonomy() {
    $labels = array(
    'name'              => __( 'Categories', 'bonestheme' ),
    'singular_name'     => __( 'Category', 'bonestheme' ),
    'search_items'      => __( 'Search Portfolio Categories', 'bonestheme' ),
    'all_items'         => __( 'All Portfolio Categories', 'bonestheme' ),
    'parent_item'       => __( 'Parent Portfolio Category', 'bonestheme' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:', 'bonestheme' ),
    'edit_item'         => __( 'Edit Portfolio Category', 'bonestheme' ), 
    'update_item'       => __( 'Update Portfolio Category', 'bonestheme' ),
    'add_new_item'      => __( 'Add New Portfolio Category', 'bonestheme' ),
    'new_item_name'     => __( 'New Portfolio Category', 'bonestheme' ),
    'menu_name'         => __( 'Categories', 'bonestheme' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_admin_column' => true, 
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'custom-slug' )
  );
  register_taxonomy( 'custom_cat', 'post_portfolio', $args );
}

add_action( 'init', 'portfolio_taxonomy', 0 );



?>