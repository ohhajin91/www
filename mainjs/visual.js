$(document).ready(function() {
  let timeonoff;
  let imageCount=4; 
  let cnt=1;
  let direct=1;  
  let position=0; 
  let onoff=true;
    
    $('.btn1').css('background','#e34e09'); 
    $('.btn1').css('width','30');
    $('.visual_text li:eq(0)').fadeIn('slow');
 function moveg(){
      cnt+=direct;  
		if(cnt==1){
		   position=0;  
		}else if(cnt==2){
	       position=-1920;
		}else if(cnt==3){
		   position=-3840;
		}else if(cnt==4){
		   position=-5760;
		}
     
        $('.visual_text li').hide();
        $('.visual_text li:eq('+(cnt-1)+')').fadeIn('slow');
                                                
	   for(let i=1;i<=imageCount;i++){
        $('.btn'+i).css('background','#00adef'); 
        $('.btn'+i).css('width','15'); 
      }
      $('.btn'+cnt).css('background','#e34e09');
      $('.btn'+cnt).css('width','30');   
                           
		$('.gallery').animate({left:position}, 'slow'); 
		if(cnt==imageCount)direct=-1;
        if(cnt==1)direct=1;
 }

  timeonoff= setInterval( moveg , 3000);

  $('.mbutton').click(function(event){  

	let $target=$(event.target); 
	clearInterval(timeonoff);  

	for(let i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#00adef'); 
              $('.btn'+i).css('width','15');
    }

	if($target.is('.btn1')){ 
    	   $('.gallery').animate({left:0}, 'slow');
                cnt=1;
                direct=1;
	}else if($target.is('.btn2')){
    	   $('.gallery').animate({left:-1920}, 'slow');
                cnt=2;
	}else if($target.is('.btn3')){ 
    	   $('.gallery').animate({left:-3840}, 'slow');
                cnt=3;
	}else if($target.is('.btn4')){
    	   $('.gallery').animate({left:-5760}, 'slow');
                cnt=4;
                direct-1;
	}
    
    $('.visual_text li').hide();
    $('.visual_text li:eq('+(cnt-1)+')').fadeIn('slow');
      
    $('.btn'+cnt).css('background','#e34e09');
    $('.btn'+cnt).css('width','30');
      
    timeonoff= setInterval( moveg , 3000); 
      
    if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png)');
     }  
  });
 
   
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);   
		   $(this).css('background','url(images/play.png)');
           onoff=false;   
	   }else{
		  timeonoff= setInterval( moveg , 4000); 
		   $(this).css('background','url(images/stop.png)');
		   onoff=true; 
	   }
  });	
  
});