<div class="main-content__loop">
	
	<?php if ((get_previous_posts_link('&laquo; Previous', $wp_query->max_num_pages)) || (get_next_posts_link( '&raquo; Next', $wp_query->max_num_pages ))) : // Conditional to show/hide Next/Prev links <div> ?>
	
		<div class="navigation navigation-top group">
			
			<?php if (get_previous_posts_link('&laquo; Previous', $wp_query->max_num_pages)): ?>
			<div class="nav-btn nav-btn-prev"><?php previous_posts_link('Previous', $wp_query->max_num_pages) ?></div>
			<?php endif; ?>
			<?php if (get_next_posts_link( '&raquo; Next', $wp_query->max_num_pages )): ?>
			<div class="nav-btn nav-btn-next"><?php next_posts_link( 'Next', $wp_query->max_num_pages ); ?></div>
			<?php endif; ?>
			
		</div>
		
	<?php endif; ?>

	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	
		<div class="post-container">

			<?php
				/*						
				// Example usage
				$options = array(
					'wp_img_size'		=>	'one-col', 			// Registered WP image size. Default: 'large'.
					'link'				=>	'permalink', 		// Registered WP image size or 'permalink'. Default: 'permalink'.
					'container'			=>	true,				// Add container div. Default: true.
					'align'				=>	'right',			// Options: 'left', 'right', 'center' or 'none'. Default: 'left'.
				);
			
				echo get_featured_image($post->ID, $options);
				*/
			?>
			
			<?php if (has_post_thumbnail()) :  ?>
			
				<div class="image-box">
					
					<img src="<?php echo get_the_post_thumbnail_url(null, 'one-col'); ?>" alt="<?php the_title(); ?>" >
					
				</div>
			
			<?php endif; ?>
			
			<h2><a href="<?php the_permalink() ?>" title="Read full story"><?php the_title(); ?></a></h2>
			
			<?php echo excerpt(50); ?>
			
		</div>

	<?php endwhile; ?>
	<?php else : ?>
		<h2><?php _e('No Posts Found. Sorry.'); ?></h2>
	<?php endif; ?>


	<?php if ((get_previous_posts_link('&laquo; Previous', $wp_query->max_num_pages)) || (get_next_posts_link( '&raquo; Next', $wp_query->max_num_pages ))) : // Conditional to show/hide Next/Prev links <div> ?>
	
		<div class="navigation navigation-bottom group">
			
			<?php if (get_previous_posts_link('&laquo; Previous', $wp_query->max_num_pages)): ?>
			<div class="nav-btn nav-btn-prev"><?php previous_posts_link('Previous', $wp_query->max_num_pages) ?></div>
			<?php endif; ?>
			<?php if (get_next_posts_link( '&raquo; Next', $wp_query->max_num_pages )): ?>
			<div class="nav-btn nav-btn-next"><?php next_posts_link( 'Next', $wp_query->max_num_pages ); ?></div>
			<?php endif; ?>
			
		</div>
	
	<?php endif; ?>

</div>

