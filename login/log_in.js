/*비밀번호*/
$(document).ready(function(){
            $('#lock').toggle(function(){
                 $(this).find('.fa-lock').attr('class', 'fas fa-lock-open');
                 $('.login_input').attr('type','text');
                  $('#lock').attr('title','비밀번호 숨기기');
             }, function(){
                 $(this).find('.fa-lock-open').attr('class', 'fas fa-lock');
                 $('.login_input').attr('type','password');
                  $('#lock').attr('title','비밀번호 표시');
             });
        })
/*갤러리*/
$(document).ready(function() {
  let timeonoff;
  let imageCount=3; 
  let cnt=1;
  let direct=1;  
  let position=0; 
  let onoff=true;
    
    $('.btn1').css('background','#e34e09'); 
    $('.btn1').css('width','14');
 function moveg(){
      cnt+=direct;  
		if(cnt==1){
		   position=0;  
		}else if(cnt==2){
	       position=-300;
		}else if(cnt==3){
		   position=-600;
		}else if(cnt==4){
		   position=-900;
		}
                                                
	   for(let i=1;i<=imageCount;i++){
        $('.btn'+i).css('background','#00adef'); 
        $('.btn'+i).css('width','7'); 
      }
      $('.btn'+cnt).css('background','#e34e09');
      $('.btn'+cnt).css('width','14');   
                           
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
              $('.btn'+i).css('width','7');
    }

	if($target.is('.btn1')){ 
    	   $('.gallery').animate({left:0}, 'slow');
                cnt=1;
                direct=1;
	}else if($target.is('.btn2')){
    	   $('.gallery').animate({left:-300}, 'slow');
                cnt=2;
	}else if($target.is('.btn3')){ 
    	   $('.gallery').animate({left:-600}, 'slow');
                cnt=3;
	}
    
      
    $('.btn'+cnt).css('background','#e34e09');
    $('.btn'+cnt).css('width','14');
      
    timeonoff= setInterval( moveg , 3000); 
      
    if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(../images/stop.png)');
     }  
  });
 
   
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);   
		   $(this).css('background','url(../images/play.png)');
           onoff=false;   
	   }else{
		  timeonoff= setInterval( moveg , 4000); 
		   $(this).css('background','url(../images/stop.png)');
		   onoff=true; 
	   }
  });	
  
});