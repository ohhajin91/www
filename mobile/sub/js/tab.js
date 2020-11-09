
$(document).ready(function(){
        let cnt=$('.tabs .tab').length;  
        $('.content_area .tab_con').hide();
        $('.content_area .tab_con:eq(0)').show(); 
        $('.tabs .tab1').css('color','#00adef');
       
        $('.tabs .tab').each(function (index) {  
            $(this).click(function(){  
                $('.content_area .tab_con').hide(); 
                $('.content_area .tab_con:eq('+index+')').show();
                for(var i=1;i<=cnt;i++){
                   $('.tabs .tab'+i).css('color','#666');
                }
                $(this).css('color','#00adef'); 
            });
        });
    });