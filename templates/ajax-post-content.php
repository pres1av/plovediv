    			<div class="col-xs-12 col-sm-6 col-md-4">
    
    				<div class="main-loop-content">
    					
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
    			
    				
    				
    				</div>
    
    			
    
    			</div>
