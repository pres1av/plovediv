(function($j) {
    
	
    /*$(document).on( 'click', '.navigation a', function( event ) {
    	event.preventDefault();
    	
    	$("#load-next").hide();
    	
    	var page = $('#current-page').val();
    	
    	
    	$.ajax({
    		url: ajaxloadmore.ajaxurl,
    		type: 'post',
    		data: {
    			action: 'ajax_load_more',
    			query_vars: ajaxloadmore.query_vars,
    			page: page
    		},
    		success: function( html ) {
    			
    			page++;
    			
    			$("#load-next").show();
    			
				$('#current-page').val(page);
				$('#inner-posts').append( html );    			
    		}
    	})
    })	*/
    
    
    
    
    
    //this moves an a tag to the bottom of the window for use when checking if scrolled to the pbottom of the posts
    
    function widthchecker() {
        
        var windowHeight = $j(window).height(); console.log(windowHeight);	
    
    	$j("#target").css('top', (windowHeight));
        
    }
    
    $j(widthchecker);
    
    $j(window).resize(widthchecker);
    		

    
    var fired = 1
    
    $j(document).scroll(function(){
        setTimeout(function(){ //wait a second after scrolling
            
            
            //remedy for glitch
            if(fired > 50) {
                fired = 1;
            }
            
            
            //checks if the page is scrolled to the end of the posts and executes the ajax function
            
            var targetTop = $j('#target').offset().top;
            var anchorTop = $j('#load-more').offset().top;
            

            if( targetTop > anchorTop) { 
                
                
                //increments the fired varible once user has scrolled to end of posts
                fired++;
                console.log(fired);
                
                if(fired == 2) {
                    
                    
                    //hides the load more notice when loading more
                	$j("#load-next").hide();
                	
                	
                	//get the current page which is written in a hidden input
                	var page = $j('#current-page').val();
                	
                	
                	//post the new page requested to ajaxurl which is admin-ajax.php
                	$j.ajax({
                		url: ajaxloadmore.ajaxurl,
                		type: 'post',
                		data: {
                			action: 'ajax_load_more',
                			query_vars: ajaxloadmore.query_vars,
                			page: page
                		},
                		success: function( html ) {
                			
                			//increment the next page
                			page++;
            				$j('#current-page').val(page);
            				
            				//show the load more notice
                			$j("#load-next").show();
                			
                			
                			//append the new posts
            				$j('#inner-posts').append( html );    			
                		}
                	});
                	
                    $j(document).ajaxComplete(function() { //return the fired variable to 1 once complete so that the functionality can repeat itself once scrolled to the nex set of posts.

                        fired = 1;
                      
                    });
            	} 
    
                
            }
        }, 1000)
        
    });

    
	
})(jQuery);
