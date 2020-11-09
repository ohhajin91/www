/*gnb*/
$(document).ready(function(){
    
    $(".btn").click(function(){
        let documentHeight = $(document).height();
        
        $('.box').css('height',documentHeight);
        $('#gnb').css('height',documentHeight);
        
        $('#gnb').animate({right:0, opacity:1},'slow');
        $('.box').show();
    });
   $('.box,.mclose').click(function(){
       $('#gnb').animate({right:'-100%',opacity:0},'fast');
       $('.box').hide();
   });
    
    let onoff=[false,false,false,false];
    
    let arrcount=onoff.lengh;
    
    $('#gnb .depth1>h3').click(function(){
        let ind=$(this).parents('.depth1').index();
        
        if(onoff[ind]==false){
            $('#gnb .depth1 ul').hide();
            $(this).next('ul').slideDown('slow');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
            for(let i=0; i<arrcount; i++) onoff[i]=false;
            onoff[ind]=true;
            $('.fas').css('transform','rotate(0)');
            $(this).find('.fas').css('transform','rotate(180deg)')
        }else{
            $(this).next('ul').slideUp('fast');
            onoff[ind]=false;
            $(this).find('.fas').css('transform','rotate(0)')
        }
    });
});