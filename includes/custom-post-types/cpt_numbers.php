<?php 
// Custom Post Type Numbers 
function register_numbers_cpt() {
	$labels = array( 
		'name' 					=> 'The Numbers',
		'singular_name'			=> 'The Numbers',
		'add_new' 				=> 'Add New',
		'all_items' 			=> 'All The Numbers',
		'add_new_item' 			=> 'Add New Number',
		'edit_item'				=> 'Edit Number',
		'new_item' 				=> 'New Number',
		'view_item' 			=> 'View Number',
		'search_items' 			=> 'Search The Numbers',
		'not_found' 			=> 'No Numbers Found',
		'not_found_in_trash' 	=> 'No Numbers Found in Trash',
		'parent_item_colon' 	=> 'Parent Number Post:',
		'menu_name' 			=> 'The Numbers',
	);
	$args = array( 
		'labels' 				=> $labels,
		'description' 			=> 'This the Numbers Custom Post Type',
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
										//'editor',
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
		
		'taxonomies' 			=> array( 'category', 'tag'), */
		'has_archive'			=> true,
		'permalink_epmask' 		=> EP_PERMALINK,
		'rewrite' 				=> array( 	
										'slug' 			=> 'numbers', 
										'with_front' 	=> false,
										'feeds' 		=> true,
										'pages' 		=> true,
										'ep_mask' 		=> EP_PERMALINK
									),
		'query_var' 			=> true,
		'can_export' 			=> true,
	);
	register_post_type( 'numbers', $args );
}
add_action( 'init', 'register_numbers_cpt' );
?>