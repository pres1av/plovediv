<?php
	
	
	
	
	
	// Get Query Variable
	function add_query_vars_filter( $vars ){
		$vars[] = "pg";
		return $vars;
	}
	add_filter( 'query_vars', 'add_query_vars_filter' );
	
	//========================================================================
	//! Register and Enqueue Stuff - Comment the scripts which aren't needed!!!
	//========================================================================
	
	function pad_scripts() {
		
		//Register
			
			//Slick Plugin for carousels
		    $deps = array();
			wp_register_style( 'slick-styles',get_template_directory_uri().'/scripts/slick-1.6.0/slick/slick.css', $deps, null );
		    $deps = array('jquery');
		    wp_register_script( 'slick-js', get_template_directory_uri().'/scripts/slick-1.6.0/slick/slick.min.js', $deps, null, true );
		
		    //Magnific Plugin for lightbox
		    $deps = array();
			wp_register_style( 'magnific-styles',get_template_directory_uri().'/scripts/magnific-popup/dist/magnific-popup.css', $deps, null );
		    $deps = array('jquery');
		    wp_register_script( 'magnific-js', get_template_directory_uri().'/scripts/magnific-popup/dist/jquery.magnific-popup.js', $deps, null, true );
		    
		    //Original Lightbox Plugin 
		    /*$deps = array('jquery');
		    wp_register_script( 'lightbox-js', get_template_directory_uri().'/scripts/lightbox/jquery.lightbox.min.js', $deps, null, true );*/
		    
		    //Easing Plugin 
		    $deps = array('jquery');
		    wp_register_script( 'easing-js', get_template_directory_uri().'/scripts/jquery.easing.1.3.js', $deps, null, true );
		    
		    //Parallax Plugin 
		    $deps = array('jquery');
		    wp_register_script( 'parallax-js', get_template_directory_uri().'/scripts/parallax.min.js', $deps, null, true );
		    
		    //Cycle Plugin 
		    $deps = array('jquery');
		    wp_register_script( 'cycle2-js', get_template_directory_uri().'/scripts/jquery.cycle2.min.js', $deps, null, true );

            //Pad Modules
			$deps = array(
				'jquery',
				'magnific-js',
				'slick-js'
			);
		    wp_register_script( 'pad-modules-js', get_template_directory_uri().'/scripts/pad-modules.js', $deps, '1.0', true );
		    
		    //Ajax
			$deps = array(
				'jquery'
			);
		    wp_register_script( 'ajax-load-more',  get_template_directory_uri().'/scripts/ajax-load-more.js', $deps, '1.0', true );
            

			//Main Stylesheet and JS
			$deps = array();
			wp_register_style( 'pad-theme', get_stylesheet_uri(), $deps, '1.0' );
			$deps = array(
				'jquery',
				'magnific-js',
				'slick-js'
			);
		    wp_register_script( 'pad', get_template_directory_uri().'/scripts/pad-javascript.js', $deps, null, true );
		    
		//Enqueue
		
		    //jQuery
		    wp_enqueue_script( 'jquery' );
		    
		    //Slick Plugin for carousels
		    wp_enqueue_style( 'slick-styles');
		    wp_enqueue_script('slick-js');
		    
		    //Magnific Plugin for lightbox
		    wp_enqueue_style( 'magnific-styles');
		    wp_enqueue_script('magnific-js');
		    
		    //Original Lightbox Plugin
		    //wp_enqueue_script('lightbox-js');
		    
		    //Easing Plugin 
		    wp_enqueue_script( 'easing-js');
		    
		    //Parallax Plugin 
		    wp_enqueue_script( 'parallax-js');
		    
		    //Cycle Plugin
		    wp_enqueue_script( 'cycle2-js');
		    
            //Pad Modules
            wp_enqueue_script( 'pad-modules-js' );
            
			//Main Stylesheet and JS
		    wp_enqueue_script( 'ajax-load-more');
		    wp_enqueue_style( 'pad-theme' );
		    wp_enqueue_script('pad-js');
            
            global $wp_query;           
            wp_localize_script( 'ajax-load-more', 'ajaxloadmore', array(
            	'ajaxurl' => admin_url( 'admin-ajax.php' )
            ));
            
        // Adding the site URL and template URL as a JS object. Usage in pad-javascript: wpURLs.site or wpURLs.template
        wp_localize_script('pad', 'wpURLs', [ 'site' => home_url(), 'template' => get_bloginfo('template_directory') ]);	
	    
	}
	
	add_action( 'wp_enqueue_scripts', 'pad_scripts' );

	//========================================================================
	//! AJAX stuff
	//========================================================================
    
    //non logged in users
    add_action( 'wp_ajax_nopriv_ajax_load_more', 'ajax_load_more_posts' );
    //logged in users
    add_action( 'wp_ajax_ajax_load_more', 'ajax_load_more_posts' );
    
    
    
    function ajax_load_more_posts() {
        
        //prepare the query getting the page number which is posted to admin-ajax.php in ajax-load-more.js
        
        $query_vars['paged'] = $_POST['page'];
        $query_vars['post_type'] = 'post';
        $query_vars['posts_per_page'] = 6;
        
        //print_r($query_vars);

        $posts = new WP_Query( $query_vars );
        $GLOBALS['wp_query'] = $posts;
        
        $counter = 1;
        
        if( ! $posts->have_posts() ) { //if no more posts
            /*echo '<h2>'._e('No More Posts Found. Sorry.').'</h2>';*/
            echo '<script type="text/javascript">
            (function($) {
               //$("#load-more").addClass("display-none");
               $("#no-more-found").removeClass("display-none");               
            })(jQuery);
            </script>';
        } else {
            while ( $posts->have_posts() ) { //loop posts
                $posts->the_post();
                get_template_part( 'templates/ajax', 'post-content' );
                
				if($counter == 3):
				    echo '<div class="clearfix visible-md visible-lg"></div>';
				endif;
				
				
                
                $counter++;
            }
            
            
        }
    
    
        die();
        
        
    }

	//========================================================================
	//! Images
	//========================================================================
	
	// Params: Size Label, Width, Height, Crop? (optional)
	add_image_size( 'one-col', 300, 600 );
	add_image_size( 'two-col', 600, 960 );
	add_image_size( 'slides', 1600, 400, true );
	add_image_size( 'slides-full', 1920, 4000 );
	add_image_size( 'sliding-logos', 216, 65 );
	/*add_image_size( 'logo-parade', 160, 120 );
	add_image_size( 'article-thumb', 200, 300 );
	add_image_size( 'tiny-thumb', 80, 80, true );
	add_image_size( 'testimonials', 120, 120, true );*/
	
	
	//========================================================================
	//! Transients
	//========================================================================
	
	// Flush Transient data when posts/pages are updated/published
	function clear_transients() {
	
		if ( get_current_post_type() == 'post' ) { 
		
			//delete_transient('query_name_here');
		}
		elseif( get_current_post_type() == 'page') {
			
			//delete_transient('query_name_here');
		}
		elseif( get_current_post_type() == 'testimonials') {
			
			delete_transient('query_home_random_testimonials');
		}
		elseif( get_current_post_type() == 'pad_portfolio') {
			
			delete_transient('query_portfolio_items');
			delete_transient('query_portfolio_items_by_type');
			delete_transient('query_portfolio_items_by_sector');
		}
	}
	add_action('save_post','clear_transients');
	
	
	//========================================================================
	//! Admin Area
	//========================================================================
	
	// Add Custom Stylesheets to WYSIWYG Editor 
	function my_mce_buttons_2( $buttons ) {
	    array_unshift( $buttons, 'styleselect' );
	    return $buttons;
	}
	add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
	
	function my_mce_before_init( $settings ) {
	
	    $style_formats = array(
	    	
	        array(
	        	'title' => 'Intro Paragraph',
	        	'block' => 'p',
	        	'classes' => 'intro'
	        )
			/*
	        array(
	    		'title' => 'Quote',
	    		'selector' => 'p',
	    		'classes' => 'quote'
	    	),
			array(
	        	'title' => 'Bigger, Bolder and Red',
	        	'inline' => 'span',
	        	'classes' => 'bold-red'
	        )
	        */
	    );
	
	    $settings['style_formats'] = json_encode( $style_formats );
	   
	    return $settings;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );
	
	add_editor_style('editor_style.css');
	

	//========================================================================
	//! Theme Options
	//========================================================================
	
	// Add Theme Support for the following features
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support( 'title-tag' );

	// Enable Editors to edit Menus
	$role_object = get_role( 'editor' );
	$role_object->add_cap( 'edit_theme_options' );

    
	//========================================================================
	//! Includes
	//========================================================================
	
	require_once('functions/inc_fn_cpts.php');
	require_once('functions/inc_pad_generic_functions.php');

	//========================================================================
	//! Admin / User Logged In
	//========================================================================
	
	
	// Use this function to run tests on the website only visible to logged in admin (ie. Pete!). Use in true/false if statement.
	function only_show_if_admin_loggedin() {
		global $user_ID; 
				
		if( $user_ID ) { 
			if( current_user_can('level_10') ) { 
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			return FALSE;
		}
	}
	
	function only_show_if_anyone_loggedin() {
		global $user_ID; 
				
		if( $user_ID ) { 
			if( current_user_can('read') ) { 
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			return FALSE;
		}
	}
	
		
	/*Then wherever you are putting in code that you only want to show for logged-in admin users, just wrap it in this if statement...
		
	<?php if (only_show_if_admin_loggedin() == true) : ?> 
	
	<!-- Code Here -->
	
	<?php endif; ?> */
	
	
	//========================================================================
	//! Custom Password Form
	//========================================================================
	
	/*function my_password_form() {
	    global $post;
	    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	    $o = '<form id="login-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
	    <p>' . __( "Please enter the password that you have been provided with:" ) . '</p>
		<h3>' . __( "Password:" ) . ' </h3><input class="case-input-field" name="post_password" id="' . $label . '" type="password" /><input class="case-input" type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
	    </form>';
	    return $o;
	}
	add_filter( 'the_password_form', 'my_password_form' );*/
	
	//========================================================================
	//! Gravity Form Confirmation
	//========================================================================
	
	add_filter( 'gform_confirmation_anchor', '__return_true' );
	
	//========================================================================
	//! Custom ACF Options Pages
	//========================================================================
	
	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page('General Website Content');
	
	}	
	
	
	//========================================================================
	//! Change Posts name
	//========================================================================
	
	
	function change_post_menu_text() {
		global $menu;
		global $submenu;
		
		// Change menu item
		$menu[5][0] = 'Blog';
		
		// Change post submenu
		$submenu['edit.php'][5][0] = 'Blog';
		$submenu['edit.php'][10][0] = 'Add Post';
	}
	
	add_action( 'admin_menu', 'change_post_menu_text' );		
	
	
	//========================================================================
	//! Sanitize function
	//========================================================================
	
	
	// Clean up user input – used by sanitize()
	function cleanInput($input) {
	
		$search = array(
			'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
			'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
			'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);

		$output = preg_replace($search, '', $input);
		return $output;
	}

	// Sanitize user input
	function sanitize($input) {
		if (is_array($input)) {
			foreach($input as $var=>$val) {
				$output[$var] = sanitize($val);
			}
		}
		else {
			if (get_magic_quotes_gpc()) {
				$input = stripslashes($input);
			}
			$output  = cleanInput($input);
		}
		return $output;
							
	}	
	
	
	//========================================================================
	//! Site specific functions
	//========================================================================
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>