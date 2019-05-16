jQuery(window).load(function () {

    var topBarOuter = jQuery('.np-topbar').outerHeight();
    jQuery('ul.np-topbar-nav a').not('.sub-menu a').css('line-height', topBarOuter - 1 + 'px');

});
jQuery(document).ready(function ($) {

    var carouselContainer = $('.post-carousel-container');
    var searchTrigger = $('.np-search-overlay-trigger');

    if (carouselContainer.length > 0) {
        carouselContainer.each(function () {
            var scrollNum = parseInt($(this).attr('data-scroll-items'));
            var showNum = parseInt($(this).attr('data-show-items'));
            $(this).slick({
                infinite: true,
                slidesToShow: showNum,
                slidesToScroll: scrollNum,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 840,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }

                ]
            });
            $(this).fadeIn();
        });

        $('.carousel-next').on('click', function () {
            carouselContainer.slick("slickNext");
            return false;
        });

        $('.carousel-prev').on('click', function () {
            carouselContainer.slick("slickPrev");
            return false;
        });

    }
    $('#nav-icon1').click(function(){
        $(this).toggleClass('open');
    });
    $('.close-btn').click(function () {
        $('#search-overlay').fadeOut();
        searchTrigger.show();
    });
    searchTrigger.on('click', function () {
        $(this).hide();
        $('#search-overlay').fadeIn();
        return false;
    });

    /*====== Mobile Trigger =====*/

        $('#np-mobile-navigation').hcOffcanvasNav({
            maxWidth: 769,
            customToggle: $('.mobile-trigger'),
            labelClose: ''
        });



});