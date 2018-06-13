<?php	
	
	//========================================================================
	//! Gravity Forms
	//========================================================================
	
	add_action('gform_after_submission', 'landing_page_google_analytics', 10, 2);
	function landing_page_google_analytics($entry, $form) {
	
	    // If landing page form...
	    if ( $entry['id'] == 2 ) {
		    
		    $hidden_field = $entry['3']; // Add the value of this (which will be the page title or similar) to the Google Page Tracking variable so that we can use the same form on every landing page.
	    }
	    
	}
	
	add_filter("gform_field_value_pagename", "populate_pagename");
	function populate_pagename($value){
		global $post;
		return strtolower($post->post_title);
	}
	
	
	function gf_ga_tracking($entry, $form) { 
		
		if($form['id'] != 2) return; 
		
		$hidden_field = $entry['3'];
		
		?>
	
		<script type="text/javascript">
			ga('send', {
			  'hitType': 'pageview',
			  'page': '/form-<?php echo $hidden_field; ?>',
			  'title': 'Form <?php echo $hidden_field; ?>'
			});
		</script>
	
		<div class="ga-confirmation"><?php echo $form["confirmation"]["message"]; ?> Nice! Your <strong>successful</strong> <?php echo $hidden_field; ?> form submission was recorded by Google Analytics.</div><?php 
	}
	add_action("gform_post_submission", "gf_ga_tracking", 10, 2);
	
	// Filter the Gravity Forms button type - to add a div for an image to it
	add_filter("gform_submit_button", "form_submit_button", 10, 2);
	function form_submit_button($button, $form){
	    return "<div class='button'>".$button."<div class='button-image'></div></div>";
	}

	// Filter Gravity Forms pre-render to add an image to the title tag
	add_filter( 'gform_pre_render', 'changing_form_description' );
	function changing_form_description( $form ) {
		
		global $post;
		
		//print_r($form);
		
		if ($form['id'] == 2) {
			
			$form_title = get_field('form_title',$post->ID);
			$form_image = get_field('form_image',$post->ID);
			$form_desc = get_field('form_description',$post->ID);
			$form_btn = get_field('form_button',$post->ID);
			
			if ( $form_image ) {
				
				$form['title'] = $form_title.'<div id="form-image" class="form-image hidden"><img src="'.$form_image['url'].'" /></div>';
				$form['title'] .= "\n<script>\n";
				$form['title'] .= '$j(document).ready(function() {'."\n";
				$form['title'] .= '$j("#form-image").prependTo("#gform_2")'."\n";
				$form['title'] .= '$j("#form-image").removeClass("hidden")'."\n";
				$form['title'] .= '});';
				$form['title'] .= "\n</script>\n";
			} 
			else {
				
				$form['title'] = $form_title;
			}
			
			$form['description'] = $form_desc;
			
			if ($form_btn) {
			
				$form["button"]["text"] = $form_btn;
			}	
		}
		else {
			
			$form['title'] = $form['title']."<div class='form-image'></div>";	
		}
		
	    return $form;
	}
	
	// Don't validate default values
	/**
	 * Enqueue scripts and styles
	 *
	 * @return void
	 */
	function myawesometheme_scripts_styles() {
	
		// Load our custom Gravity Forms validation so the form isn't submitted with default values
		wp_register_script( 'gravityformsclearit', trailingslashit( get_template_directory_uri() ) . 'scripts/gravity-forms-clearit.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_script( 'gravityformsclearit' );
	
	}
	add_action( 'wp_enqueue_scripts', 'myawesometheme_scripts_styles' );
	
	/**
	 * Custom Gravity Forms validation. Make sure the form isn't submitted with the default values
	 * Useful for when your Gravity Form is displaying default values instead of the field labels.
	 *
	 * Tie our validation function to the 'gform_validation' hook. Since we've appended _1 to the filter name (gform_validation_1)
	 * it will only trigger on form ID 1. Change this number if you want it to trigger on some other form ID.
	 * There's no sense in running this function on every form submission, now is there!
	 *
	 * @return validation results
	 */
	function myawesometheme_validate_gravity_default_values( $validation_result ) {
	
		// Get the form object from the validation result
		$form = $validation_result["form"];
	
		// Get the current page being validated
		$current_page = rgpost( 'gform_source_page_number_' . $form['id'] ) ? rgpost( 'gform_source_page_number_' . $form['id'] ) : 1;
	
		// Loop through the form fields
		foreach( $form['fields'] as &$field ){
	
			$value_number = rgpost( "input_{$field['id']}" );
	
			// If there's a default value for the field, make sure the submitted value isn't the default value
			if ( !empty( $field['defaultValue'] ) && $field['defaultValue'] === $value_number ) {
			  $is_valid = false;
			}
			else {
			  $is_valid = true;
			}
	
			// If the field is valid we don't need to do anything, skip it
			if( !$is_valid ) {
				// The field failed validation, so first we'll need to fail the validation for the entire form
				$validation_result['is_valid'] = false;
	
				// Next we'll mark the specific field that failed and add a custom validation message
				$field['failed_validation'] = true;
				$field['validation_message'] = "You can't submit the default value.";
			}
		}
	
		// Assign our modified $form object back to the validation result
		$validation_result['form'] = $form;
	
		// Return the validation result
		return $validation_result;
	}
	add_filter( 'gform_validation_1', 'myawesometheme_validate_gravity_default_values' );
	
?>