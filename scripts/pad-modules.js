(function($) {
	
	//Module elements
	var moduleFixedHeader = $('#module-fixed-header');
	var moduleFixedHeaderOverlay = $('#module-fixed-header-overlay');
	var moduleSlideshowBanner = $('#module-slideshow-banner');
	var moduleSlideshowBannerFull = $('#module-slideshow-banner-full-screen');
	
	//Toggle display-none class ON/OFF
	var toggleDisplayNone = (elem, flag) => elem[flag + 'Class']('display-none');

	
    $(document).ready(function(){
        
    
    // -----------------------------------------------------------------------------
    // module-fixed-header + module-fixed-header-overlay
    // -----------------------------------------------------------------------------
    
    function headerHeightScroll() {
        var headerOffset = moduleFixedHeader.add(moduleFixedHeaderOverlay).offset().top; //console.log(headerOffset);
        
        var wpAdminBar = $('#wpadminbar').height();
        
        if((headerOffset - wpAdminBar) > 0) {
            moduleFixedHeader.add(moduleFixedHeaderOverlay).addClass('scrolling');
        } else {
            moduleFixedHeader.add(moduleFixedHeaderOverlay).removeClass('scrolling');
        }
    }
    
    $(document).scroll(headerHeightScroll);
    
    
    
    // -----------------------------------------------------------------------------
    // module-slideshow-banner
    // -----------------------------------------------------------------------------
    
	toggleDisplayNone(moduleSlideshowBanner.children('.slide'), 'remove');
	
	moduleSlideshowBanner.cycle({
		slides: '> div',
	    speed: 1500,
	    timeout: 3000,
	    fx: 'fade'
	});



    // -----------------------------------------------------------------------------
    // module-slideshow-banner-full-screen
    // -----------------------------------------------------------------------------
    
    
	toggleDisplayNone(moduleSlideshowBannerFull.children('.slide'), 'remove');
	
	moduleSlideshowBannerFull.cycle({
		slides: '> div',
	    speed: 1500,
	    timeout: 3000,
	    fx: 'fade'
	});
    				
    function changeHeight() {
        var winHeight = $(window).height();
        var wpAdminBar = $('#wpadminbar').height();
        var headerHeightStatic = $('#module-static-header').height();
        var headerHeightFixed = $('#module-fixed-header').height();
        var fullMenuHeight = $('#module-menu-full').height();
        var minusHeight = wpAdminBar + headerHeightStatic + headerHeightFixed + fullMenuHeight;
                
        moduleSlideshowBannerFull.height(winHeight - minusHeight);

    }
    
    changeHeight();
    $(window).resize(changeHeight);
    
    // Smooth scrolling button
    $("#module-slideshow-banner-full-screen-scroller a").on('click', function(event) {

        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
       
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
      
    });
    
    // Offset for scroll to anchor tag
        
    function anchorOffsetHeight() {
        
        var wpAdminBar = $('#wpadminbar').height();
        var headerScrollingHeight = 90;
        var anchorOffset = wpAdminBar + headerScrollingHeight;
        
        $('#module-slideshow-banner-full-screen-scroll-down-anchor').css('bottom',anchorOffset);
                
    }
    anchorOffsetHeight();
    $(document).scroll(anchorOffsetHeight);
    
    
    
    });
})(jQuery);