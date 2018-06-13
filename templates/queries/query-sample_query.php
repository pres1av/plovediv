<?php 
	
	// To set up a cached transient query...
	// 1. Rename 'query_name' and '$query_name' appropriately. Recommend that both begin with 'query_'.
	// 2. Write your WP Query where commented below
	// 3. Add a get_template_part to include this file on your page and then you can work with the $query_name variable you created as normal.
	// 4. To rebuild the cache, just uncomment the delete_transient() line below. Make surte this is commented when testing is finished otherwise no caching is being used.
	
	
	// The variable holding the query
	global $query_name; 

	// Uncomment when testing to clear the cache
	//delete_transient( 'query_name' );

	// Does this data exist? If not, recreate it...
	if ( false === ( get_transient( 'query_name' ) ) ) {	
		
		////////////////////////////////////////////////////////////////
		//
		// WP Query goes here and is put into the query variable (ie. $query_name)
		//
		////////////////////////////////////////////////////////////////
		
		// Set the query into the Transient (24 hour expiry)
		set_transient( 'query_name', $query_name, 60 * 60 * 24 );

	}	

	// Get the Transient as usual...
	$query_name = get_transient( 'query_name' );
	
?>