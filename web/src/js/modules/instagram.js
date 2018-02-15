let ACCESS_TOKEN = $('div.widget').data('token');
const instagramWidget = () => {
    $.getJSON('https://api.instagram.com/v1/users/self/media/recent/?access_token=' + ACCESS_TOKEN + '&callback=?', function (insta) {
        $.each(insta.data, function (photos, src) {
            if (photos === 4) {
                return false;
            }
            $('<div class="item">' +
                '<div class="image">' +
                '<img  class="imagecontainer-img lazyload" data-src="' + src.images.standard_resolution.url + '"></div>' +
                '<div class="social-icon"><i class="fa fa-instagram"></i></div><a href="' + src.link + '"  target="_blank" class="social-list"></a>' +
                '</div>').appendTo('.widget');
        });
    });
}

const init = () => {
    instagramWidget();
}

export {init}