<?php 
    
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => '3',
		'paged' => $paged
	);
	$news = new WP_Query( $args ); //print_r($blog );	
	    
?>


		<div class="row">
		
			<div class="col-xs-12">
				
				<?php if ((get_previous_posts_link('&laquo; Previous', $news->max_num_pages)) || (get_next_posts_link( '&raquo; Next', $news->max_num_pages ))) : // Conditional to show/hide Next/Prev links <div> ?>
				
					<div class="navigation navigation-top group">
						
						<?php if (get_previous_posts_link('&laquo; Previous', $news->max_num_pages)): ?>
						<div class="nav-btn nav-btn-prev"><?php previous_posts_link('Previous', $news->max_num_pages) ?></div>
						<?php endif; ?>
						<?php if (get_next_posts_link( '&raquo; Next', $news->max_num_pages )): ?>
						<div class="nav-btn nav-btn-next"><?php next_posts_link( 'Next', $news->max_num_pages ); ?></div>
						<?php endif; ?>
						
					</div>
					
				<?php endif; ?>
			
			</div>
			
		</div>

		<div class="row">
			
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
		
			<div class="col-xs-12">
				
				<?php if ((get_previous_posts_link('&laquo; Previous', $news->max_num_pages)) || (get_next_posts_link( '&raquo; Next', $news->max_num_pages ))) : // Conditional to show/hide Next/Prev links <div> ?>
				
					<div class="navigation navigation-top group">
						
						<?php if (get_previous_posts_link('&laquo; Previous', $news->max_num_pages)): ?>
						<div class="nav-btn nav-btn-prev"><?php previous_posts_link('Previous', $news->max_num_pages) ?></div>
						<?php endif; ?>
						<?php if (get_next_posts_link( '&raquo; Next', $news->max_num_pages )): ?>
						<div class="nav-btn nav-btn-next"><?php next_posts_link( 'Next', $news->max_num_pages ); ?></div>
						<?php endif; ?>
						
					</div>
					
				<?php endif; ?>
			
			</div>
			
		</div>

