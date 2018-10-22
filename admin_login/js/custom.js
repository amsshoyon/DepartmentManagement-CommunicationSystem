(function ($) {
	$(document).ready(function(){
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 750) {      
				$('#return-to-top').fadeIn(200);   
			} else {
				$('#return-to-top').fadeOut(200);  
			}
		});
		$('#return-to-top').click(function() {     
			$('body,html').animate({
				scrollTop : 0                      
			}, 500);
		});
		
		
	});

	$(document).ready(function() {
		$('#return-to-top span').hide();
		
		$('#return-to-top').hover(function(){
			$('#return-to-top span').show();
		}, function() {
			$('#return-to-top span').hide();
		});

	});


})(jQuery);