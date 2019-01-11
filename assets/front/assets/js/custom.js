(function(){
    $(document).ready(function() {
		
			var windHei = $(document).height() - 100;
			if( windHei > $('body').height() ){
				$('footer').addClass('fixed_footer_bottom');
			}
		//	alert($(document).height() - 100);
    });
})(jQuery);


