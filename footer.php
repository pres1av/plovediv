	<div class="section footer">
		<div class="container padding-bottom">
			
			<div class="row">
				
				<div class="col-md-3">
					
					<?php wp_nav_menu( array('menu' => 'Top Menu' )); ?>
					
				</div>
				<div class="col-md-3">
					
					&nbsp;
					
				</div>
				<div class="col-md-3">
					
					<p><strong>This site uses cookies.</strong> You can read how we use them in our <a href="<?php echo get_permalink('76'); ?>">Privacy Policy</a></p>
						
				</div>
				<div class="col-md-3">
					
					<p><?php the_field('address','options'); ?></p>
					<p><?php the_field('phone_number','options'); ?></p>
					<p><a href="mailto:<?php the_field('email_address','options'); ?>"><?php the_field('email_address','options'); ?></a></p>
					
				</div>
					
			</div>
							
		</div>
		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12">
					
					<div class="copyright">
						
						<p>&copy; Copyright: the Company <?php echo date("Y"); ?>. <a href="http://www.padcreative.co.uk"><span>Website Design:</span> Pad Creative</a>.</p>
						
					</div>
					
				</div>
					
			</div>
							
		</div>
	</div>


</div>
		
<?php wp_footer(); ?>
		
<!--<p><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?>  seconds.</p>-->

</body>
</html>