<?php
	
	//========================================================================
	//! Function Includes
	//========================================================================
	
	require_once('fn_includes/inc_fn_acf_gallery_v2.php');
	require_once('fn_includes/inc_fn_get_featured_image_v2.php');
	
	
	//========================================================================
	//! Posts
	//========================================================================
	
	// Gets the current post type in the WordPress Admin
	function get_current_post_type() {
		global $post, $typenow, $current_screen;
		
		//we have a post so we can just get the post type from that
		if ( $post && $post->post_type )
			return $post->post_type;
		
		//check the global $typenow - set in admin.php
		elseif( $typenow )
			return $typenow;
		
		//check the global $current_screen object - set in sceen.php
		elseif( $current_screen && $current_screen->post_type )
			return $current_screen->post_type;
		
		//lastly check the post_type querystring
		elseif( isset( $_REQUEST['post_type'] ) )
			return sanitize_key( $_REQUEST['post_type'] );
		
		//we do not know the post type!
		return null;
	}
	
	// Get the highest parent of a page/post
	function get_top_ancestor($id) {
		$current = get_post($id);
		if (!$current->post_parent) {
			return $current->ID;
		} 
		else {
			return get_top_ancestor($current->post_parent);
		}
	}
	
	// Excerpt: Change Word Count Length
	function custom_excerpt_length($length) {
		
		return 200;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	// Excerpt: Custom Length
	function excerpt($limit, $ReadMore = true, $MoreText = 'Read more') { 

		$link = ' ...<a class="read-more" href="'. get_permalink($post->ID) . '">'.$MoreText.'</a>';	
				
		if( has_excerpt() ) {
		
			$excerpt = '<p>'.the_excerpt().$link.'</p>';
		
		} else {
		
			if ($ReadMore) {
				
				$excerpt = '<p>'.wp_trim_words(get_the_content(), $limit).$link.'</p>';
				
			}
			else {
				
				$excerpt = '<p>'.wp_trim_words(get_the_content(), $limit).'</p>';
				
			}
			
			$excerpt = str_replace('&hellip;','', $excerpt);
			
			//print_r($excerpt);
			
			return $excerpt;
		}
	}
	
	// Out of loop excerpts
	
	
	function excerptOutOfLoop( $postVar, $limit, $readMore = true, $moreText = 'Read more') {
	
		if(!empty($postVar->post_excerpt)){
													
			$readyExcerpt = $postVar->post_excerpt;
			
		} else {
			
			$noTags = strip_tags($postVar->post_content);
			$readyExcerpt = implode(' ', array_slice(explode(' ', $noTags), 0, $limit));
			
		}
		
		if( $readMore == true ) {
			
			$link = get_permalink($postVar->ID);
			$excerpt = $readyExcerpt.'&nbsp;<a href="'.$link.'">&hellip;'.$moreText.'</a>';
					
		} else {
			
			$excerpt = $readyExcerpt.'&hellip;';
			
		}
		
		return $excerpt;
	}
	
	
	//========================================================================
	//! Menus
	//========================================================================
	
	// Adds Class to First and Last Items in Menus 
	function nav_menu_first_last( $items ) { 
		$position = strrpos($items, 'class="menu-item', -1);
		$items = substr_replace($items, 'menu-item-last ', $position+7, 0);
		$position = strpos($items, 'class="menu-item');
		$items = substr_replace($items, 'menu-item-first ', $position+7, 0);
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'nav_menu_first_last' );
	
	
	//========================================================================
	//! Email
	//========================================================================

	// Make wp_mail() send using SMTP...
	// Uncomment if required. Definitely needed on a VPS server.

	/*
add_action('phpmailer_init','send_smtp_email');
	function send_smtp_email( $phpmailer )
	{
	    // Define that we are sending with SMTP
	    $phpmailer->isSMTP();
	 
	    // The hostname of the mail server
	    $phpmailer->Host = "relay.clara.net";
	 
	    // Use SMTP authentication (true|false)
	    $phpmailer->SMTPAuth = true;
	 
	    // SMTP port number - likely to be 25, 465 or 587
	    $phpmailer->Port = "465";
	 
	    // Username to use for SMTP authentication
	    $phpmailer->Username = "info@padcreative.co.uk";
	 
	    // Password to use for SMTP authentication
	    $phpmailer->Password = "welc0me";
	 
	    // The encryption system to use - ssl (deprecated) or tls
	    $phpmailer->SMTPSecure = "ssl";
	 
	}
*/
	
?>