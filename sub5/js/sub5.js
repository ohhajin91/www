
$(document).ready(function () {
	let article = $('.qa .article');
	
	$('.qa .article .trigger').click(function(){  
   
	let myArticle = $(this).parents('.article'); 
	if(myArticle.hasClass('hide')){ 
	    article.find('.answer').slideUp(500);
		article.removeClass('show').addClass('hide'); 
        article.find('span .far').css('transform','rotate(0)');
	    myArticle.removeClass('hide').addClass('show');  
	    myArticle.find('.answer').slideDown(500);  
        myArticle.find('i').css('transform','rotate(180deg)')
	 } else {  
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.answer').slideUp(500); 
       myArticle.find('i').css('transform','rotate(0)'); 
	}  
  });    
});  