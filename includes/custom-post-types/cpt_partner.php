<?php 
// Custom Post Type Partner 
function register_partner_cpt() {
	$labels = array( 
		'name' 					=> 'Partner',
		'singular_name'			=> 'Partner',
		'add_new' 				=> 'Add New',
		'all_items' 			=> 'All Partners',
		'add_new_item' 			=> 'Add New Partner',
		'edit_item'				=> 'Edit Partner',
		'new_item' 				=> 'New Partner',
		'view_item' 			=> 'View Partner',
		'search_items' 			=> 'Search Partners',
		'not_found' 			=> 'No Partners Found',
		'not_found_in_trash' 	=> 'No Partners Found in Trash',
		'parent_item_colon' 	=> 'Parent Partner Post:',
		'menu_name' 			=> 'Partner',
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
										'slug' 			=> 'partner', 
										'with_front' 	=> false,
										'feeds' 		=> true,
										'pages' 		=> true,
										'ep_mask' 		=> EP_PERMALINK
									),
		'query_var' 			=> true,
		'can_export' 			=> true,
	);
	register_post_type( 'partner', $args );
}
add_action( 'init', 'register_partner_cpt' );
?>