
 window.onload=function(){    
        
    let list = document.getElementsByClassName('list');
    let tabsBtn1=document.getElementById('tabBtn1');
    let tabsBtn2=document.getElementById('tabBtn2');
    let tabsBtn3=document.getElementById('tabBtn3');
    let tabsBtn4=document.getElementById('tabBtn4');
    
    let purl=window.location; 
    tmp=String(purl).split('?'); 
        
   if(tmp[1]!=undefined){

    tmp2=tmp[1].split('='); 
     
    if(tmp2[1]==1){
        list[0].style.display='block';
    }else if(tmp2[1]==2){
        list[0].style.display='none'
        list[1].style.display='block';
        tabBtn1.style.color='#666';
        tabBtn2.style.color='#00adef';
    }else if(tmp2[1]==3){
        list[0].style.display='none';
        list[2].style.display='block';
        tabsBtn1.style.color='#666';
        tabsBtn3.style.color='#00adef';
    }
     else if(tmp2[1]==4){
        list[0].style.display='none';
        list[3].style.display='block';
        tabsBtn1.style.color='#666';
        tabsBtn4.style.color='#00adef';
    }
   }  
 }