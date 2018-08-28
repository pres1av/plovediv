(function($) {
	
	//Main elements
	var html = $('html');
	var body = $('body');
	var responsiveBar = $('#responsive-bar');
	var responsiveMenu = $('#responsive-menu');
	var responsiveMenuButton = $('#responsive-menu-button');
	var topMenu = $('#top-menu');
	var scrollingLogos = $('#scrolling-logos');
	var scrollingLogosInner = $('#scrolling-logos-inner');
	var formRequiredFields = $('.gravity-form .gfield_contains_required').find('input, textarea, select');
	    
	//Classes
	var activateClass = 'activate';
	
	//Toggle display-none class ON/OFF | flag = add or remove
	var toggleDisplayNone = function(elem, flag) {
		elem[flag + 'Class']('display-none');
	}
	
	// Get the current browser and version | output: Chrome 68
	var browserVersion = (function() {
	    var ua = navigator.userAgent, tem, 
	    M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
	    if(/trident/i.test(M[1])){
	        tem =  /\brv[ :]+(\d+)/g.exec(ua) || [];
	        return 'IE '+(tem[1] || '');
	    }
	    if(M[1] === 'Chrome'){
	        tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
	        if(tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
	    }
	    M = M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, ' ?'];
	    if((tem = ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
	    return M.join(' ');
	})();
	
	
    /* Home */
    
    $(function(){
	    
	    // Adds browser name and version as classes to body
	    body.addClass(browserVersion);
	    
    	
    	/* Lightbox */
    
    	$('.page a[href$=".jpg"],a.lightbox').magnificPopup({
    		type: 'image',
    	    gallery: {
    	      enabled: true
    	    },
    		zoom: {
    		    enabled: false, // By default it's false, so don't forget to enable it
    		
    		    duration: 300, // duration of the effect, in milliseconds
    		    easing: 'ease-in-out', // CSS transition easing function
    		
    		    // The "opener" function should return the element from which popup will be zoomed in
    		    // and to which popup will be scaled down
    		    // By defailt it looks for an image tag:
    		    opener: function(openerElement) {
    		      // openerElement is the element on which popup was initialized, in this case its <a> tag
    		      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
    		      return openerElement.is('img') ? openerElement : openerElement.find('img');
    		    }
    		}				
    		// other options
    	});
    
    	/* Scrolling logos */
    	
    	toggleDisplayNone(scrollingLogos, 'remove');
    
    	scrollingLogosInner.not('.slick-initialized').slick({
    		infinite: true,
    		slidesToShow: 4,
    		slidesToScroll: 1,
    		autoplay: true,
    		autoplaySpeed: 2000,
    		pauseOnHover: false,
    		appendArrows: scrollingLogos,
    		prevArrow: '<a class="prev-next" id="prev"></a>',
    		nextArrow: '<a class="prev-next" id="next"></a>',
    		responsive: [
    		    {
    		      breakpoint: 930,
    		      settings: {
    		        slidesToShow: 3,
    		      }
    		    },
    		    {
    		      breakpoint: 738,
    		      settings: {
    		        slidesToShow: 2,
    		      }
    		    },
    		    {
    		      breakpoint: 486,
    		      settings: {
    		        slidesToShow: 1,
    		      }
    		    }
    		]
    	});	
    	
    	$(window).load(function (){
    		
    		/*$('.slick-slide').eq(0).width();*/
    		
    		/*scrollingLogosInner.children('img').each(function(){
    			
    			var logoHeight = $(this).height();
    			var logoWidth = $(this).width();
    			
    			if(logoWidth == 216 ) {
    				
    				var paddingTop = (65 - logoHeight)/2;
    				
    				$(this).css('padding-top', paddingTop);
    				
    			} else if (logoHeight == 65 ) {
    				
    				var paddingLeft = (216 - logoWidth)/2;
    				
    				$(this).css('padding-left', paddingLeft);
    				
    			} else if ((logoWidth < 216) && (logoHeight < 65)) {
    				
    				var paddingLeft = (216 - logoWidth)/2;
    				var paddingTop = (65 - logoHeight)/2;
    				$(this).css({
    					'padding-left': paddingLeft,
    					'padding-top': paddingTop
    				});
    				
    			}
    			
    		});*/
    		
    	});
    	
    	/*$(window).load(function (){
    		
    		toggleDisplayNone(scrollingLogos, 'remove');
    	
    		scrollingLogosInner.cycle({
    		    speed: 500,
    		    timeout: 2000,
    		    slides: '> div',
    		    fx: 'carousel',
    		    swipe: true,
    		    carouselVisible: 4,
    		    carouselFluid: true,
    		    next: '#next',
    		    prev: '#prev'
    		});
    	
    		
    		scrollingLogosInner.children('img').each(function(){
    			
    			var logoHeight = $(this).height();
    			var logoWidth = $(this).width();
    			
    			if(logoWidth == 216 ) {
    				
    				var paddingTop = (162 - logoHeight)/2;
    				
    				$(this).css('padding-top', paddingTop);
    				
    			} else if (logoHeight == 162 ) {
    				
    				var paddingLeft = (216 - logoWidth)/2;
    				
    				$(this).css('padding-left', paddingLeft);
    				
    			}
    			
    		});
    		
    	});*/
    
    			
    	// Add required attr to required form fields
    	formRequiredFields.attr('required', true);
    	
    
		/* Responsive */

    	toggleDisplayNone(responsiveBar, 'remove');

    	responsiveMenuButton.click(function(){

    		responsiveMenu.toggleClass(activateClass);
    		responsiveMenuButton.toggleClass(activateClass);

    		html.add(body).toggleClass('scroll');
    		event.stopPropagation();
    	});
    	
    	// Close menu on click outside
    	html.mouseup(function(e) {
	    	var target = $(e.target);
	    	var targetParent = $(e.target.parentElement);
	    	
	    	if ( !responsiveMenu.is(targetParent) && !responsiveMenu.is(target) && !responsiveMenuButton.is(targetParent) && !responsiveMenuButton.is(target)) {
		    	responsiveMenu.removeClass(activateClass);
				responsiveMenuButton.removeClass(activateClass);
				
				html.add(body).removeClass('scroll');
	    	}
    	});
    	
		mediaQueryList = window.matchMedia("(max-width: 56.25em)");
    
    	function widthchecker() {	
    		
    		responsiveMenu.removeClass(activateClass);
    		
    		if ( mediaQueryList.matches ) {
    		
				toggleDisplayNone(responsiveBar.add(responsiveMenu).add(responsiveMenuButton), 'remove');

    			topMenu.children('.menu-top-menu-container').appendTo(responsiveMenu);
    			
    			
    		} else {
    			
    			
    			toggleDisplayNone(responsiveBar.add(responsiveMenu).add(responsiveMenuButton), 'add');

    			responsiveMenu.children('.menu-top-menu-container').appendTo(topMenu);
    			
    			responsiveBar.children('#user-menu').appendTo(topMenu);
    			
    		}
    		
    			
    	}
	    	    	
    	$(widthchecker);
    					
    	$(window).resize(widthchecker); 
    	
    });
	
})(jQuery);