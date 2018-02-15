var prevArrow = '<div class="slide-prev"></div>',
    nextArrow = '<div class="slide-next"></div>',
    slide_nav_class = '.slide-nav',
    slide_dots_class = '.slide-dots';

const calcHeroHeight = () => {
    $(window).on('resizestop',50, function () {
        var windowHeight = $(window).outerHeight(),
            hero_selector = $('.hero-section'),
            headerHeight = $('#header').outerHeight(),
            cookieHeight = $('.cookie-notification-bar').outerHeight(),
            bookingHeight = $('#wrapper .booking-section').outerHeight();
        if (verge.viewportW() >= 1280) {
            var  heroHeight = windowHeight - headerHeight - bookingHeight;
            hero_selector.css({
                'margin-top': headerHeight,
                'margin-bottom': bookingHeight,
                'height': heroHeight
            })
        }
        else if (verge.viewportW() >= 1024) {
            var bookingHeight = $('body > .booking-section .booking-toggle').outerHeight();
            var  heroHeight = windowHeight - headerHeight - bookingHeight;
            hero_selector.css({
                'margin-top': headerHeight,
                'margin-bottom': 0,
                'height': heroHeight
            })
        }
        else {
            var  heroHeight = windowHeight - headerHeight;
            hero_selector.css({
                'margin-top': headerHeight,
                'margin-bottom': 0,
                'height': heroHeight
            })
        }
    }).trigger('resizestop')
};

const hero = () => {
    var $hero = $('#hero');
    $hero.slick({
        dots: false,
        slidesToShow: 1,
        infinite: true,
        fade: true,
        arrow: true,
        autoplay: true,
        autoplaySpeed: 5000,
        appendArrows: $hero.parent().find(slide_nav_class),
        prevArrow: prevArrow,
        nextArrow: nextArrow
    })
}

const content_slider = () => {
    $('.content-slider').each(function(index) {
        var id = $(this).attr('id');
        if (!id) {
            id = "content_slider_" + (index + 1);
            $(this).attr('id', id);
        }
        var $carousel = $('#' + id);

        $carousel.slick({
            slidesToShow: 1,
            infinite: true,
            fade: true,
            dots: true,
            appendDots: $carousel.siblings(slide_dots_class),
            dotsClass: 'dots',
            arrows: true,
            appendArrows: $carousel.siblings(slide_nav_class),
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        fade: false
                    }
                }
            ]
        })
    });
}

const content_block_slider = () => {
    $('.content-block-slider').each(function(index) {
        var id = $(this).attr('id');
        if (!id) {
            id = "content_block_slider_" + (index + 1);
            $(this).attr('id', id);
        }
        var $carousel = $('#' + id);

        $carousel.slick({
            slidesToShow: 3,
            infinite: true,
            dots: true,
            appendDots: $carousel.siblings(slide_dots_class),
            dotsClass: 'dots',
            arrows: true,
            appendArrows: $carousel.siblings(slide_nav_class),
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            responsive: [
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        })
    });
}

const ihg_slider = () => {
    $('#ihg_group_slider').slick({
        slidesToShow: 3,
        dots: false,
        appendDots: $('#ihg_group_slider').siblings(slide_dots_class),
        dotsClass: 'dots',
        arrows: false,
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                }
            }
        ]
    })

}

const init = () => {
    calcHeroHeight();
    hero();
    content_slider();
    content_block_slider();
    ihg_slider();
};

export { init , calcHeroHeight};
