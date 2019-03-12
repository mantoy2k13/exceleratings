(function(){
    $(document).ready(function() {

         var windHei = $(document).height() - 100;
         if( windHei > $('body').height() ){
                 $('footer').addClass('fixed_footer_bottom');
         }
 //	alert($(document).height() - 100);

      $( '.plan_seection a' ).on('click', function(){
         $( '.loading2change' ).show('first');
         $( this ).closest('form').find('input,textarea,label,.btn').css('opacity', '0.4');
      });
    });
})(jQuery);


