<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	
	<?php wp_head(); ?>
	
	<script type="text/javascript" src="//use.typekit.net/vtj1qog.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<!-- UNCOMMENT FOR RESPONSIVE -->
	<meta name="viewport" content="width=device-width" >
	<!-- FOR WORDPRESS TOP BAR WHEN LOGGED IN -->
	<?php if (only_show_if_anyone_loggedin() == true) : ?>
	<style>
		#responsive-menu { top: 81px; }
		#responsive-bar { top: 32px; }
		@media screen and (max-width: 782px) {
			#responsive-menu { top: 95px; }
			#responsive-bar { top: 46px; }
		}
	</style>
	<?php endif; ?>
	
	
	<?php if ( 1 == 2 ) : ?>
	
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'xxxxxxxxxxxxx']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	
	<?php endif; ?>
	
	<?php/*
    =====================================
    UNCOMMENT FOR COOKIE WARNING
    =====================================
    
		<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/cookie-compliance/cookie-compliance-wp.js"></script>
		<link type="text/css" href="<?php bloginfo('template_directory') ?>/cookie-compliance/stylesheet.css" rel="stylesheet">
    <!--
    END
    =====================================
    */ ?>
	
</head>
<body<?php if(only_show_if_anyone_loggedin() == true) { ?> class="logged-in"<?php } ?>>
	
<div id="container">
	
	<div><a id="top"></a></div>
	
	<?php/*
    =====================================
    UNCOMMENT COOKIE WARNING MESSAGE
    =====================================
    
		<div id="cookieMessageWrapper">
			<div id="cookieMessage">
				<a id="cookieClose" href="#"></a>
				<p><strong>This site uses cookies.</strong> You can read how we use them in our <a href="#">privacy policy</a>.</p>
			</div>
		</div>
    <!--
    END
    =====================================
    */ ?>
    
    
	
	<div id="responsive-menu" class="responsive-menu"></div>
	
	<div id="responsive-bar" class="page-section-back group display-none">
		<div class="responsive-bar-inner">
			<a id="responsive-menu-button">
				
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
				
			</a>
		</div>
	</div>
	
	
	
	<?php
    	
    	//Pad Header Style Modules
    	
	?>

	<?php //get_template_part( 'modules/module', 'header-static' ); ?>
	<?php //get_template_part( 'modules/module', 'header-static-overlay' ); ?>
	<?php //get_template_part( 'modules/module', 'header-fixed' ); ?>
	<?php get_template_part( 'modules/module', 'header-fixed-overlay' ); ?>
	
	
	<?php
    	
    	//Pad Menu Style Modules
    	
	?>
	
	<?php //get_template_part( 'modules/module', 'menu-full' ); ?>
	
	
	