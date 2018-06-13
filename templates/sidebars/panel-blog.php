<div class="panel panel-blog-archive">	

	<h2>Archive</h2> 
	<?php 
	
		$months = array(
			'type'            => 'monthly',
			'limit'           => '5',
		);
		
		$years = array(
			'type'            => 'yearly',
			'format'          => 'html', 
			'before'          => '',
			'after'           => '',
			'show_post_count' => false,
			'echo'            => 1,
			'order'           => 'DESC'
		); 
	
	?>
	
	<h3>By Month:</h3>
	<ul><?php wp_get_archives($months); ?></ul>
	
	<h3>By Year:</h3>										
	<ul><?php wp_get_archives($years); ?></ul>		

</div>

<div class="panel panel-blog-categories">

	<h2>Categories</h2>
	<?php 

		$cat = array(
			'show_option_all'    => '',
			'orderby'            => 'name',
			'order'              => 'ASC',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 1,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude'            => '',
			'exclude_tree'       => '',
			'include'            => '',
			'hierarchical'       => 1,
			'title_li'           => '',
			'show_option_none'   => __( 'No categories' ),
			'number'             => null,
			'echo'               => 1,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,
			'taxonomy'           => 'category',
			'walker'             => null
		);
		
	?>
	
	<ul><?php wp_list_categories( $cat ); ?> </ul>
	
</div>

