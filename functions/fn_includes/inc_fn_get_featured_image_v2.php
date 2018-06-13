<?php
	
	//==================================
	//! Get Featured Image
	//! Version: 2.0
	//! Author: Peter Jacobs, Pad Creative
	//! Date: April, 2014
	//==================================
					
	/*
	// Example usage
	$options = array(
		'wp_img_size'		=>	'large', 			// Registered WP image size. Default: 'large'.
		'link'				=>	'permalink', 		// Registered WP image size, 'permalink' or 'none'. Default: 'permalink'.
		'container'			=>	true,				// Add container div. Default: true.
		'align'				=>	'left',				// Options: 'left', 'right', 'center' or 'none'. Default: 'left'.
		'clearfix'			=>	false,				// Add 'group' class to container. Default: false.
		// Serve a smaller image size if wp_img_size isn't big enough. If activated, overrides 'container' to be true. Default: deactivated.
		'resize' 			=>	array(
									'column_width'		=>	640, 		// Column holding the image
									'fallback_img_size'	=>	'medium' 	// Registered WP image size
								)
	);

	echo get_featured_image($post->ID, $options);
	*/

	
	//==================================
	//! 1. Functions	
	//==================================

	// Get a defined image size's width as set in functions.php or Dashboard > Settings > Media 
	function get_defined_image_size( $img_size ) {
							
		if (($img_size == 'thumbnail' ) ||
			( $img_size == 'medium' ) ||
			( $img_size == 'large' )) {

			 $defined_width = get_option( $img_size.'_size_w' );
		}
		else {
			
			global $_wp_additional_image_sizes;
	
			if ( isset( $_wp_additional_image_sizes[$img_size] ) ) {
				$defined_width = $_wp_additional_image_sizes[$img_size]['width'];
			}
		
		}
	
		return $defined_width;
	}

	// Get an image's url, width or height. $return = 'url', 'width' or 'height'
	function get_image_data($img_id, $size, $return = 'url') {
		
		$img_data = wp_get_attachment_image_src( $img_id, $size );
		
		if ($return == 'url') {
			
			$value = $img_data[0];
		}
		
		if ($return == 'width') {
			
			$value = $img_data[1];
		}
		
		if ($return == 'height') {
			
			$value = $img_data[2];
		}
		
		return $value;
	}
	
	// Return an array of an image's meta data
	function wp_get_image_meta( $attachment_id ) {
	
		$attachment = get_post( $attachment_id );
		return array(
			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => get_permalink( $attachment->ID ),
			'src' => $attachment->guid,
			'title' => $attachment->post_title
		);
	}

	// Get the Post/Page's featured image
	function get_featured_image($pID, $options = array()) {
		
		//==================================
		//! 2. Get the Options	
		//==================================
		
		// Init the Options to defaults if not set
		if (!isset(	$options['wp_img_size'] )) 		{ $options['wp_img_size'] = 'large'; }
		if (!isset( $options['link'] )) 			{ $options['link'] = 'permalink'; }
		if (!isset( $options['container'] )) 		{ $options['container'] = true; }
		if (!isset( $options['align'] )) 			{ $options['align'] = 'left'; }
		if (!isset( $options['clearfix'] )) 		{ $options['clearfix'] = false; }
		if (!isset( $options['resize'] )) 			{ $options['resize'] = array(); }
		
		// Set the Options strings
		$img_size			=	$options['wp_img_size'];
		$link				=	$options['link'];
		$container			=	$options['container'];
		$align				=	$options['align'];
		$clearfix			=	$options['clearfix'];
		$resize				=	$options['resize'];

		// Is there an image attached to this post?
		if (get_the_post_thumbnail($pID)) {
		

			//==================================
			//! 3. Set up variables etc	
			//==================================
			
			// Init variables
			$errors = '';
			$resize_class = '';
			$clearfix_class = '';
						
			// Set other variables
			$attachment_id = get_post_thumbnail_id($pID);
			
			if ($resize) {
			
				$resize_col_width = $resize['column_width'];
				$resize_fallback_size = $resize['fallback_img_size'];
				$container = true;
				
			}
			
			// Get all the Native and Registered WP image sizes
			global $_wp_additional_image_sizes;
			$image_size_names = array('large', 'medium', 'thumbnail', 'full');
			foreach ( $_wp_additional_image_sizes as $image_size_name => $image_info ) {
				array_push($image_size_names,$image_size_name);
			}
			
			// Validate the variables
			// wp_img_size
			if ( !in_array($img_size,$image_size_names) ) {
				$errors .= "Error: 'wp_img_size' must be set to a Registered Wordpress Image Size or 'permalink'. Currently set to '".$img_size."'<br />";
			}
			
			// link
			if ( (!in_array($link,$image_size_names)) && ($link != 'permalink') && ($link != 'none') ) {
				$errors .= "Error: 'link' must be set to a Registered Wordpress Image Size or 'permalink'. Currently set to '".$link."'<br />";
			}
			
			// container
			if (is_bool($container) === false) {
				$errors .= "Error: 'container' must be true or false<br />";
			}
			
			// align
			$align_options = array('left','right','center','none');
			if (!in_array($align, $align_options)) {
				$errors .= "Error: 'align' must be set to 'left','right','center' or 'none'<br />";
			}
			
			// clearfix
			if (is_bool($clearfix) === false) {
				$errors .= "Error: 'clearfix' must be true or false<br />";
			}
			
			// allow_resize and its array's values
			if ($resize) {
				
				
				if (!$resize_col_width) {
					
					$errors .= "Error: 'resize' > 'column_width' must have a value if 'resize' is active <br />";
				}
				
				if (!$resize_fallback_size) {
					
					$errors .= "Error: 'resize' > 'resize_img_size' must have a value if 'resize' is active<br />";
				}
				
				if (!is_numeric($resize_col_width)) {
					
					$errors .= "Error: 'resize' > 'column_width' must be numeric<br />";
				}
				if (!in_array($resize_fallback_size,$image_size_names)) {
					
					$errors .= "Error: 'resize' > 'fallback_img_size' must be set to a Registered Wordpress Image Size<br />";
				}
				if ( $resize_col_width > get_defined_image_size( $img_size ) ) {
					
					$errors .= "Error: 'resize' > 'column_width' must not be wider than 'wp_img_size'<br />";
				}
			}
	
			
			//==================================
			//! 4. Get the values	
			//==================================
			
			// Get the main image's URL, Dims and Meta
			$image_url = get_image_data($attachment_id, $img_size, 'url');
			$image_width = get_image_data($attachment_id, $img_size, 'width');
			$image_meta = wp_get_image_meta($attachment_id);
			
			$image_alt = $image_meta['alt'];
			$image_title = $image_meta['title'];
			if ( trim($image_alt) == '' ) {
				$image_alt = $image_title;
			}
			
			// Set the image link 
			if ($link != 'permalink'){
				
				$image_link_url = get_image_data($attachment_id, $link, 'url');
				$image_link_url_width = get_image_data($attachment_id, $link, 'width');
				$link_class = ' lightbox';
			}
			else {
				
				$image_link_url = get_permalink($pID);
				$link_class = ' permalink';
			}
			
			if ($clearfix) {
				
				$clearfix_class = ' group';
			}
			
			if ($resize_fallback_size) {
				
				$fallback_url = get_image_data($attachment_id, $resize_fallback_size, 'url');
				$fallback_width = get_image_data( $attachment_id, $resize_fallback_size, 'width');
			}
						
			if ( ($resize) && (get_image_data($attachment_id, 'full', 'width') < $resize_col_width) ) {
			
				$image_url = $fallback_url;
				$image_width = $fallback_width;
				$resize_class = ' resized';
			}
			
			
			//==================================
			//! 5. Create the HTML	
			//==================================
			
			if ($container) {
				$output .= '<div class="featured-image'.$clearfix_class.$resize_class.' align'.$align.'">';
			}
			if ($link != 'none') {
				$output .= '	<a class="featured-image-link'.$link_class.'" title="'.$image_title.'" href="'.$image_link_url.'">';
			}
			$output .= '		<img class="align'.$align.$resize_class.'" src="'.$image_url.'" />';
			$output .= '	</a>';
			if ($container) {
				$output .= '</div>';
			}
			
		}
		else {
			
			if ($link != 'none') {
				$output .= '<div class="featured-image featured-image-placeholder'.$clearfix_class.$resize_class.' align'.$align.' '.$img_size.'"><a class="featured-image-link'.$link_class.'" title="'.$image_title.'" href="'.$image_link_url.'"></a></div>';
			}
			else {
				$output .= '<div class="featured-image featured-image-placeholder'.$clearfix_class.$resize_class.' align'.$align.' '.$img_size.'"></div>';
			}
		}
		
		//==================================
		//! 6. Check if error-free and output	
		//==================================
		if ( $errors ) {
			
			echo '<div class="message message-error">';
			echo '	<h2>There are errors:</h2>';
			echo '	<p>'.$errors.'</p>';
			echo '</div>';
		}
		else {
			
			return $output;
		}
		
	}
?>