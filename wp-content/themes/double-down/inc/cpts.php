<?php
function cptui_register_my_cpts_menu_items() {

	/**
	 * Post Type: Food Items.
	 */

	$labels = [
		"name" => __( "Food Items", "twentytwentytwo" ),
		"singular_name" => __( "Food Item", "twentytwentytwo" ),
	];

	$args = [
		"label" => __( "Food Items", "twentytwentytwo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "menu_items", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "menu_items", $args );
}

add_action( 'init', 'cptui_register_my_cpts_menu_items' );



function cptui_register_cat_taxes_menu_food_type() {

	/**
	 * Taxonomy: Food Types.
	 */

	$labels = [
		"name" => __( "Food Types", "twentytwentytwo" ),
		"singular_name" => __( "Food Type", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Food Types", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'menus_type', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "menus_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "menus_type", [ "menu_items" ], $args );
}
add_action( 'init', 'cptui_register_cat_taxes_menu_food_type' );

function cptui_register_my_taxes_menu_types() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => __( "Product Categories", "twentytwentytwo" ),
		"singular_name" => __( "Product Category", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Product Category", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'menu_types', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "menu_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "menu_types", [ "menu_items" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_menu_types' );

function cptui_register_my_taxes_menu_sub_types() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => __( "Product Sub Categories", "twentytwentytwo" ),
		"singular_name" => __( "Product Sub Category", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Product Sub Category", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'menu_sub_types', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "menu_sub_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "menu_sub_types", [ "menu_items" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_menu_sub_types' );




function cptui_register_my_taxes_allergies() {

	/**
	 * Taxonomy: Allergies .
	 */

	$labels = [
		"name" => __( "Allergies ", "twentytwentytwo" ),
		"singular_name" => __( "Allergies ", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Allergies ", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'allergies', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "allergies",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "allergies", [ "menu_items" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_allergies' );









function cptui_register_my_cpts_catering() {

	/**
	 * Post Type: Caterings.
	 */

	$labels = [
		"name" => __( "Caterings", "twentytwentytwo" ),
		"singular_name" => __( "Catering", "twentytwentytwo" ),
	];

	$args = [
		"label" => __( "Caterings", "twentytwentytwo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "catering", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "catering", $args );
}

add_action( 'init', 'cptui_register_my_cpts_catering' );

function cptui_register_my_taxes_food_type() {

	/**
	 * Taxonomy: Food Types.
	 */

	$labels = [
		"name" => __( "Food Types", "twentytwentytwo" ),
		"singular_name" => __( "Food Type", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Food Types", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'food_type', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "food_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "food_type", [ "catering" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_food_type' );

function cptui_register_my_taxes_allergens() {

	/**
	 * Taxonomy: Allergens.
	 */

	$labels = [
		"name" => __( "Allergens", "twentytwentytwo" ),
		"singular_name" => __( "Allergen", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Allergens", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'allergens', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "allergens",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "allergens", [ "catering" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_allergens' );

function cptui_register_my_taxes_product_category() {

	/**
	 * Taxonomy: Product Categories.
	 */

	$labels = [
		"name" => __( "Product Categories", "twentytwentytwo" ),
		"singular_name" => __( "Product Category", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Product Categories", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_category', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_category", [ "catering" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_product_category' );

function cptui_register_my_taxes_product_sub_category() {

	/**
	 * Taxonomy: Product Sub Categories.
	 */

	$labels = [
		"name" => __( "Heating Options", "twentytwentytwo" ),
		"singular_name" => __( "Heating Option", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Heating Options", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_sub_category', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_sub_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_sub_category", [ "catering" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_product_sub_category' );


function cptui_register_my_cpts_orders() {

	/**
	 * Post Type: Orders.
	 */

	$labels = [
		"name" => __( "Orders", "twentytwentytwo" ),
		"singular_name" => __( "Order", "twentytwentytwo" ),
	];

	$args = [
		"label" => __( "Orders", "twentytwentytwo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "orders", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor" ],
		"show_in_graphql" => false,
	];

	register_post_type( "orders", $args );
}

add_action( 'init', 'cptui_register_my_cpts_orders' );



function cptui_register_my_cpts_meeting_food() {

	/**
	 * Post Type: Meeting Foods.
	 */

	$labels = [
		"name" => __( "Meeting Foods", "twentytwentytwo" ),
		"singular_name" => __( "Meeting Food", "twentytwentytwo" ),
	];

	$args = [
		"label" => __( "Meeting Foods", "twentytwentytwo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "meeting_food", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "meeting_food", $args );
}

add_action( 'init', 'cptui_register_my_cpts_meeting_food' );


function cptui_register_my_cpts_invoice() {

	/**
	 * Post Type: invoice.
	 */

	$labels = [
		"name" => __( "Invoice", "twentytwentytwo" ),
		"singular_name" => __( "Invoice", "twentytwentytwo" ),
	];

	$args = [
		"label" => __( "Invoice", "twentytwentytwo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "invoice", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor" ],
		"show_in_graphql" => false,
	];

	register_post_type( "invoice", $args );
}

add_action( 'init', 'cptui_register_my_cpts_invoice' );








