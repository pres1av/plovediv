<?php

	// Uncomment add_action below to activate
	
	//add_action('init', 'services');
	 
	function services() {
	 
		$labels = array(
			'name' => _x('Services', 'post type general name'),
			'singular_name' => _x('Service', 'post type singular name'),
			'add_new' => _x('Add New', 'Service'),
			'add_new_item' => __('Add New Service'),
			'edit_item' => __('Edit Service'),
			'new_item' => __('New Service'),
			'view_item' => __('View Service'),
			'search_items' => __('Search Services'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in Trash'),
			'parent_item_colon' => ''
		);
	 
		$args = array(
			'labels' => $labels,
			'public' => true,
			//'publicly_queryable' => true,
			'show_ui' => true,
			//'show_in_menu' => true,
			'query_var' => true,
			'menu_icon' => get_stylesheet_directory_uri() . '/images/icon_wp_plus.png',
			//'rewrite' => array("slug" => "portfolio", "with_front" => true), // Permalinks format
			
			'rewrite' => array(
		        'slug'=>'services', //THIS CANT BE THE SAME AS A PAGE SLUG
		        'with_front'=> false,
		        'feed'=> true,
		        'pages'=> true
		    ),
			
			//'taxonomies' => array('service_type'),
			'capability_type' => 'post',
			'hierarchical' => true,
			'has_archive' => false,
			//'menu_position' => null,
			'supports' => array('title','editor')
		  ); 
	 
		register_post_type( 'services' , $args );
		
		/*register_taxonomy("service_type", array( "services"), 
			array(
				"hierarchical" => true, 
				"label" => "Type", 
				"show_ui" => true, 
				//"singular_label" => "Type",
				'query_var' => true, 
				'rewrite' => array('slug' => 'portfolio-type', 'hierarchical' => true, "with_front" => FALSE)
			)
		);*/
	
		// Only uncomment next line for development, otherwise always comment out.
		//flush_rewrite_rules();
		
	}

?>