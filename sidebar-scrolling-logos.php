<?php if($slidingLogos = get_field('scrolling_logos','options')): //print_r($slidingLogos); ?>

<div class="section padding-bottom">
	<div class="container">
	
		<?php /*<div class="row">
			
			<div class="col-xs-12">*/ ?>
				
				<?php if($logoHeading = get_field('scrolling_logos_heading', 'options')){ ?><h3><?php echo $logoHeading; ?></h3><?php } ?>
				
				<div id="scrolling-logos" class="display-none">
					
					<div id="scrolling-logos-inner">
					
					<?php foreach($slidingLogos as $slidingLogo) : ?>
					
						<div class="logos"><img src="<?php echo $slidingLogo['sizes']['sliding-logos'] ?>" alt="<?php echo $slidingLogo['title'] ?>"></div>
					
					<?php endforeach; ?>
					
					</div>
					
					
				</div>
				
			<?php /*</div>
			
		</div>*/ ?>
		
	</div>
</div>

<?php endif; ?>