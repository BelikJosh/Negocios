$(document).ready(function(){
    $('.arriba').hide();

    $(window).scroll(function(){
        if($(this).scrollTop()>100){
            $('.arriba').fadeIn('1000');
        }else{
            $('.arriba').fadeOut('1000');
        }
    });
    $('.arriba').click(function(){
        $('body, php').animate({
            scrollTop:0
        },50);
    });
});