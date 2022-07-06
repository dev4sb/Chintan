var isAlreadyRun = false;

$(window).scroll( function(){

    $('.countern').each( function(i){

        var bottom_of_object = $(this).position().top + $(this).outerHeight() / 2;
        var bottom_of_window = $(window).scrollTop() + $(window).height();


            if( bottom_of_window > ( bottom_of_object + 20 )  ){
				if (!isAlreadyRun) {
					$('.countern').each(function () {
	            	
	                $(this).prop('Counter', 0).animate({
	                    Counter: $(this).text()
	                }, {
	                        duration: 1500,
	                        easing: 'swing',
	                        step: function (now) {
	                            $(this).text(Math.ceil(now));
	                        }
	                    });
	            	});
				}
                isAlreadyRun = true;
            }
    }); 

});