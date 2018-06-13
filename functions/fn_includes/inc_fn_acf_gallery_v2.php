<?php

	/*
		$gallery = get_field('gallery');
	
	
		$options = array(
			
			'number_columns' 	=> 	3, 					// Default '5'
			'on_page_gallery' 	=>	true, 				// Default 'false'
			'gallery_id'		=>  'gallery',			// Default 'gallery'
			'wp_thumbnail'		=>	'thumbnail', 		// ie. WP image size name for thumbnails. Default 'thumbnail'
			'wp_large'			=>	'medium', 			// ie. WP image size name for on-page large images. Default 'large'
			'wp_lightbox'		=>	'large'				// ie. WP image size name for lightbox pop-up large images. Default 'large'
			
		);
		
		
		echo the_acf_gallery($gallery,$options);
	*/

	//
	// Output ACF Gallery function. v1.0 (depends on the check_vars() function)
	//
	function the_acf_gallery($acf_gallery = array(),$options = array()) {
		
		//==================================
		//! 2. Get the Options	
		//==================================
		
		// Init the options to defaults if not set
		if (!isset( $options['number_columns'] )) 	{ $options['number_columns'] = 5; }
	    if (!isset(	$options['on_page_gallery'] )) 	{ $options['on_page_gallery'] = false; }
	    if (!isset(	$options['gallery_id'] )) 		{ $options['gallery_id'] = 'gallery'; }
	    if (!isset(	$options['wp_thumbnail'] )) 	{ $options['wp_thumbnail'] = 'thumbnail'; }
	    if (!isset(	$options['wp_large'] )) 		{ $options['wp_large'] = 'large'; }
	    if (!isset(	$options['wp_lightbox'] )) 		{ $options['wp_lightbox'] = 'large'; }
		
		// Set the Options strings
		$cols				=	$options['number_columns'];
		$onpg				=	$options['on_page_gallery'];
		$gID				=	$options['gallery_id'];
		$img_thumb_size		=	$options['wp_thumbnail'];
		$img_large_size		=	$options['wp_large'];
		$img_lbox_size		=	$options['wp_lightbox'];
		
		//==================================
		//! 3. Set up variables etc	
		//==================================
		
		// Init variables
		$errors = '';
				
		// Check the ACF Gallery object is populated
		if ($acf_gallery) { 
			
			// Init variables
			$img_count 		= 	count($acf_gallery);
			$img_counter 	= 	1;
			
			// Get all the Native and Registered WP image sizes
			global $_wp_additional_image_sizes;
			$image_size_names = array('large', 'medium', 'thumbnail', 'full');
			foreach ( $_wp_additional_image_sizes as $image_size_name => $image_info ) {
				array_push($image_size_names,$image_size_name);
			}
			
			// Validate the variables
			// number_columns
			if ( !is_numeric($cols) ) {
				$errors .= "Error: 'number_columns' must be a number. Currently '".$cols."' <br />";
			}

			// on_page_gallery
			if ( !is_bool($onpg) ) {
				$errors .= "Error: 'on_page_gallery' must be a boolean. Currently '".$onpg."' <br />";
			}
			
			// wp_thumbnail
			if ( !in_array($img_thumb_size,$image_size_names) ) {
				$errors .= "Error: 'wp_thumbnail' must be set to a Registered Wordpress Image Size. Currently set to '".$img_thumb_size."'<br />";
			}
			
			// wp_large
			if ( !in_array($img_large_size,$image_size_names) ) {
				$errors .= "Error: 'wp_large' must be set to a Registered Wordpress Image Size. Currently set to '".$img_large_size."'<br />";
			}
			
			// wp_lightbox
			if ( !in_array($img_lbox_size,$image_size_names) ) {
				$errors .= "Error: 'wp_lightbox' must be set to a Registered Wordpress Image Size. Currently set to '".$img_lbox_size."'<br />";
			}
		
		}
			
		else {
			
			$errors .= "Error: No data in ACF Fields.<br />"; 
		}
		
		// If Errors, then output them and stop, otherwise output the gallery
		if ( $errors ) {
		
			echo '<div class="message message-error">';
			echo '	<h2>There are errors:</h2>';
			echo '	<p>'.$errors.'</p>';
			echo '</div>';
		}
		else {
			
			// Output initial HTML elements
			if ( $onpg === true ) {
				$output .= '<div id="'.$gID.'" class="gallery gallery-on-page group">';
			} 
			else {
				$output .= '<div id="'.$gID.'" class="gallery group">';
			}
			
			foreach ( $acf_gallery as $key => $acf_image ) {
				
				// Set the strings as the URL of the different image sizes and image alt/title
				$img_thumb_url	= $acf_image['sizes'][$img_thumb_size];
				$img_large_url	= $acf_image['sizes'][$img_large_size];
				$img_lbox_url	= $acf_image['sizes'][$img_lbox_size];
				$img_title 		= $acf_image['title'];
				$img_alt 		= $acf_image['alt'];
	
				// If no 'alt' tag text, set 'alt' the same as 'title'
				if ( !trim($img_alt) ) { $img_alt = $img_title; }
				
				// Initialise variables
				$a_class = '';			
				$li_class = '';
				
				
				/* 
				 *	Perform checks
				 */
				
				// If this is the last image?
				if ( $img_count == $img_counter ) { $li_class .= 'last '; }
				
				// If this the end of a row?
				if ( $img_counter %$cols == 0 ) { $li_class .= 'end-of-row '; }
				
				// If this is a lightbox gallery?
				if ( $onpg === false ) { $a_class .= 'lightbox '; }
	
				
				/* 
				 *	Output images
				 */
				
				// Output large image if on-page gallery option is set to true
				// If not, echo the opening <ul> if it's the first run through loop
				if ( ( $img_counter == 1 ) && ( $onpg === true ) ) {
					
					$output .= '<div class="main-image">';
					$output .= '<a class="lightbox" href="'.$img_lbox_url.'" title="'.$img_title.'"><img src="'.$img_large_url.'" alt="'.$img_alt.'" /></a>';
					$output .= '</div>';
					$output .= '<ul class="group">';
					
				} 
				elseif ( $img_counter == 1 ) {
					
					$output .= '<ul class="group">';
				}
				
				// Output thumbnails
				
				if ( $onpg === true ) { 
					$output .= '<li class="'.$li_class.'thumbnail"><a class="'.$a_class.'" href="'.$img_large_url.'" data-href="'.$img_lbox_url.'" title="'.$img_title.'"><img src="'.$img_thumb_url.'" alt="'.$img_alt.'" /></a></li>';
				} 
				else {
					$output .= '<li class="'.$li_class.'thumbnail"><a class="'.$a_class.'" href="'.$img_lbox_url.'" title="'.$img_title.'"><img src="'.$img_thumb_url.'" alt="'.$img_alt.'" /></a></li>';
				}
				
				$img_counter++;
			}
		
			$output .= '</ul>';
			$output .= '</div>';
		
			if ( $onpg === true ) {
				$output .=  
				'<script>
					$j(document).ready(function(){
						$j("#gallery ul li a").click(function(event){
						
							event.preventDefault();
							
							var imgUrl = $j(this).attr("href");
							var imgAlt = $j(this).attr("title");
							var imgLargeUrl = $j(this).data("href");
						
							$j("#gallery .main-image a").attr("href",imgLargeUrl);	
							$j("#gallery .main-image a img").attr("src",imgUrl);
							$j("#gallery .main-image a img").attr("alt",imgAlt);
						});
					});
				</script>';	
			}
			
			return $output;
		}
					
	}
	//
	// ENDS: Output ACF Gallery function.
	//
?>