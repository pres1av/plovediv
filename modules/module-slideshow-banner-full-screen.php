	<?php if($slideShow = get_field('slideshow')): ?>
	
		<div id="module-slideshow-banner-full-screen" class="section">
			
			<img id="dummy" alt="dummy" src="<?php bloginfo('template_directory') ?>/images/dummy.gif">
			
			<?php foreach($slideShow as $slide) : ?>
			
				<div class="slide display-none" style="background-image: url(<?php echo $slide['slide']['sizes']['slides-full']; ?>)">
					
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
		
		<div id="module-slideshow-banner-full-screen-scroller" class="section">
    		<p>
        		<a href="#module-slideshow-banner-full-screen-scroll-down-anchor">SCROLL DOWN</a>
            </p>
        </div>
        
		<div class="section">
    		<a id="module-slideshow-banner-full-screen-scroll-down-anchor"></a>
        </div>
		

	<?php endif; ?>

