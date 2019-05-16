(function ($) {
    $(".tab-link").live("click", function (e) {
        var tabID = $(this).attr('data-tab');
        $('.tb-content').removeClass('active');
        $('.tab-link').removeClass('current');
        $(this).addClass('current');
        $(tabID).addClass('active');


        e.preventDefault();
    });
}(jQuery));