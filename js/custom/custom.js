// JavaScript Document
$(document).ready(function() {

    'use strict';

    /************************************************************************************ CAROUSEL STARTS */


    var owl = $('.our-team-carousel');
    owl.owlCarousel({

        autoplay: 400,
        autoplayHoverPause: true,
        nav: false,
        dots: true,
        mouseDrag: true,
        margin: 0,
        loop: true,
        singleItem: true,
        navText: [
            "<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });


    var owl = $('.news-carousel');
    owl.owlCarousel({

        autoplay: 400,
        autoplayHoverPause: true,
        nav: false,
        dots: true,
        mouseDrag: true,
        margin: 0,
        loop: true,
        singleItem: true,
        navText: [
            "<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });


    var owl = $('.testimonials-carousel');
    owl.owlCarousel({

        autoplay: 400,
        autoplayHoverPause: true,
        nav: false,
        dots: true,
        mouseDrag: true,
        margin: 0,
        loop: true,
        singleItem: true,
        navText: [
            "<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });



    var owl = $('.clients-carousel');
    owl.owlCarousel({

        autoplay: 400,
        autoplayHoverPause: true,
        nav: false,
        dots: true,
        mouseDrag: true,
        margin: 0,
        loop: true,
        singleItem: true,
        navText: [
            "<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 5
            }
        }
    });


    /************************************************************************************ SEARCH TOGGLE STARTS */


    var $searchlink = $('#searchlink');

    /** on click effect**/
    $searchlink.on('click', function(e) {
        var target = e ? e.target : window.event.srcElement;

        if ($(target).attr('id') == 'searchlink') {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(this).addClass('open');
            }
        }
    });

    /************************************************************************************ SEARCH TOGGLE ENDS */


    /************************************************************************************ CAROUSEL ENDS */


    $('[data-toggle="tooltip"]').tooltip();




    /************************************************************************************ TO TOP STARTS */

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /************************************************************************************ TO TOP ENDS */

    /************************************************************************************ STICKY NAVIGATION STARTS */

    $("#navigation").sticky({
        topSpacing: 0
    });

    /************************************************************************************ STICKY NAVIGATION ENDS */

    /************************************************************************************ FITVID STARTS */

    $(".fitvid").fitVids();

    /************************************************************************************ FITVID ENDS */

    /************************************************************************************ MAGNIFIC POPUP STARTS */

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        /*disableOn: 700,*/
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }

    });

    $('.image-popup-fit-width').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        image: {
            verticalFit: false
        }
    });

    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });

    $('.simple-ajax-popup-align-top').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
    });

    $('.simple-ajax-popup').magnificPopup({
        type: 'ajax'
    });


    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
        }
    });


    /************************************************************************************ MAGNIFIC POPUP ENDS */

    /************************************************************************************ FAQ STARTS */

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator2")
            .toggleClass('fa-plus fa-minus');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);


    $('.panel-collapse').on('show.bs.collapse', function() {
        $(this).prev('.panel-heading').find('.panel-title').addClass("active-panel");
    });

    $('.panel-collapse').on('hide.bs.collapse', function() {
        $(this).prev('.panel-heading').find('.panel-title').removeClass("active-panel");
    });

    /************************************************************************************ FAQ ENDS */

    /************************************************************************************ OVERLAY NAVIGATION ENDS */

    function init() {
        window.addEventListener('scroll', function(e) {
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 90,
                nav = document.querySelector("nav");
            if (distanceY > shrinkOn) {
                classie.add(nav, "smaller");
            } else {
                if (classie.has(nav, "smaller")) {
                    classie.remove(nav, "smaller");
                }
            }
        });
    }
    window.onload = init();

    /************************************************************************************ OVERLAY NAVIGATION ENDS */

    /************************************************************************************ REMOVE CLASSES STARTS */

    var win = $(this);

    if ($(window).width() < 991) {

        $('.row.no-gutter').removeClass('no-gutter-4');
        $('.row.no-gutter').removeClass('no-gutter-5');
        $('.row.no-gutter').removeClass('no-gutter-6');

    } else {

        $('.row.no-gutter').addClass('no-gutter-4');
        $('.row.no-gutter').addClass('no-gutter-5');
        $('.row.no-gutter').addClass('no-gutter-6');
    }


    $(window).resize(function() {
		
        if ($(window).width() < 991) {
            //do whatever you want
            $('.row.no-gutter').removeClass('no-gutter-4');
            $('.row.no-gutter').removeClass('no-gutter-5');
            $('.row.no-gutter').removeClass('no-gutter-6');

        } else {

            $('.row.no-gutter').addClass('no-gutter-4');
            $('.row.no-gutter').addClass('no-gutter-5');
            $('.row.no-gutter').addClass('no-gutter-6');
        }
    });

    /************************************************************************************ REMOVE CLASSES ENDS */

}); //