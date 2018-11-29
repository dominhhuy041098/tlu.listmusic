jQuery(document).ready(function($) {
    $(window).load(function() {
     if ($('.wrapper-nav').length > 0) {
       var _top = $('.wrapper-nav').offset().top - parseFloat($('.wrapper-nav').css('marginTop').replace(/auto/, 0));
        $(window).scroll(function(evt) {
         var _y = $(this).scrollTop();
         if (_y > _top) {
         $('.wrapper-nav').addClass('fixed');
         $('.main-1').css("margin-top", "30px")
         } else {
         $('.wrapper-nav').removeClass('fixed');
         $('.main-1').css("margin-top", "0")
       }
      })
     }
    });
   });