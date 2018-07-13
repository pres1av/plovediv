<div class="main-content__loop">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>
	<?php else : ?>
		<h2><?php _e('No Posts Found. Sorry.'); ?></h2>
	<?php endif; ?>
</div>