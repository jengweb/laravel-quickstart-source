import { scrollbar as MainScrollbar, smoothScrollbar as SmoothScrollInit} from './main';
let BOOKING_SELECTOR;
var DATA_ATTR = $('#wrapper').attr('data-type');
const bookingId = () => {
    $('.booking-section').each(function (idx) {
        var id = $(this).attr('id');
        if (!id) {
            id = "booking_" + (idx + 1);
            $(this).attr('id', id);
        }
        BOOKING_SELECTOR = $('#' + id);
    })
}
const closeBooking = () => {
    $(BOOKING_SELECTOR).removeClass('active');
    $('.booking-toggle').removeClass('active');
    $('.booking-toggle span').text('Book now');
}

const clickToClose = () => {
    $(window).on("click.booking-toggle", function (e) {
        if (!$(e.target).hasClass("active") && $(e.target).closest(".active").length === 0 && !$(e.target).hasClass('ui-datepicker')
            && $(e.target).closest(".ui-datepicker-header").length === 0 && $(e.target).closest('.ui-datepicker-calendar').length === 0) {
            closeBooking();
        }
    })
}

const booking = () => {
    $('.booking-section').each(function (idx) {
        var id = $(this).attr('id');
        var checkout = $('#'+id + ' .datepicker.checkout').attr('id',id+'_checkOut');
        var checkin = $('#'+id + ' .datepicker.checkin').attr('id',id+'_checkIn')
            .datepicker({
                dateFormat: "dd.mm.yy",
                minDate: moment().add(0, 'd').toDate(),
                startDate: new Date(),
                dayNamesMin: [ "S", "M", "T", "W", "Th", "F", "S" ],
                onSelect: function(ev){
                    var newDate = new Date(ev.date),
                        checkout_date = moment(moment(ev, "DD.MM.YYYY").add(1, 'd').format("DD.MM.YYYY"), "DD.MM.YYYY").toDate()
                    newDate.setDate(newDate.getDate() + 1);

                    checkout.datepicker('option','minDate', checkout_date);
                    checkout.datepicker('setDate',checkout_date);
                    checkin.datepicker('hide');
                    setTimeout(function() {
                        checkout.datepicker('show');
                    },100)

                },
                beforeShow: function (input, inst) {
                    if ($(window).innerHeight() <= 375) {
                        setTimeout(function () {
                            inst.dpDiv.css({
                                'top': '50%',
                                'transform': 'translateY(-50%)'
                            });
                        },0)

                    }
                }
            })
            .on('show', function() {
                checkout.datepicker('hide');
            });

        checkout
            .datepicker({
                dateFormat: "dd.mm.yy",
                dayNamesMin: [ "S", "M", "T", "W", "Th", "F", "S" ],
                minDate: moment().add(1, 'd').toDate(),
                beforeShow: function (input, inst) {
                    if ($(window).innerHeight() <= 375) {
                        setTimeout(function () {
                            inst.dpDiv.css({
                                'top': '50%',
                                'transform': 'translateY(-50%)'
                            });
                        },0)

                    }
                }
            })
            .on('changeDate', function(ev){
                checkin.datepicker('hide');
            })
            .on('show', function() {
                checkin.datepicker('hide');
            });
    })

}

const bookingOffers = () => {
    $('#offers_booking').each(function() {
        var checkout = $('#offers_booking .datepicker.checkout').attr('id','offer_checkout');
        var checkin = $('#offers_booking .datepicker.checkin').attr('id','offer_checkin')
            .datepicker({
                dateFormat: "dd.mm.yy",
                minDate: moment().add(0, 'd').toDate(),
                startDate: new Date(),
                dayNamesMin: [ "S", "M", "T", "W", "Th", "F", "S" ],
                onSelect: function(ev){
                    var newDate = new Date(ev.date),
                        checkout_date = moment(moment(ev, "DD.MM.YYYY").add(1, 'd').format("DD.MM.YYYY"), "DD.MM.YYYY").toDate()
                    newDate.setDate(newDate.getDate() + 1);

                    checkout.datepicker('option','minDate', checkout_date);
                    checkout.datepicker('setDate',checkout_date);
                    checkin.datepicker('hide');
                    setTimeout(function() {
                        checkout.datepicker('show');
                    },100)

                },
                beforeShow: function (input, inst) {
                    if ($(window).innerHeight() <= 375) {
                        setTimeout(function () {
                            inst.dpDiv.css({
                                'top': '50%',
                                'transform': 'translateY(-50%)'
                            });
                        },0)

                    }
                }
            })
            .on('show', function() {
                checkout.datepicker('hide');
            });

        checkout
            .datepicker({
                dateFormat: "dd.mm.yy",
                dayNamesMin: [ "S", "M", "T", "W", "Th", "F", "S" ],
                minDate: moment().add(1, 'd').toDate(),
                beforeShow: function (input, inst) {
                    if ($(window).innerHeight() <= 375) {
                        setTimeout(function () {
                            inst.dpDiv.css({
                                'top': '50%',
                                'transform': 'translateY(-50%)'
                            });
                        },0)

                    }
                }
            })
            .on('changeDate', function(ev){
                checkin.datepicker('hide');
            })
            .on('show', function() {
                checkin.datepicker('hide');
            });
    })

}

