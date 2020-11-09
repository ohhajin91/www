$(document).ready(function () {
    let th=$('#headerArea').height()+$('.visual').height();  

          $('.top').hide(); 


         $(window).on('scroll',function(){
              var scroll = $(window).scrollTop();
     

             //$('.text').text(scroll);

             if(scroll>th){
                  $('.top').fadeIn('slow');
              }else{
                  $('.top').fadeOut('fast');
              }
         });

          $('.top').click(function(){
            
             $("html,body").stop().animate({"scrollTop":0},1000); 
          }); 

   });