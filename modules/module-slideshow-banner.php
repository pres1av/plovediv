	<?php if($slideShow = get_field('slideshow')): ?>
	
		<div id="module-slideshow-banner" class="section">
			
			<img id="dummy" alt="dummy" src="<?php bloginfo('template_directory') ?>/images/dummy.gif">
			
			<?php foreach($slideShow as $slide) : ?>
			
				<div class="slide display-none" style="background-image: url(<?php echo $slide['slide']['sizes']['slides']; ?>)">
					
					<div class="container">
						
						<div class="cycle-overlay">
						
							<h3><?php echo $slide['heading']; ?></h3>
			
							<p><?php echo $slide['text']; ?></p>
							
							<a class="link" href="<?php echo $slide['page_link']; ?>">Read More</a>
		
						</div>
						
					</div>
					
				</div>
				
			<?php endforeach; ?>
			
		</div>

	<?php endif; ?>

