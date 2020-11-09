

/*mailbox*/
$(document).ready(function(){

$('.more').each(function(index){

    $(this).click(function(){
        $('.modal_box').fadeIn('normal');
        $('.modal').css('transform', 'scaleY(1)');
    });

    $('.close, .modal_box').click(function(){
        $('.modal').css('transform', 'scaleY(0)');
        $('.modal_box').fadeOut('fast');
        

    });
   
});
    
});
/*safetygoods*/
$(document).ready(function(){
    let position1=0;
    let movesize1=$('.safety img').width();
    
   $('.safety ul').after($('.safety ul').clone());
    
    $('.button').click(function(event){
        let $target=$(event.target);
       
        if($target.is('.m2')){
            if(position1==-1600){
                $('.safety').css('left',0);
                position1=0;
            }
            position1-=movesize1;
            $('.safety').stop().animate({left:position1}, 'fast' ,function(){
                if(position1==-1600){
                    $('.safety').css('left',0);
                    position1=0;
                }
            });
        }else if($target.is('.m1')){
            if(position1==0){
                $('.safety').css('left',-1600);
                position1=-1600;
            }
            position1+=movesize1;
            $('.safety').stop().animate({left:position1}, 'fast',function(){
                if(position1==0){
                    $('.safety').css('left',-1600);
                    position1=-1600;
                }
            });
        }
    });
});



/*partners*/
$(document).ready(function(){
    let position=0;
    let movesize=1.5;
    let timeonoff;
    
    $('.partners ul').after($('.partners ul').clone());
    
    function partnerMove(){
        position-=movesize;
        $('.partners').css('left',position);
        
        if(position < -2280){
            $('.partners').css('left',0);
            position=0;
        }
    };
    
    timeonoff=setInterval(partnerMove,100);
    $('.partners').hover(function(){
        clearInterval(timeonoff);
    },function(){
        timeonoff=setInterval(partnerMove,100);
    });
});
