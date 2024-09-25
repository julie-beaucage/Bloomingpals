$(document).ready(function() {
    
    // navbar
    $('.navbar_item').mouseenter(function() { 
        $(this).find('.navbar_icon').css('filter', 'brightness(0.9)');

        if ($(window).width() < 1200) {
            $(this).find('.navbar_icon').css('border-radius', '0.8em 0 0 0.8em');
            $(this).find('.shrinked_title .title').css('width', 'auto');
            $(this).find('.shrinked_title .title').css('display', 'inline-flex');
        }
    });

    $('.navbar_item').mouseleave(function() { 
        $(this).find('.navbar_icon').css('border-radius', '0.8em');
        $(this).find('.navbar_icon').css('filter', 'brightness(1.1)');
        $(this).find('.shrinked_title .title').css('width', '0px');
        $(this).find('.shrinked_title .title').css('display', 'none');
    });
});