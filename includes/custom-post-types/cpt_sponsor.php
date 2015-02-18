<?php 
// Custom Post Type Sponsor 
function register_sponsor_cpt() {
	$labels = array( 
		'name' 					=> 'Sponsor',
		'singular_name'			=> 'Sponsor',
		'add_new' 				=> 'Add New',
		'all_items' 			=> 'All Sponsors',
		'add_new_item' 			=> 'Add New Sponsor',
		'edit_item'				=> 'Edit Sponsor',
		'new_item' 				=> 'New Sponsor',
		'view_item' 			=> 'View Sponsor',
		'search_items' 			=> 'Search Sponsors',
		'not_found' 			=> 'No Sponsors Found',
		'not_found_in_trash' 	=> 'No Sponsors Found in Trash',
		'parent_item_colon' 	=> 'Parent Sponsor Post:',
		'menu_name' 			=> 'Sponsor',
	);
	$args = array( 
		'labels' 				=> $labels,
		'description' 			=> 'This is a Custom Post Type',
		'public' 				=> true,
		'exclude_from_search' 	=> false,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_nav_menus' 	=> true,
		'show_in_menu' 			=> true,
		'show_in_admin_bar' 	=> true,
		'menu_position' 		=> 25,
		/*
		  5 - below Posts
		 10 - below Media
		 15 - below Links
		 20 - below Pages
		 25 - below comments
		 60 - below first separator
		 65 - below Plugins
		 70 - below Users
		 75 - below Tools
		 80 - below Settings
		100 - below second separator
		*/
		'menu_icon' 			=> NULL, /*get_stylesheet_directory_uri().'/images/your-image.png', */
		'capability_type' 		=> 'post',
		'capabilities' 			=> array(	
										'edit_post', 
										'read_post', 
										'delete_post',
										'edit_posts',
										'edit_others_posts',
										'publish_posts',
										'read_private_posts'
									),
		'map_meta_cap' 			=> true,
		'hierarchical' 			=> false,
		'supports' 				=> array( 	
										'title',
										'editor',
										//'author',
										//'thumbnail',
										//'excerpt',
										//'trackbacks',
										//'custom-fields',
										//'comments' ,
										//'revisions',
										//'page-attributes',
										//'post-formats'
									),
		/* 
		'register_meta_box_cb' => 'add_custom_meta_box',
		 
		'taxonomies' 			=> array( 'category', 'tag'),*/
		'has_archive'			=> true,
		'permalink_epmask' 		=> EP_PERMALINK,
		'rewrite' 				=> array( 	
										'slug' 			=> 'sponsor', 
										'with_front' 	=> false,
										'feeds' 		=> true,
										'pages' 		=> true,
										'ep_mask' 		=> EP_PERMALINK
									),
		'query_var' 			=> true,
		'can_export' 			=> true,
	);
	register_post_type( 'sponsor', $args );
}
add_action( 'init', 'register_sponsor_cpt' );
?>