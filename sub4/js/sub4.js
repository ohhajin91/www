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