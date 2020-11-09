/*2_1*/
$(document).ready(function(){
    let cnt=$('.work h5 .btn').length; 
    $('.work .list:eq(0)').show(); 
    $('.work .btn1').css('color','#00adef');

  $('.work .btn').each(function (index) {  
    $(this).click(function(){   
	  $(".work .list").hide();  
	  $(".work .list:eq("+index+")").show();
        
	  for(let i=1;i<=cnt;i++){  
       $('.btn'+i).css('color','#666');
      } 
      $(this).css('color','#00adef'); 
   
  });
  });
 });

//sub page
 window.onload=function(){    
        
    let list = document.getElementsByClassName('list');
    let tabs1=document.getElementById('tab1');
    let tabs2=document.getElementById('tab2');
    let tabs3=document.getElementById('tab3');
    let tabs4=document.getElementById('tab4');
    
    let purl=window.location; 
    tmp=String(purl).split('?'); 
        
   if(tmp[1]!=undefined){

    tmp2=tmp[1].split('='); 
     
    if(tmp2[1]==1){
        list[0].style.display='block';
    }else if(tmp2[1]==2){
        list[0].style.display='none'
        list[1].style.display='block';
        tab[0].style.color='#666';
        tab[1].style.color='#00adef';
    }else if(tmp2[1]==3){
        list[0].style.display='none';
        list[2].style.display='block';
        tab[0].style.color='#666';
        tab[2].style.color='#00adef';
    }
     else if(tmp2[1]==4){
        list[0].style.display='none';
        list[3].style.display='block';
        tab[0].style.color='#666';
        tab[3].style.color='#00adef';
    }
     else if(tmp2[1]==5){
        list[0].style.display='none';
        list[4].style.display='block';
        tab[0].style.color='#666';
        tab[4].style.color='#00adef';
    }
   }  
 }
/*2_2*/
$(document).ready(function(){
       
          $('.event_slide_menu ul li span').mouseenter(function(event){
             var $target=$(event.target);
	  
	 if($target.is('.event_slide_menu .button_menu01')){
	       $('.event_slide_menu .img02').animate({left:500},450).clearQueue();
	       $('.event_slide_menu .img03').animate({left:600},450).clearQueue();
	       $('.event_slide_menu .img04').animate({left:700},450).clearQueue();
	 }else if($target.is('.button_menu02')){
	       $('.event_slide_menu .img02').animate({left:100},450).clearQueue();
	       $('.event_slide_menu .img03').animate({left:600},450).clearQueue();
	       $('.event_slide_menu .img04').animate({left:700},450).clearQueue();
	 }else if($target.is('.button_menu03')){
	       $('.event_slide_menu .img02').animate({left:100},450).clearQueue();
	       $('.event_slide_menu .img03').animate({left:200},450).clearQueue();
	       $('.event_slide_menu .img04').animate({left:700},450).clearQueue();
	 }else if($target.is('.button_menu04')){
	       $('.event_slide_menu .img02').animate({left:100},450).clearQueue();
	       $('.event_slide_menu .img03').animate({left:200},450).clearQueue();
	       $('.event_slide_menu .img04').animate({left:300},450).clearQueue();
	 }
          });
       });


 
/*2_3*/ 
let newContent =['','','',''];

$(document).ready(function(){
let xhrm = new XMLHttpRequest();              
    xhrm.onload=function(){
        
        
        
    let stext =JSON.parse(xhrm.responseText);
    for(let i=0; i< 4; i++){
        newContent[i] += '<figure>';
        newContent[i] += '<img src="' + stext.modal[i].person + '" alt="">'; 
        newContent[i] += '<figcaption>';
        newContent[i] += '<h5>'+ stext.modal[i].name +'</h5>';
        newContent[i] += '<p>'+ stext.modal[i].info +'</p>';
        newContent[i] += '<span>'+ stext.modal[i].date +'</span>';
        newContent[i] += '</figcaption>';
        newContent[i] += '</figure>';
        newContent[i] += '<a class="close" href="javascript:void(0);">' + stext.modal[i].cbtn + '</a>';
        }
    }

xhrm.open('GET', 'js/sub2_3.json', true);        
xhrm.send(null);
}); 

$(document).ready(function(){
    $('.open').click(function(){
        $('.modal_opa').fadeIn();
        $('.modal_content').fadeIn();
    });
    $('.modal_content').click(function(){
       $('.modal_opa').fadeOut();
        $('.modal_content').fadeOut();
    });
    $('.modal_opa').click(function(){
       $('.modal_opa').fadeOut(); 
        $('.modal_content').fadeOut();
    });
    
    $('.open').each(function(index){
        $(this).click(function(){
            if(index == 0 ){
            $('.modal_content').html(newContent[0]);
        }else if(index == 1 ){
            $('.modal_content').html(newContent[1]);
        }else if(index == 2 ){
            $('.modal_content').html(newContent[2]);
        }else if(index == 3 ){
            $('.modal_content').html(newContent[3]);
        }
        });   
    });  
});


