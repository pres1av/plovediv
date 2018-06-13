<div class="main-loop-content">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		
		<?php if ( get_field('long_title') ) : // Get Page Title ?>
			<h1><?php the_field('long_title'); ?></h1>
		<?php else : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
		
		<?php the_content(); ?>

	<?php endwhile; ?>
	<?php else : ?>
		<h2><?php _e('No Posts Found. Sorry.'); ?></h2>
	<?php endif; ?>
</div>