/*숫자 자동입력*/
var memberCountConTxt= 190;
  
  $({ val : 0 }).animate({ val : memberCountConTxt }, {
   duration: 2000,
  step: function() {
    var number = numberWithCommas(Math.floor(this.val));
    $(".count1").text(number);
  },
  complete: function() {
    var number = numberWithCommas(Math.floor(this.val));
    $(".count1").text(number);
  }
});

 var memberCountConTxt= 13000;
  
  $({ val : 0 }).animate({ val : memberCountConTxt }, {
   duration: 2000,
  step: function() {
    var number = numberWithCommas(Math.floor(this.val));
    $(".count2").text(number);
  },
  complete: function() {
    var number = numberWithCommas(Math.floor(this.val));
    $(".count2").text(number);
  }
});

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


 var memberCountConTxt= 157;
  
  $({ val : 0 }).animate({ val : memberCountConTxt }, {
   duration: 2000,
  step: function() {
    var number = numberWithCommas(Math.floor(this.val));
    $(".count3").text(number);
  },
  complete: function() {
    var number = numberWithCommas(Math.floor(this.val));
    $(".count3").text(number);
  }
});
/*scroll*/
$(document).ready(function () {
    $('.mission div:eq(0)').addClass('move');
    
    let h1 = $('.mission div:eq(1)').offset().top-800;
    let h2 = $('.mission div:eq(2)').offset().top-800;
    let h3 = $('.mission div:eq(3)').offset().top-800;
    $(window).on('scroll',function(){ 
        let scroll =$(window).scrollTop();
        
        if(scroll>=800 && scroll<h1){
                $('.mission div:eq(0)').addClass('move');
            }else if(scroll>=h1 && scroll<h2){
                $('.mission div:eq(1)').addClass('move');
            }else if(scroll>=h2 && scroll<h3){
                $('.mission div:eq(2)').addClass('move');
            }else if(scroll>=2700){
                $('.mission div:eq(3)').addClass('move');
            }
    });
});