/*gnb*/
$(document).ready(function () {
    
    $('.dropdownmenu').hover(
        function () {
            $('.dropdownmenu .menu ul').fadeIn('nomal', function () {
                $(this).stop();
            });

            var height = 0;
            if ($('#headerArea').hasClass('slim')) {
                height = 280;
                $('#headerArea h1').addClass('logo_1');
                $('#headerArea h1').removeClass('logo');
                $('.top_menu').css({'padding':'3px', 'height':'30px','font-size': '1em'})
                $('.depth1').css({'padding':'0 0', 'width':'200px'})
                $('.dropdownmenu').css({'width':'1000px','margin-left':'200px','top':'-15px'})
                $('.menu').css('width','200px')
                $('.menu h3').css('width','200px')
            } else {
                height = 430;
                $('#headerArea h1').addClass('logo');
                $('#headerArea h1').removeClass('logo_1');
                $('.top_menu').css({'padding':'5px', 'height':'35px','font-size': '1.125em'})
                $('.depth1').css('padding','20px')
                $('.dropdownmenu').css({'width':'1200px','margin-left':'0','top':'105px'})
                $('.menu').css('width','240px')
                $('.menu h3').css('width','240px')
            }

            $('#headerArea').animate({
                height: height
            }, 'fast').clearQueue();
        },
        function () {
            $('.dropdownmenu .menu ul').fadeOut('fast', function () {
                $(this).stop();
            });

            var height = 0;
            if ($('#headerArea').hasClass('slim')) {
                height = 110;
                $('#headerArea h1').addClass('logo_1');
                $('#headerArea h1').removeClass('logo');
                $('.top_menu').css({'padding':'3px', 'height':'30px','font-size': '1em'})
                $('.depth1').css({'padding':'0 0', 'width':'200px'})
                $('.dropdownmenu').css({'width':'1000px','margin-left':'200px','top':'-15px'})
                $('.menu').css('width','200px')
                $('.menu h3').css('width','200px')
            } else {
                height = 250;
                $('#headerArea h1').addClass('logo');
                $('#headerArea h1').removeClass('logo_1');  
                $('.top_menu').css({'padding':'5px', 'height':'35px','font-size': '1.125em'})
                $('.depth1').css('padding','20px')
                $('.dropdownmenu').css({'width':'1200px','margin-left':'0','top':'105px'})
                $('.menu').css('width','240px')
                $('.menu h3').css('width','240px')
            }

            $('#headerArea').animate({
                height: height
            }, 'fast').clearQueue();
        });

        $('.dropdownmenu .menu').hover(
          function() { 
	        $('.depth1', this).animate({top:-21},'fast').clearQueue();
        },function() {
	      $('.depth1', this).animate({top:0},'fast').clearQueue();
        });

    $('.dropdownmenu .menu .depth1').on('focus', function () {
        $('.dropdownmenu .menu ul').slideDown('fast');
        var height1 = $('#headerArea').height();

        var height1 = 0;
        if ($('#headerArea').hasClass('slim')) {
            height1 = 280;
            $('#headerArea h1').addClass('logo_1');
            $('#headerArea h1').removeClass('logo');
            $('.top_menu').css({'padding':'3px', 'height':'30px','font-size': '1em'})
            $('.depth1').css({'padding':'0 0', 'width':'200px'})
            $('.dropdownmenu').css({'width':'1000px','margin-left':'200px','top':'-15px'})
            $('.menu').css('width','200px')
            $('.menu h3').css('width','200px')
        } else {
            height1 = 430;
            $('#headerArea h1').addClass('logo');
            $('#headerArea h1').removeClass('logo_1');
            $('.top_menu').css({'padding':'5px', 'height':'35px','font-size': '1.125em'})
            $('.depth1').css('padding','20px')
            $('.dropdownmenu').css({'width':'1200px','margin-left':'0','top':'105px'})
            $('.menu').css('width','240px')
            $('.menu h3').css('width','240px')
        }

        $('#headerArea').animate({
            height1: height
        }, 'fast').clearQueue();
    });

    $('.dropdownmenu .m6 li:last').find('a').on('blur', function () {
        var height1 = $('#headerArea').height();
        $('ul.dropdownmenu li.menu ul').slideUp('fast');

        var height1 = 0;
        if ($('#headerArea').hasClass('slim')) {
            height1 = 280;
            $('#headerArea h1').addClass('logo_1');
            $('#headerArea h1').removeClass('logo');
            $('.top_menu').css({'padding':'3px', 'height':'30px','font-size': '1em'})
            $('.depth1').css({'padding':'0 0', 'width':'200px'})
            $('.dropdownmenu').css({'width':'1000px','margin-left':'200px','top':'-15px'})
            $('.menu').css('width','200px')
            $('.menu h3').css('width','200px')
        } else {
            height1 = 430;
            $('#headerArea h1').addClass('logo');
            $('#headerArea h1').removeClass('logo_1');
            $('.top_menu').css({'padding':'5px', 'height':'35px','font-size': '1.125em'})
            $('.depth1').css('padding','20px')
            $('.dropdownmenu').css({'width':'1200px','margin-left':'0','top':'105px'})
            $('.menu').css('width','240px')
            $('.menu h3').css('width','240px')
        }

        $('#headerArea').animate({
            height1: height
        }, 'fast').clearQueue();
    });

    //스크롤에 따른 헤더 변경
    
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        var th = $('.visual').height()+$('#gnb').height(); ;          
        if (scroll > th) {
            $('#headerArea').addClass('slim');
            $('#headerArea').removeClass('basic');
            $('#headerArea').height(110);
            
            $('#headerArea h1').addClass('logo_1');
            $('#headerArea h1').removeClass('logo');
            $('.top_menu').css({'padding':'3px', 'height':'30px','font-size': '1em'})
            $('.depth1').css({'padding':'0 0', 'width':'200px'})
            $('.dropdownmenu').css({'width':'1000px','margin-left':'200px','top':'-15px'})
            $('.menu').css('width','200px')
            $('.menu h3').css('width','200px')
        } else {
            $('#headerArea').addClass('basic');
            $('#headerArea').removeClass('slim');
            $('#headerArea').height(250);
            $('#headerArea h1').addClass('logo');
            $('#headerArea h1').removeClass('logo_1');
            $('.top_menu').css({'padding':'5px', 'height':'35px','font-size': '1.125em'})
            $('.depth1').css('padding','20px')
            $('.dropdownmenu').css({'width':'1200px','margin-left':'0','top':'105px'})
            $('.menu').css('width','240px')
            $('.menu h3').css('width','240px')
        }
        
        $('.dropdownmenu .menu ul').fadeOut('fast', function () {
                $(this).stop();
            });
    });

});

/*site map*/
$(function(){
    $('.map_wrap').hide(); //일단 sitemap 안보이게
    
    $('#headerArea .top_menu .site_map a').click(function(){
        $('.map_wrap').fadeIn();
    });
    
    $('.close_btn').click(function(){
        $('.map_wrap').fadeOut();
    });
});

/*family site*/
$(document).ready(function(){
    $('.family_site .arrow').click(function(){
        $('.family_site .alist').slideDown();
    });
    $('.family_site .alist').mouseleave(function(){
        $(this).slideUp();
    });
    $('.family_site .arrow').bind('focus',function(){
        $('.family_site .alist').slideUp();
    });
    $('.family_site .alist li:last').find('a').bind('blur',function(){
        $('.family_site .alist').slideDown();
    });
});
