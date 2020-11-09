$(document).ready(function() {
  	var screenSize = $(window).width(); 
	var screenHeight = $(window).height(); 
  	var current=false; 
  	
	$("#content").css('margin-top',screenHeight); 
  	if( screenSize > 768){  
        $("#videoBG").show();
        $("#imgBG").hide();
        
      }
    if(screenSize <= 768){  
        $("#videoBG").hide();
        $("#videoBG").attr('src',''); 
        $("#imgBG").show();
        $(".videoTitle").hide();
      }
  	
   $(window).resize(function(){ 
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
      $("#content").css('margin-top',screenHeight);
		 
      if( screenSize > 768 && current==false){  
       
      	
        $("#videoBG").show();
          $(".videoTitle").show();
        $("#videoBG").attr('src','images/frozen.mp4');
        $("#imgBG").hide();
        current=true;
      }
      if(screenSize <= 768){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
          $(".videoTitle").hide();
        current=false;
      }
    }); 
		
		
		$('.down').click(function(e){
            e.preventDefault(); //a태그 팅겨지는거 막아주는 이벤트
			  screenHeight = $(window).height(); 
			  $('html,body').animate({'scrollTop':screenHeight}, 1000);
		});
		
		
  });