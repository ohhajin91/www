
$(document).ready(function() {
    $('ul.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();});
            $('#headerArea').animate({height:370},'fast').clearQueue();
                 },
        function() {
	      $('ul.dropdownmenu li.menu ul').fadeOut('fast');
          $('#headerArea').animate({height:240},'fast').clearQueue();
    });   
            $('ul.dropdownmenu li.menu').hover(
            function() { 
	         $('a.depth1', this).animate({top:-21},'fast').clearQueue();
                 },
            function() {
	        $('a.depth1', this).animate({top:0},'fast').clearQueue();
        });
         $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
                $('ul.dropdownmenu li.menu ul').slideDown('fast');
                $('#headerArea').animate({height:370},'fast').clearQueue();  
          });

         $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
                  $('ul.dropdownmenu li.menu ul').slideUp('fast');
                 $('#headerArea').animate({height:240},'fast').clearQueue();
         });
       
});

