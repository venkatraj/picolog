(function($){
	$(function(){
		$('.flexslider').flexslider();

	});

    $(".fa-bars").toggle(function(){
            $('.menu-left').addClass('menu-open');
            $('.menu-push').addClass('menu-push-toright');
            $(this).removeClass('fa-bars');
            return false;
        },  
        function(){
            $('.menu-left').removeClass('menu-open');   
            $('.menu-push').removeClass('menu-push-toright'); 
            $(this).addClass('fa-bars')
            return false;
        }
    ); //toggle
    
    if( $('#masonry-loop').length > 0 ) {
        var container = document.querySelector('#masonry-loop');
        //create empty var msnry
        var msnry;
        // initialize Masonry after all images have loaded
        imagesLoaded( container, function() {
            msnry = new Masonry( container, { 
                itemSelector: '.masonry-post' 
            });
        });
    }


})(jQuery);


// jQuery powered scroll to top

jQuery(document).ready(function(){

	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){ 
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();  
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});
	

});