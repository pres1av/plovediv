<?php
/*
Template Name: Posts Archive Template
*/
?>
<?php get_header(); ?>



<!-- archive.php -->



<main class="main">

	<?php /*<div class="section padding-top padding-bottom">
		<div class="container">
					
			<div class="row">
			
				<div class="col-sm-6 col-md-8">
				
					<?php $post = $posts[0]; ?>
					<?php if (is_month()) : // If this is a monthly archive ?>
					<h1 class="pagetitle">Stories from <?php the_time('F, Y'); ?></h1>
					<?php elseif (is_year()) : // If this is a yearly archive ?>
					<h1 class="pagetitle">Stories from <?php the_time('Y'); ?></h2>
					<?php elseif (is_category()) : // If this is a category archive ?>
					<h1 class="pagetitle"><?php single_cat_title(); ?></h2>
					<?php else : ?>
					<h1 class="pagetitle">Archive</h2>
					<?php endif; ?>
					
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
				
				
					<?php $post = $posts[0]; ?>
					<?php if (is_month()) : // If this is a monthly archive ?>
					<h1 class="pagetitle">Stories from <?php the_time('F, Y'); ?></h1>
					<?php elseif (is_year()) : // If this is a yearly archive ?>
					<h1 class="pagetitle">Stories from <?php the_time('Y'); ?></h2>
					<?php elseif (is_category()) : // If this is a category archive ?>
					<h1 class="pagetitle"><?php single_cat_title(); ?></h2>
					<?php else : ?>
					<h1 class="pagetitle">Archive</h2>
					<?php endif; ?>
				
				
				</div>
			</div>
					
			<?php get_template_part( 'templates/component', 'loop-archives-new' ); ?>
			
	
		</div>
		
	</section>
					
	
	
</main>

<?php get_footer(); ?>