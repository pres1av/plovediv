<?php
/*
Template Name: Posts Template
*/
?>
<?php get_header(); ?>



<!-- index.php -->



<main class="posts index id<?php echo $post->ID; ?>">

	<?php /*<div class="section padding-top padding-bottom">
		<div class="container">
					
			<div class="row">
			
				<div class="col-sm-6 col-md-8">
								
					<?php get_template_part( 'templates/component', 'loop-archives' ); ?>
					
				</div>
				
				<div class="col-sm-6 col-md-4">
				
					<?php get_template_part( 'templates/sidebars/panel', 'blog' ); ?>
					
				</div>
				
			</div>
		
		</div>
	</div> */ ?>
	<div id="news-new" class="main-content padding-top padding-bottom">
		<div class="container">
			
			<div class="row">
			
				<div class="col col-xs-12">
				
				
					<h1>News</h1>
				
				
				</div>
			</div>
					
			<?php get_template_part( 'templates/component', 'loop-archives-new' ); ?>
			
	
		</div>
		
	</div>
					
	
</main>

<?php get_footer(); ?>