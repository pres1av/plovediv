	<header class="header header__fixed header__fixed--overlay">
		
		<div class="container">
			
    		<div class="header__contact-box">
    			<p class="header__tel"><?php the_field('phone_number','options'); ?></p>
    			<p class="header__email"><?php the_field('email_address','options'); ?></p>
    		</div>
    		<div class="header__logo-box">
    			<a href="<?php echo home_url() ?>/" title="Go to the home page">
	    			<img class="header__logo" src="<?php //bloginfo('template_directory') ?>http://www.padcreative.co.uk/wp-content/themes/pad/images/logo_pad_creative.png" alt="Company Strapline">
	    		</a>
    		</div>
    	
    		<div id="top-menu" class="nav-menu nav-menu--horiz">
    			<?php wp_nav_menu( array('menu' => 'Top Menu' )); ?>
    		</div>
				
		</div>
		
	</header>
