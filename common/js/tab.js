//h3 depth
$(document).ready(function(){
    let cnt=$('.content_area h3 .tab').length;
    
    $('.content_area .brand:eq(0)').show();
    $('.content_area .tab1').addClass('on');
    
    $('.content_area .tab').each(function(index){
        $(this).click(function(){
            $('.content_area .brand').hide();
            $('.content_area .brand:eq('+index+')').show();
            for(let i=1; i<=cnt; i++){
                $('.tab'+i).removeClass('on');
            }
            $(this).addClass('on');
        });
    });
});

//h4depth

 $(document).ready(function(){
    let cnt1=$('.tabs h4 .tab').length; 
    $('.tabs .contlist:eq(0)').show(); 
    $('.tabs .tab1').css('color','#00adef');

  $('.tabs .tab').each(function (index) {  
    $(this).click(function(){   
	  $(".tabs .contlist").hide();  
	  $(".tabs .contlist:eq("+index+")").show();
        
	  for(let i=1;i<=cnt1;i++){  
       $('.tab'+i).css('color','#666');
      } 
      $(this).css('color','#00adef'); 
   
  });
  });
 });

