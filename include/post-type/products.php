<?php
add_action( 'init', 'create_products');
function create_products() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'tb-custom-post-types' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'tb-custom-post-types' ),
		'menu_name'             => __( 'Products', 'tb-custom-post-types' ),
		'name_admin_bar'        => __( 'Products', 'tb-custom-post-types' ),
		'all_items'             => __( 'All Products', 'tb-custom-post-types' ),
		'add_new_item'          => __( 'Add New Product', 'tb-custom-post-types' ),
		'add_new'               => __( 'Add Product', 'tb-custom-post-types' ),
		'new_item'              => __( 'New Product', 'tb-custom-post-types' ),
		'edit_item'             => __( 'Edit Product', 'tb-custom-post-types' ),
		'update_item'           => __( 'Update Product', 'tb-custom-post-types' ),
		'search_items'          => __( 'Search Product', 'tb-custom-post-types' ),
	
	);
	$args = array(
		'labels'                => $labels,
		'rewrite'               => array( 'slug' => 'products' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-pressthis',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
		'supports'              => array( 'title')
		
	);
	register_post_type( 'products', $args);

	// Labels
	$singular = 'Procuct Catogory';
	$plural = 'Procuct Catogories';
	$tax_labels = array(
		'name' => _x( $plural, "taxonomy general name"),
		'singular_name' => _x( $singular, "taxonomy singular name"),
		'search_items' =>  __("Search $singular"),
		'all_items' => __("All $singular"),
		'parent_item' => __("Parent $singular"),
		'parent_item_colon' => __("Parent $singular:"),
		'edit_item' => __("Edit $singular"),
		'update_item' => __("Update $singular"),
		'add_new_item' => __("Add New $singular"),
		'new_item_name' => __("New $singular Name"),
	);

	$tax_args = array(
		'public' => false,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => false,
		'query_var' => true,
		'rewrite' => false,
		'labels' => $tax_labels
	);
	
	register_taxonomy( 'product_categories', 'products', $tax_args );

}
