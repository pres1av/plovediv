	<div id="module-static-header-overlay" class="section header">
		
		<div class="container">
			
    		<div id="contact">
    			<p class="tel"><?php the_field('phone_number','options'); ?></p>
    			<p class="email"><?php the_field('email_address','options'); ?></p>
    		</div>
    		<div id="logo">
    			<a href="<?php bloginfo('url') ?>/" title="Go to the home page"><img src="<?php //bloginfo('template_directory') ?>http://www.padcreative.co.uk/wp-content/themes/pad/images/logo_pad_creative.png" alt="Company Strapline"></a>
    		</div>
    	
    		<div id="top-menu" class="nav-menu nav-menu-horiz group">
    			<?php wp_nav_menu( array('menu' => 'Top Menu' )); ?>
    		</div>
				
		</div>
		
	</div>
