$(document).ready(function () {
    $('.navbar-toggler').on('click', function () {
        if (!$('.navbar').hasClass('no-border-bottom')){
            $('.navbar').addClass('no-border-bottom').css("border-bottom","none");
        }else if ($('.navbar').hasClass('no-border-bottom')){
            $('.navbar').removeClass('no-border-bottom').css("border-bottom","1px solid #ffffff");
        }
    });
    var setData = function () {
        var container = $('main'),
            fancyAnchors = container.find('.lightbox');
        fancyAnchors.attr("data-fancybox","images").attr('data-width', "653").attr('data-height', "900");
    };
    setData();
});