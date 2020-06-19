jQuery(document).ready(function($) {
    $('.tab-content-row').click(function(){

        itemTab = $(this).attr('rel');
        $('.tab-content-inner').removeClass('tab-active');
        $('.' + itemTab).addClass('tab-active');

        $('.tab-content-row').removeClass('active');
        $(this).addClass('active');

    });

    /*$(window).on('scroll', function(e){
        //aparece segundo menu
        if($(this).scrollTop() >= 60){
            $('.wrapper').addClass('roll-top');
            if($('#wpadminbar').length) $('.header').css({ top: '32px' })
        }
        else if($(this).scrollTop() < 60){
            $('.wrapper').removeClass('roll-top');
            if($('#wpadminbar').length) $('.header').css({ top: '0' })
        }
    
    });*/
    $('ul.menu li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });

      const togglemenu = $('#toogle-menu');
      const mobilemenu = $('.mobile-menu');

      togglemenu.on('click',function(){
        mobilemenu.toggleClass('menu-show');
      })

});
