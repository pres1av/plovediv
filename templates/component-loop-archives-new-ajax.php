<?php 
    
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => '3',
		'paged' => $paged
	);
	$news = new WP_Query( $args ); //print_r($blog );	
	    
?>


		<div id="inner-posts" class="row">
			
			<?php $counter = 1; ?>
			
			<?php if($news->have_posts()) : ?>
			<?php while($news->have_posts()) : $news->the_post(); ?>
					
		
                <?php include(locate_template('templates/ajax-post-content.php')); ?>
			
			
				<?php if($counter % 3 == 0): ?>
				<div class="clearfix visible-md visible-lg"></div>
				<?php endif; ?>
				
				<?php if($counter % 2 == 0): ?>
				<div class="clearfix visible-sm"></div>
				<?php endif; ?>
				
				<?php $counter++; ?>
			
			<?php endwhile; ?>
			<?php else : ?>
				<h2><?php _e('No Posts Found. Sorry.'); ?></h2>
			<?php endif; ?>
		
		</div>
		
		<div class="row">
    		
    		<div class="col col-xs-12">
        		
        		<p><a id="load-more">Load More</a></p>
        		
        		<input id="current-page" type="hidden" value="1">
        		
    		</div>
    		
		</div>
		
