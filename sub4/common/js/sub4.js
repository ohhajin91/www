
 $(document).ready(function(){
    let cnt=$('.tabs h4 .tab').length; 
    $('.tabs .contlist:eq(0)').show(); 
    $('.tabs .tab1').css('color','#00adef');

  $('.tabs .tab').each(function (index) {  
    $(this).click(function(){   
	  $(".tabs .contlist").hide();  
	  $(".tabs .contlist:eq("+index+")").show();
        
	  for(let i=1;i<=cnt;i++){  //1,2,3
       $('.tab'+i).css('color','#ccc');
      } 
      $(this).css('color','#00adef'); 
   });
  });
  });

