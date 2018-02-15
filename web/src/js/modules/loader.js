const loader = () => {
    /* Loader */
    var loaderWrapper = $('.loader-wrapper'),
        innerWrapper = $('.inner'),
        percentageBox = $('.percentage-box'),
        percentage = $('.percentage-box .percentage'),
        logo = $('.loader-wrapper .logo');

    var loader = {
        init: function () {
            var tl = new TimelineMax({
                onComplete: loader.hideLoader
            });
            // tl.pause();
            TweenMax.fromTo(logo, .5, {autoAlpha: 0},{autoAlpha: 1 ,ease:Quad.easeInOut});
            TweenMax.fromTo(percentageBox, .5, {autoAlpha: 0},{autoAlpha: 1,ease:Quad.easeInOut})
            tl.to(percentage, 3, {
                attr: {
                    ariaValuenow: 100
                },
                ease: Expo.easeOut,
                onUpdateParams: ['{self}'],
                onUpdate: function(tl) {
                    var p = tl.progress() * 100 >> 0;
                    $('.percentage').html(p+"%");
                }
            }, 0.1)
            tl.play();

        },
        hideLoader: function () {
            var tl = new TimelineMax();
            tl.pause();

            tl.to(logo, .5, {autoAlpha: 0 ,ease:Quad.easeInOut}, 0.2);
            tl.to(percentageBox, .5,  {autoAlpha: 0 ,ease:Quad.easeInOut}, 0.2);
            tl.play();

            TweenMax.to(innerWrapper, 0.5, {x: '100%', delay: 0.7, ease:Quad.easeInOut});
            TweenMax.to(loaderWrapper, 0.5, {x: '100%', delay: 1, ease:Quad.easeInOut});
        }
    }
    loader.init();
    /* End Loader */
}

const init = () => {
    loader();
}

export { init }