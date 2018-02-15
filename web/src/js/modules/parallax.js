import { scrollbar as MainScrollbar, smoothScrollbar as SmoothScrollInit} from './main';

window.requestAnimFrame = (function () {
  return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    window.msRequestAnimationFrame ||
    function (callback) {
      window.setTimeout(callback, 1000 / 60);
    };
})();

const scrollParallaxInit = () => {
  var scrollElements = $('.scroll-parallax');
  scrollElements.each(function () {
    var level = $(this).attr('data-level');
    if (level == undefined) {
      var level = $(this).css('zIndex');
      if (level == 'auto')
        level = 0.7;

      if (level > 5)
        level = 5;

      $(this).attr('data-level', level);
    } else if (level == 'rand') {
      level = Math.random();

      $(this).attr('data-level', level);
    }
  });

  scrollParallaxResize();
}

const scrollParallaxResize = () => {
  if (!Modernizr.touchevents && !Modernizr.ie) {
    $('.scroll-parallax').each(function () {
      var element = $(this);
      var transform = element.css('transform');
      element.css({ transform: '' });

      element.attr('data-top', element.offset().top);
      element.attr('data-bottom', element.offset().top + element.outerHeight());
      element.attr('data-start', element.offset().top - $(window).height());
      element.attr('data-stop', element.offset().top + element.outerHeight());

      element.css({ transform: transform });
    });
  }
}

const smoothScrollMove = () => {
  // Selectors
  var container = $('.scroll-content');
  var windowHeight = $(window).height();
  var windowScrollTop = MainScrollbar.scrollTop;
  var destY = windowScrollTop;
  var currentY = -getTranslateY(container);


  // Move parallax
  var scrollElements = $('.scroll-parallax');
  if (scrollElements != null) {
    scrollElements.each(function () {
      var element = $(this);
      var offsetTop = element.attr('data-top');
      var offsetBottom = element.attr('data-bottom');

      var level = Number(element.attr('data-level'));
      var amplitude = -windowHeight;
      var movement = amplitude / (5 / level);

      if (offsetTop > (windowScrollTop + (windowHeight * 1.3))) {
        element.css({ transform: 'translate3d(0, ' + (-movement * 0.5) + 'px, 0)' });
      } else if (offsetBottom < (windowScrollTop * 0.7)) {
        element.css({ transform: 'translate3d(0, ' + (movement * 0.5) + 'px, 0)' });
      } else {
        var start = element.attr('data-start');
        var stop = element.attr('data-stop');
        var percent = (windowScrollTop - start) / (stop - start);
        percent = percent - 0.5;

        var destY = movement * percent;

        var currentY = 0;
        var transform = element.css('transform');
        if (transform != 'none')
          currentY = parseFloat(element.css('transform').split(',')[5]);

        // console.log(currentY);
        // console.log(destY);
        if (level > 0)
          var newY = currentY + ((destY - currentY) * 0.1);
        else
          var newY = currentY + ((destY - currentY) * 0.5);

        element.css({ transform: 'translate3d(0, ' + (newY) + 'px, 0)' });

      }
    });
  }
  requestAnimFrame(smoothScrollMove);
}

const getTranslateY = (element) => {
  // Get style
  var style = window.getComputedStyle(element.get(0));

  // Get matrix
  var matrix = style.getPropertyValue("-webkit-transform") ||
      style.getPropertyValue("-moz-transform") ||
      style.getPropertyValue("-ms-transform") ||
      style.getPropertyValue("-o-transform") ||
      style.getPropertyValue("transform");

  if (matrix === 'none') {
    matrix = 'matrix(0,0,0,0,0)';
  }
  var values = matrix.match(/([-+]?[\d\.]+)/g);

  return values[14] || values[5] || 0;
}

const init = () => {
  if (!Modernizr.touchevents && !Modernizr.ie) {
    setTimeout(function () {
      scrollParallaxInit();
      requestAnimFrame(smoothScrollMove);
    }, 100)

  }


  $(window).on("resizestop", 50, function () {
    scrollParallaxResize();
  }).trigger('resizestop');
}
export { init };