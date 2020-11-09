
$(window).on("scroll",function(){
		var scroll = $(this).scrollTop();		
		$("article").stop().animate({"left":-scroll},600);
	});
    var numAc = $("section").size();	
	var widSec = 200*numAc+600;
	var widTotal = widSec+600;
	
	$("article").width(widTotal);
	$("body").height(widSec);	
	$("html,body").animate({"scrollTop":widSec},2000);	

    $("section h3").on("click",function(e){
		e.preventDefault();
		
		var index = $(this).parent().index();
		var src = $(this).children("a").attr("href");	
		var posAc = 200*index;
		
		$("section").removeClass("on");		
		$(this).parent().addClass("on");
		$("section p img").attr({"src":""});
		$(this).siblings("p").children("img").attr({"src":src});	
		$("html,body").scrollTop(posAc);
	});
	
	$("span").on("click",function(){
		$("section").removeClass("on");
	});

 $("#navi li").on("click",function(){
  var i = $(this).index();
  var posNavi = 1000*i;  
  $("#navi li, article").removeClass();
  $(this).addClass("on");  
  $("html,body").scrollTop(posNavi);
 }); 





























