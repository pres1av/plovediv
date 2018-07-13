<?php
/*
Template Name: Posts Single Template
*/
?>
<?php get_header(); ?>



<!-- single.php -->



<main class="posts single id<?php echo $post->ID; ?>">

	<div class="main-content padding-top padding-bottom">
		<div class="container">
					
			<div class="row">
				
				<div class="col col-sm-6 col-md-8">
				
					<h1 class="posts-section-title"><?php $my_title = get_the_title( get_option('page_for_posts', true) ); echo $my_title; ?></h1>
		
					<div class="main-content__loop">
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							
							<?php if ( get_field('long_title') ) : // Get Page Title ?>
								<h1><?php the_field('long_title'); ?></h1>
							<?php else : ?>
								<h1><?php the_title(); ?></h1>
							<?php endif; ?>
							
							<?php
								/*
								// Example usage
								$options = array(
									'wp_img_size'		=>	'two-col', 			// Registered WP image size. Default: 'large'.
									'link'				=>	'permalink', 		// Registered WP image size, 'permalink' or 'none'. Default: 'permalink'.
									'container'			=>	true,				// Add container div. Default: true.
									'align'				=>	'left',				// Options: 'left', 'right', 'center' or 'none'. Default: 'left'.
									'clearfix'			=>	false,				// Add 'group' class to container. Default: false.
									// Serve a smaller image size if wp_img_size isn't big enough. If activated, overrides 'container' to be true. Default: deactivated.
									'resize' 			=>	array(
																'column_width'		=>	630, 		// Column holding the image
																'fallback_img_size'	=>	'one-col' 	// Registered WP image size
															)
								);
							
								echo get_featured_image($post->ID, $options);
							*/
							?>
							
							<?php if (has_post_thumbnail()) :  ?>
							
								<div class="image-box">
									
									<img src="<?php echo get_the_post_thumbnail_url(null, 'two-col'); ?>" alt="<?php the_title(); ?>" >
									
								</div>
							
							<?php endif; ?>
							
							<?php the_content(); ?>
					
						<?php endwhile; ?>
						<?php else : ?>
							<h2><?php _e('No Posts Found. Sorry.'); ?></h2>
						<?php endif; ?>
					</div>
					
				</div>
				
				<div class="col col-sm-6 col-md-4">
	
					<?php get_template_part( 'templates/sidebars/panel', 'blog' ); ?>
	
				</div>
				
			</div>
		</div>
	</div>
	
</main>

<?php get_footer(); ?>