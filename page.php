<?php
/*
Template Name: Page Template
*/
?>
<?php get_header(); ?>



<!-- page.php -->



<div class="page id<?php echo $post->ID; ?>">
	
	
	<div class="section padding-top padding-bottom">
		<div class="container">
			
			<div class="row">
			
				<div class="col col-sm-6 col-md-8">
					
					<?php get_template_part( 'templates/component', 'loop-default' ); ?>
					
				</div>
				
				<div class="col col-sm-6 col-md-4">
					
					<?php get_sidebar('quote-form'); ?>
					
				</div>
			</div>
		</div>
	</div>
	
</div>

	<?php get_footer(); ?>