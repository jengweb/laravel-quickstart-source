import { calcHeroHeight as calcHeroInit} from './carousel';
const cookiebar = () => {

    $(".link-cookie").click(function (e) {
        e.preventDefault();
        // localStorage.setItem("makati-cookie", "true");
        // $(".cookie-notification-bar").remove();
        removeCookieBar();
        calcHeroInit();
        // $("body").removeClass("has-cookie");
        // $('header').removeAttr("style");
    });

    $("#btnConfirmCookie").click(function() {
        removeCookieBar();
    });

    if (!localStorage.getItem("makati-cookie")) {
        $("body").addClass("cookie-notify notify-open");
    }else{
        removeCookieBar();
    }
}
const removeCookieBar = () => {
        localStorage.setItem("makati-cookie", "true");
        $(".cookie-notification-bar").remove();
        $("body").removeClass("cookie-notify notify-open");
}
const init = () => {
    cookiebar();
}
export { init }