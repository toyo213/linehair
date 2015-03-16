
  
     jQuery(window).load(function(){
      jQuery('.flexslider').flexslider({	    
        animation: "slide",
		animationSpeed: 1000,
		direction: "vertical",
		slideshowSpeed: 2000,
		pauseOnHover: true, 
		slideshow: true,
        start: function(slider){
         jQuery('body').removeClass('loading');
        }
      });
    });
