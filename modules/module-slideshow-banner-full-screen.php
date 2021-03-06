	<?php if($slideShow = get_field('slideshow')): ?>
	
		<section class="slideshow-banner slideshow-banner--full-screen">
			
			<img id="dummy" alt="dummy" src="<?php bloginfo('template_directory') ?>/images/dummy.gif">
			
			<?php foreach($slideShow as $slide) : ?>
			
				<div class="slideshow-banner__slide display-none" style="background-image: url(<?php echo $slide['slide']['sizes']['slides-full']; ?>)">
					
					<div class="container">
						
						<div class="cycle-overlay">
						
							<h3 class="cycle-overlay__heading"><?php echo $slide['heading']; ?></h3>
			
							<p class="cycle-overlay__text"><?php echo $slide['text']; ?></p>
							
							<a class="btn cycle-overlay__button" href="<?php echo $slide['page_link']; ?>">Read More</a>
		
						</div>
						
					</div>
					
				</div>
				
			<?php endforeach; ?>
			
		</section>
		
		<div id="module-slideshow-banner-full-screen-scroller">
    		<p>
        		<a href="#module-slideshow-banner-full-screen-scroll-down-anchor">SCROLL DOWN</a>
            </p>
        </div>
        
		<div>
    		<a id="module-slideshow-banner-full-screen-scroll-down-anchor"></a>
        </div>
		

	<?php endif; ?>

