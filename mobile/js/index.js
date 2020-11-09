/*who*/
$(document).ready(function(){
    let cnt=1;
    let totalcnt=4;

    $('.up').click(function(){
        cnt++;
        if(cnt>totalcnt){
            cnt=1;
        }
        $('.busi li').first().appendTo('.busi ul');
    });
    
    $('.down').click(function(){
        cnt--;
        if(cnt<1){
            cnt=totalcnt;
        }
        $('.busi li').last().prependTo('.busi ul');
    });
});

/*support*/
$(document).ready(function () {

    var startX, endX;
    var move_swiper = 0;

    $('.support_swiper').on('touchstart mousedown', function (e) { 
        
        startX = e.pageX || e.originalEvent.touches[0].pageX;
    });


    $('.support_swiper').on('touchend mouseup', function (e) { 

        e.preventDefault();
        endX = e.pageX || e.originalEvent.changedTouches[0].pageX;

        move_swiper += endX - startX;


        if (startX < endX) {

            $('.support_swiper').stop().animate({
                left: move_swiper
            });

            if (move_swiper > 250) {
                move_swiper = 0;
                $('.support_swiper').stop().animate({
                    left: move_swiper
                });
            }
        } else {

            var end_swiper = -$('.support_swiper').width() + $('.support_swiper').width() / 5;
            var end_swiper2 = -$('.box_swiper').width() + $('.support_swiper').width() / 2

            $('.support_swiper').stop().animate({
                left: move_swiper
            });


            if (move_swiper < end_swiper) {
                move_swiper = end_swiper2;
                $('.support_swiper').stop().animate({
                    left: move_swiper
                });

            }
        }
    });
});
$(document).ready(function(){
    let cnt=1;
    let totalcnt=5;

    $('.left').click(function(){
        cnt++;
        if(cnt>totalcnt){
            cnt=1;
        }
        $('.support_swiper li').first().appendTo('.support_swiper ul');
    });
    
    $('.right').click(function(){
        cnt--;
        if(cnt<1){
            cnt=totalcnt;
        }
        $('.support_swiper li').last().prependTo('.support_swiper ul');
    });
});

/*story*/
$(document).ready(function(){
    var newsCnt = 1; 
    var newsMaxCnt = 5;
    var newsPosition = 0;
    var newsMoveSize = 50; 
    var newsTimeonoff; 
    
    $('#content .story ul').append($('#content .story ul li').clone());

    function moveNews() {
        newsCnt++;

        newsPosition = -1 * newsMoveSize * (newsCnt - 1);

        if (newsCnt > newsMaxCnt) {
            newsCnt = 1;
        }

        $('#content .story ul').animate({
            top: newsPosition
        }, 'slow', function () {
            if (newsPosition == -1 * newsMoveSize * newsMaxCnt) {
                newsPosition = 0;
                $('#content .story ul').css('top', newsPosition);
            }
        });

    }
    newsTimeonoff = setInterval(moveNews, 4000);

    $('#content .story ul li').hover(function () {
        clearInterval(newsTimeonoff);

    }, function () {

        newsTimeonoff = setInterval(moveNews, 4000);
    });

});
