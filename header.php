<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	
	<?php wp_head(); ?>
	
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
	
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-K5P7B8L');</script>
	<!-- End Google Tag Manager -->
	
	<?php/*
    =====================================
    UNCOMMENT FOR COOKIE WARNING
    =====================================
    
		<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/cookie-compliance/cookie-compliance-wp.js"></script>
		
    <!--
    END
    =====================================
    */ ?>
	
</head>
<body <?php body_class(); ?>>
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K5P7B8L"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<div><a id="top"></a></div>
	
	<!--
    =====================================
    UNCOMMENT COOKIE WARNING MESSAGE
    ===================================== 
    
		<div id="cookieMessageWrapper" class="cookie-message">
			<div id="cookieMessage" class="cookie-message__inner">
				<a id="cookieClose" class="cookie-message__close-btn" href="#"></a>
				<p class="cookie-message__content"><strong>This site uses cookies.</strong> You can read how we use them in our <a href="#" class="cookie-message__privacy-link">privacy policy</a>.</p>
			</div>
		</div>
		
    END
    =====================================
    -->
    
    
	
	<div id="responsive-menu" class="responsive-menu"></div>
	
	<div id="responsive-bar" class="responsive-bar display-none">
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
	
	
	