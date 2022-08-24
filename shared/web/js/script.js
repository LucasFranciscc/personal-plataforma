(function($) {

    "use strict";

    /* ================ Revolution Slider. ================ */
    if ($('.tp-banner').length > 0) {
        $('.tp-banner').show().revolution({
            delay: 6000,
            startheight: 650,
            startwidth: 1170,
            hideThumbs: 1000,
            navigationType: 'none',
            touchenabled: 'on',
            onHoverStop: 'on',
            navOffsetHorizontal: 0,
            navOffsetVertical: 0,
            dottedOverlay: 'none',
            fullWidth: 'on'
        });
    }
    if ($('.tp-banner-full').length > 0) {
        $('.tp-banner-full').show().revolution({
            delay: 6000,
            hideThumbs: 1000,
            navigationType: 'none',
            touchenabled: 'on',
            onHoverStop: 'on',
            navOffsetHorizontal: 0,
            navOffsetVertical: 0,
            dottedOverlay: 'none',
            fullScreen: 'on'
        });
    }

/* ================ Nav ================ */
	$('.fa-caret-down').click(function(e){
      e.preventDefault();
      $(this).next().slideToggle('');
	});



    /* ================ Sortable Masonary with Filters ================ */
    function enableMasonry() {
        if ($('.sortable-masonry').length) {
            var winDow = $(window);
            // Needed variables
            var $container = $('.sortable-masonry .items-container');
            var $filter = $('.filter-btns');
            $container.isotope({
                filter: '*',
                masonry: {
                    columnWidth: 0
                },
                animationOptions: {
                    duration: 1000,
                    easing: 'linear'
                }
            });

            /* ================ Isotope Filter ================ */
            $filter.find('li').on('click', function() {
                var selector = $(this).attr('data-filter');

                try {
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 1000,
                            easing: 'linear',
                            queue: false
                        }
                    });
                } catch (err) {

                }
                return false;
            });

            winDow.bind('resize', function() {
                var selector = $filter.find('li.active').attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 1000,
                        easing: 'linear',
                        queue: false
                    }
                });
            });

            var filterItemA = $('.filter-btns li');
            filterItemA.on('click', function() {
                var $this = $(this);
                if (!$this.hasClass('active')) {
                    filterItemA.removeClass('active');
                    $this.addClass('active');
                }
            });
        }
    }

    enableMasonry();

    /* ================ Logos ================ */
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                700: {
                    items: 2,
                    nav: true
                },
                1170: {
                    items: 3,
                    nav: true
                }
            }
        });

    });

    /* ================ Counter ================ */
    $('.counter-item').appear(function() {
        $('.counter-number').countTo();
    });

    /* ================ sticky fix ================ */
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 0) {
            $('.header').addClass("sticky");
        } else {
            $('.header').removeClass("sticky");
        }

        //Check to see if the window is top if not then display button
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }

        //Click event to scroll to top
        $('.scrollToTop').on("click", function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

    });

    /*=============== Smoothscroll ================*/
    $('#home a, .custom-navbar a').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 49
        }, 1000);
        event.preventDefault();
    });


})(jQuery);