<?php
/*
Template Name: News Page Template
*/
?>
<?php get_header(); ?>



<!-- page-news.php -->



<main class="main">

    <a id="target"></a>

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
	<section id="news-new" class="main-content padding-top padding-bottom">
		<div class="container">
			
			<div class="row">
			
				<div class="col-xs-12">
				
				
            		<?php if ( get_field('long_title') ) : // Get Page Title ?>
            			<h1><?php the_field('long_title'); ?></h1>
            		<?php else : ?>
            			<h1><?php the_title(); ?></h1>
            		<?php endif; ?>
				
				
				</div>
			</div>
					
			<?php get_template_part( 'templates/component', 'loop-archives-new-ajax-infinite' ); ?>
			
	
		</div>
		
	</section>
					
	
</main>

	<?php get_footer(); ?>