$(document).ready(function(){
    $('.right_btn').click(function(){
        $('.content_area figure').first().appendTo('.content_area .volunteer');
    });
    $('.left_btn').click(function(){
        $('.content_area figure').last().prependTo('.content_area .volunteer');
    });
});