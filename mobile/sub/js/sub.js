/*2-3,3-2*/
$(document).ready(function(){
    let cnt=1;
    let totalcnt=5;

    $('.left').click(function(){
        cnt++;
        if(cnt>totalcnt){
            cnt=1;
        }
        $('.support_swiper li').first().appendTo('.support_swiper ul');
    });
    
    $('.right').click(function(){
        cnt--;
        if(cnt<1){
            cnt=totalcnt;
        }
        $('.support_swiper li').last().prependTo('.support_swiper ul');
    });
});
/*3-1*/
$(document).ready(function () {
    let th=600;

          $('.top').show(); 


         $(window).on('scroll',function(){
              var scroll = $(window).scrollTop();

             if(scroll>0 && scroll<th){
                  $('.top').fadeIn('fast');
              }else{
                  $('.top').fadeOut('fast');
              }
         });

   });
/*4-3*/
$(document).ready(function(){

$('ul li .more').each(function(index){

    $(this).click(function(){
        $('.modal_box').fadeIn('normal');
        $('.modal' + (index+1)).css('transform', 'scaleY(1)');
    });

    $('.close, .modal_box').click(function(){
        $('.modal' + (index+1)).css('transform', 'scaleY(0)');
        $('.modal_box').fadeOut('fast');
        

    });
   
});
    
});


