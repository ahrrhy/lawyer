$(document).ready(function () {
    $('.navbar-toggler').on('click', 'ontouchstart', function () {
        if (!$('.navbar').hasClass('no-border-bottom')){
            $('.navbar').addClass('no-border-bottom').css("border-bottom","none");
        }else if ($('.navbar').hasClass('no-border-bottom')){
            $('.navbar').removeClass('no-border-bottom').css("border-bottom","1px solid #ffffff");
        }
    });
});