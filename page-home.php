<?php
/*
Template Name: Home Page Template
*/
?>
<?php get_header(); ?>



<!-- page-home.php -->



<main class="page home">
    
	<?php
    	
    	//Pad Slideshow Modules
    	
	?>
    
    <?php //get_template_part( 'modules/module', 'slideshow-banner' ); ?>
    <?php get_template_part( 'modules/module', 'slideshow-banner-full-screen' ); ?>
	
	<section class="main-content padding-top padding-bottom">
		<div class="container">
			
			<div class="row">
			
				<div class="col-sm-6 col-md-8">
					
					<div class="main-content__loop">
						
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<?php //edit_post_link('Edit', '<p>', '</p>'); ?>
						<?php endwhile; ?>
						<?php else : ?>
							<h2><?php _e('No Posts Found. Sorry.'); ?></h2>
						<?php endif; ?>
						
					</div>
						
					
				</div>
				
				<div class="col-sm-6 col-md-4">
					
					<?php get_sidebar('quote-form'); ?>
					
				</div>
			</div>
		</div>
	</div>
	
	<?php
    	
    	//Pad Full Width Form Module
    	
	?>
	
	<?php get_template_part( 'modules/module', 'form-section' ); ?>
	
	<?php get_sidebar('scrolling-logos'); ?>
	
	<?php get_template_part( 'modules/module', 'tabs-section' ); ?>

</main>

	<?php get_footer(); ?>