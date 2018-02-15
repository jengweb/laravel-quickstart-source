/* === Application's main css and js vendors file === */
import '../sass/main.scss';
import './bootstrap.js';


/* === Import modules to init when the page initialized === */
import { init as MainInit, smoothScrollbar as SmoothScrollInit} from './modules/main';
import { init as BookingInit} from './modules/booking';
import { init as MenuInit} from './modules/menu';
import { init as CarouselInit, calcHeroHeight as calcHeroInit} from './modules/carousel';
import { init as WeatherInit} from './modules/weather';
import { init as filterInit} from './modules/filter';
import { init as guestReviewInit} from './modules/guest-review';
import { init as mapInit, initMap as startMap} from './modules/map';
import { init as stickyInit } from './modules/sticky';
import { init as parallaxInit } from './modules/parallax';
import { init as widgetInit } from './modules/instagram';
import { init as loaderInit } from './modules/loader';
import { init as reservationInit } from './modules/reservation';
import { init as cookieInit } from './modules/cookie';

window.initFilter = filterInit;
window.initMap = mapInit;
window.startMap = startMap;
window.initLoader = loaderInit;
window.initReservation = reservationInit;
window.initWeather = WeatherInit;
window.initGuestReview = guestReviewInit;

const WebFont = require('webfontloader');

/* === Initilize function === */
const initApp = () => {
	// Remove web loader
	window.scrollTo(0, 1);

	/* First, init the modules that requires for functional when page loaded
	* e.g. carousel, masonry, parallax etc. 
	* Since these modules may not be required for every page,
	* you can check if it's the page you want before calling the method */
	MainInit();
	cookieInit();
	SmoothScrollInit();
	MenuInit();
	CarouselInit();
	BookingInit();
	stickyInit();
	parallaxInit();
	widgetInit();

	/* Then, check if there is any window.initPage was declared in the specified page.
		* If there is, run the specific page scripts via window.initPage() */
	if (typeof window.initPage === 'function') {
		window.initPage(window);
	}
};
/* === Load font === */
window.onload = () => {
	WebFont.load({
		google: {
			families: ['Roboto:300,400,700']
		},
		active: () => {
			initApp();
		}
	});
};