const stickyBooking = () => {
    $(window).on("resizestop", 50, function () {
        var BOOKING_SELECTOR = $('#wrapper .booking-section');
        var BOOKING_TOGGLE_SELECTOR = $('#navigation .booking-toggle');
        var headerHeight = $('header').outerHeight();
        var bookingStickyTop = 0;
        var windowHeight = $(window).outerHeight();
        if (!Modernizr.touchevents) {
            if (verge.viewportW() >= 1280) {
                if(DATA_ATTR == 'no-hero') {
                    BOOKING_TOGGLE_SELECTOR.addClass('show');
                    BOOKING_SELECTOR.css({
                        position: 'fixed',
                        top: bookingStickyTop
                    }).addClass('sticky');
                }
            }
        }
    }).trigger('resizestop');
}


const showBooking = () => {
    $(window).on("resizestop", 50, function () {
        var heroHeight = $('.hero-section').height(),
            headerHeight = $('header').outerHeight(),
            bookingHeight = $('.booking-section').outerHeight(),
            widgetHeight = headerHeight + heroHeight,
            windowHeight = $(window).outerHeight();

        var BOOKING_SELECTOR = $('#wrapper .booking-section');
        var BOOKING_TOGGLE_SELECTOR = $('#navigation .booking-toggle');
        var bookingStickyTop = 0;

        if (!Modernizr.touchevents) {
            if(verge.viewportW() >= 1280) {
                if(!Modernizr.ie) {
                    MainScrollbar.addListener(function (status) {
                        bookingStickyTop = status.offset.y;

                        if (DATA_ATTR == 'no-hero') {
                            BOOKING_SELECTOR.addClass('sticky');

                        } else {
                            if (MainScrollbar.scrollTop > widgetHeight) {
                                BOOKING_TOGGLE_SELECTOR.addClass('show');
                                BOOKING_SELECTOR.css({
                                    position: 'fixed',
                                    top: bookingStickyTop
                                }).addClass('sticky')
                            } else {
                                BOOKING_TOGGLE_SELECTOR.removeClass('show');
                                BOOKING_SELECTOR.css({
                                    position: 'absolute',
                                    top: headerHeight + heroHeight
                                }).removeClass('sticky')
                            }
                        }
                    });
                } else {
                    bookingStickyTop = 0;
                    $(window).scroll(function() {
                        if (DATA_ATTR == 'no-hero') {
                            BOOKING_SELECTOR.css({
                                position: 'fixed',
                                top: bookingStickyTop
                            }).addClass('sticky')

                        } else {
                            if ($(window).scrollTop() > widgetHeight) {
                                BOOKING_TOGGLE_SELECTOR.addClass('show');
                                BOOKING_SELECTOR.addClass('sticky');
                            } else {
                                BOOKING_TOGGLE_SELECTOR.removeClass('show');
                                BOOKING_SELECTOR.removeClass('sticky')
                            }
                        }
                    })
                }
                if (BOOKING_SELECTOR.hasClass('sticky toggle')) {
                    BOOKING_SELECTOR.removeClass('toggle').css('margin-top', '0');
                    BOOKING_TOGGLE_SELECTOR.find('.btn-default').text('book now');
                }

                $(BOOKING_TOGGLE_SELECTOR).off('click').on('click', function () {
                    if (!BOOKING_SELECTOR.hasClass('toggle')) {
                        BOOKING_SELECTOR.addClass('toggle').css('margin-top', headerHeight);
                        $(this).find('.btn-default').text('Close X');
                    } else {
                        BOOKING_SELECTOR.removeClass('toggle').css('margin-top', '0');
                        $(this).find('.btn-default').text('Book now');
                    }
                })
            }
        }

    }).trigger('resizestop');
}

const init = () => {
    bookingId();
    clickToClose();
    showBooking();
    stickyBooking();
    booking();
    bookingOffers();

    $('.reservation-form .datepicker').datepicker({
        dateFormat: "dd.mm.yy",
        minDate: moment().add(0, 'd').toDate(),
        startDate: new Date(),
        dayNamesMin: ["S", "M", "T", "W", "Th", "F", "S"]
    })

    if(!Modernizr.touchevents && !Modernizr.ie) {
        MainScrollbar.addListener(function (status) {
            $('.datepicker').datepicker('hide');
            closeBooking();
        });
    } else if(Modernizr.ie) {
        $(window).scroll(function () {
            $('.datepicker').datepicker('hide');
            closeBooking();
        });
    }
};

export { init };