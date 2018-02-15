import * as axios from 'axios';
import * as _ from 'lodash';
import * as $ from 'jquery';

require('imports-loader?this=>window!../vendors/modernizr.js');
require('imports-loader?this=>window!../vendors/detectizr.min.js');
// Don't need to change these, these are the one we use quite often
window._ = _;

window.$ = window.jQuery = $;

// Your jQuery plugin is here

window.Scrollbar = require('imports-loader?$=jquery!../../node_modules/smooth-scrollbar/dist/smooth-scrollbar.js');
window.Masonry = require('imports-loader?$=jquery!../../node_modules/masonry-layout/dist/masonry.pkgd.min.js');
window.Isotope = require('imports-loader?$=jquery!../../node_modules/isotope-layout/dist/isotope.pkgd.js');
window.moment = require('imports-loader?$=jquery!../../node_modules/moment/moment.js');
window.momenttimezone = require('imports-loader?$=jquery!../../node_modules/moment-timezone/builds/moment-timezone-with-data-2012-2022.js');
window.slick = require('imports-loader?$=jquery!../vendors/slick.js');
window.jarallax = require('jarallax');
window.imagesLoaded = require('imports-loader?$=jquery!../../node_modules/imagesloaded/imagesloaded.js');
window.verge = require('verge');
window.fancybox = require('imports-loader?$=jquery!../../node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js');

require('imports-loader?$=jquery!../../node_modules/foundation-sites/dist/js/foundation.min.js');
require('imports-loader?$=jquery!../../node_modules/tablesaw/dist/tablesaw.jquery.js');
require('imports-loader?$=jquery!../vendors/jquery-ui-1.12.1/jquery-ui.js');
require('imports-loader?$=jquery!../vendors/jquery.selectBoxIt.js/jquery.selectBoxIt.js');
require('imports-loader?$=jquery!../../node_modules/jquery-validation/dist/jquery.validate.min.js');
require('imports-loader?$=jquery!../vendors/jquery.resizestop.min.js');
require('../vendors/ls.object-fit.min.js');
require('../../node_modules/lazysizes/lazysizes.js');
require('../vendors/ls.parent-fit.min.js');
require('../vendors/ls.respimg.min.js');
require('../vendors/ls.bgset.min.js');
require('videojs-youtube');
require("../../node_modules/gsap/EasePack.js");
require("../../node_modules/gsap/TimelineMax.js");
require("../../node_modules/gsap/TweenMax.js");
window.videojs = require('imports-loader?$=jquery!../../node_modules/video.js/dist/video.min.js');

// ========= Ignore below code, it's for the Laravel system ==========
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
