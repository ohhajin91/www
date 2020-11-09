$(document).ready(function(){
    
    $('.right_btn').first().click(function(){
        $('.volunteer li').first().appendTo('.volunteer ul');
    });
    $('.left_btn').last().click(function(){
        $('.volunteer li').last().prependTo('.volunteer ul');
    });
});