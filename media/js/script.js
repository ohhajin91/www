/*scroll*/
$(document).ready(function () {
    
    const smh=$('.videoBox').height()-$('#headerArea').height();
    const th=$('#headerArea').height()+$('.videoBox').height();  
    const on_off=false;  
    
    
       $(window).on('scroll',function(){
            const scr = $(window).scrollTop();
            const scr2 = $(window).width();
           /*header*/
            if(scr>smh-100){
                $('#headerArea').css('background','rgba(0,0,0,.9)');
            }else{
                if(on_off===false){
                    $('#headerArea').css('background','rgba(0,0,0,0)');
                }
            };
           /*index opacity*/
                   if(scr2>1280){
            if(scr>=600){
                $('#content section:eq(0)').addClass('on');
            }else{}

            if(scr>=1400){
                $('#content section:eq(1)').addClass('on');
            }else{}

            if(scr>=2900){
                $('#content section:eq(2)').addClass('on');
            }else{}

            if(scr>=4100){
                $('#content section:eq(3)').addClass('on');
            }else{}
            
            if(scr>=4700){
                $('#content section:eq(4)').addClass('on');
            }else{}

        }else if(scr2<=1280 && scr2>1024){
            if(scr>=450){
                $('#content section:eq(0)').addClass('on');
            }else{}

            if(scr>=1000){
                $('#content section:eq(1)').addClass('on');
            }else{}

            if(scr>=2300){
                $('#content section:eq(2)').addClass('on');
            }else{}

            if(scr>=3000){
                $('#content section:eq(3)').addClass('on');
            }else{}
            
            if(scr>=3750){
                $('#content section:eq(4)').addClass('on');
            }else{}
            
        }else if(scr2<=1024 && scr2>768){
            if(scr>=430){
                $('#content section:eq(0)').addClass('on');
            }else{}

            if(scr>=1800){
                $('#content section:eq(1)').addClass('on');
            }else{}

            if(scr>=2600){
                $('#content section:eq(2)').addClass('on');
            }else{}

            if(scr>=3450){
                $('#content section:eq(3)').addClass('on');
            }else{}
            
            if(scr>=3900){
                $('#content section:eq(4)').addClass('on');
            }else{}
       
        }else if(scr2<=768 && scr2>640){
            if(scr>=450){
                $('#content section:eq(0)').addClass('on');
            }else{}

            if(scr>=1600){
                $('#content section:eq(1)').addClass('on');
            }else{}

            if(scr>=2450){
                $('#content section:eq(2)').addClass('on');
            }else{}

            if(scr>=3450){
                $('#content section:eq(3)').addClass('on');
            }else{}
            
            if(scr>=3950){
                $('#content section:eq(4)').addClass('on');
            }else{}
            
        }else if(scr2<=640 && scr2>480){
            if(scr>=400){
                $('#content section:eq(0)').addClass('on');
            }else{}

            if(scr>=2000){
                $('#content section:eq(1)').addClass('on');
            }else{}

            if(scr>=3600){
                $('#content section:eq(2)').addClass('on');
            }else{}
   
            if(scr>=4150){
                $('#content section:eq(3)').addClass('on');
            }else{}
            
            if(scr>=4650){
                $('#content section:eq(4)').addClass('on');
            }else{}
            
        }else{
                $('#content section').addClass('on');
            
        }
           /*top*/ 
           if(scr>th){
                  $('.top').fadeIn('slow');
              }else{
                  $('.top').fadeOut('fast');
              };
         });

          $('.top').click(function(){
              
             $("html,body").stop().animate({"scrollTop":0},1000); 
          }); 
         });
    $('.down').click(function(e){
        e.preventDefault(); //a태그 팅겨지는거 막아주는 이벤트
          screenHeight = $(window).height(); 
          $('html,body').animate({'scrollTop':screenHeight}, 1000);
    });

/*gnb*/
document.querySelector('.menu').addEventListener('click', function(){
    this.classList.toggle('active');
});
    
 $(document).ready(function() {
   $(".menu").toggle(function() {
	 $("#gnb").slideDown('slow');
   }, function() {
	 $("#gnb").slideUp('fast');
   });
   
   
    const current=0;
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 768){
        $("#gnb").show();
		 current=1;
      }
      if(current===1 && screenSize <= 768){
        $("#gnb").hide();
         current=0;
      }
    }); 
    
  });   


/*sub_3plot drop*/
$(document).ready(function(){
    
    const screenHeight = $(window).height();
    const screenSize = $(window).width();
   
    
   $(window).on('scroll',function(){
       const scroll = $(window).scrollTop();
       if(scroll>600){
           $('.right_img').css('right','8%');
       }else{
           $('.right_img').css('right',-600);
       }
       
       
       if(scroll>1200){
           $('.drop_img').css('top',0);
       }else{
           $('.drop_img').css('top',-600);
       }
       
       if(scroll>2100){
           $('.bottom_img').css('bottom',0);
       }else{
           $('.bottom_img').css('bottom',-600);
       }
   });
   
});