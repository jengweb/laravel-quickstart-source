let scrollbar;
let imgLoad;
const smoothScrollbar = () => {
	if (!Modernizr.touchevents && !Modernizr.ie) {
		scrollbar = Scrollbar.init(document.getElementById('wrapper'), {
			speed: .5,
			damping: 0.05,
			continuousScrolling: false,
			syncCallbacks: !0,
			overscrollEffect: 'bounc'
		});
	}
	// if(Modernizr.ie) {
	// 	scrollbar = Scrollbar.init(document.getElementById('wrapper'), {
	// 		speed: 10,
	// 		damping: 15,
	// 		overscrollEffect: 'bounc'
    //
	// 	});
	// }
}

const AddMarginPage = () => {
	$(window).on('resizestop',50, function () {
		var headerH = $('header').outerHeight();
		if (!Modernizr.touchevents) {
			if ($('#wrapper').attr('data-type') == 'no-hero') {
				if (Modernizr.ie) {
					$('#wrapper').css('padding-top', headerH);
				} else {
					$('.scroll-content').css('padding-top', headerH);
				}
			}
		} else {
			if ($('#wrapper').attr('data-type') == 'no-hero') {
				$('#wrapper').css('padding-top', headerH);
			}
		}
	})
}

const hideBooking = () => {
	var hasHero = $('#wrapper').children('.hero-section').length,
		booking = $('#booking');
	$(window).on('resizestop',100, function () {
		if(verge.viewportW() >= 1024) {
			if(hasHero > 0) {
				booking.show();
			} else {
				booking.hide();
			}
		}
	}).trigger('resizestop');
}

const videoPlayer = () => {
	$(".video-js").each(function () {
		var video_id = $(this).attr('id');
		var button = $(this).closest('.article-image').find('.btn-vdo');
		var player = videojs($(this).get(0));
		$(button).on("click", function (e) {
			button.parent('.video-cover ').addClass('hidden');
			player.ready(function () {
				player.play();
			});
		});
		player.on('ended', function(data) {
			$(".video-cover").removeClass('hidden', function () {
				player.trigger('loadstart');
			});
		});

	})
}

const discover = () => {
	var headerH;
	$(window).on('resizestop',50, function () {
		headerH = $('header').outerHeight();
	}).trigger('resizestop');

	if($('#wrapper').find('.hero-section').length) {
		var target;
		$(window).on("resizestop", 50, function () {
			target = $('.anchor').parent().next().offset().top - headerH;
		}).trigger('resizestop');

		$('.anchor').click(function() {
			if(!Modernizr.touchevents && !Modernizr.ie) {
				scrollbar.scrollTo(100, target, 1200);
			} else {
				$('html, body').stop().animate({
					scrollTop: target
				}, 800);
			}
		})
	}
}

const init = () => {
	AddMarginPage();
	hideBooking();
	videoPlayer();
	discover();
	// pageSetup();
	/* Select menu -- Jquery Ui */

	$('.booking-form select, .main-form select').selectBoxIt({
		autoWidth: false,
		downArrowIcon: 'icon-dropdown',
	});

	var imgLoad = imagesLoaded('#wrapper');
	imgLoad.on('always',function() {
		setTimeout(function () {
			$('[data-equalizer]').foundation();
		},100)

	});

	$("[data-fancybox]").fancybox({
		animationDuration : 500,
		animationEffect: "zoom",
		clickSlide : false,
		touch: {
			vertical : false
		},
		buttons: ['close'],
		btnTpl: {
			smallBtn : '<div data-fancybox-close class="box-close fancybox-button--close" title="{{CLOSE}}"><span></span> <span></span></div>',
		},
	});
	$(document).trigger( "enhance.tablesaw" );
	
};

export { init ,smoothScrollbar, scrollbar, imgLoad};
