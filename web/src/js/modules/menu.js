import { scrollbar as MainScrollbar, smoothScrollbar as SmoothScrollInit} from './main';
var $toggle = $('.toggle'), imgsrc, windowW;

const mbMenu = () => {
    $toggle.click(function (e) {
        var $data = $(this).attr('data-toggle'),
            $panel = $('#'+$data),
            isBooking = $data == 'booking' ;

        if(isBooking) {
            if(!$(this).hasClass('active') && !$(this).parent().hasClass('active')) {
                $(this).find('span').text('Close X');
                $(this).addClass('active');
                $(this).parent().addClass('active');
            } else {
                $(this).find('span').text('Book now');
                $(this).removeClass('active');
                $(this).parent().removeClass('active');
            }
        } else {
            if(!$(this).hasClass('active') && !$panel.hasClass('active')) {
                $(this).addClass('active');
                $panel.addClass('active');

            } else {
                $toggle.removeClass('active');
                $panel.removeClass('active');
            }
        }
    })
}

const calSubMenuPosition = () => {
    $(window).on('resizestop',100, function () {
        windowW = $(window).outerWidth();
        var navigation = $('#navigation').outerWidth();
        $('.main-nav li.has-child').mouseover(function () {
            var position = $(this).position(),
                position = position.left,
                elementW = $(this).outerWidth(),
                subMenuW = $('.sub-menu').outerWidth();

            if((navigation - position) < subMenuW) {
                $(this).find('.sub-menu').css('left', (position + elementW) - subMenuW);
            } else {
                $(this).find('.sub-menu').css('left', position);
            }
        })
    }).trigger('resizestop');
}

const changeMenuImage = () => {
    $('.sub-menu li').removeClass('focus');
    if($('.sub-menu li').hasClass('active')) {
        imgsrc = $(this).attr('data-image');
        $(this).closest('.sub-menu').find('.image-menu-list .image img').attr('src',imgsrc);
        $(this).addClass('focus');
    } else {
        $('.sub-menu li:first-child').addClass('focus');
    }

    $('.sub-menu li a').mouseover(function() {
        var $parent = $(this).parent();
        imgsrc = $parent.attr('data-image');
        if(!$parent.hasClass('focus')) {
            $(this).closest('.sub-menu').find('li').removeClass('focus');
            $(this).closest('.sub-menu').find('.image-menu-list .image img').stop().animate({
                opacity: 0}, function () {
                $(this).attr('src',imgsrc).stop().animate({opacity: 1},100, "linear");
                $($parent).addClass('focus');
            });
        }
    })
}

const language = () => {
    var languageBar = $('#language_bar .language-text'),
        languageList = $('#language_bar .language-item'),
        item = languageList.find('li'),
        textBox = languageBar.find('.language-name');

    var itemActive = languageList.find('li.active');

    if($('#language_bar .language-item li').hasClass('active')) {
        textBox.text(itemActive.find('.name').text());
        languageBar.children('[data-icon]').removeAttr('class').addClass(itemActive.find('[data-icon]').attr('class'));
    } else {
        textBox.text($('#language_bar .language-item li:first-child').find('.name').text());
        languageBar.children('[data-icon]').removeAttr('class').addClass($('#language_bar .language-item li:first-child').find('[data-icon]').attr('class'));
    }

    languageBar.on('click', function() {
        if(!$(this).parent().hasClass('active')) {
            languageList.stop().slideDown();
            $(this).parent().addClass('active');
        } else {
            languageList.stop().slideUp();
            $(this).parent().removeClass('active');
        }
    });

    item.on('click', function() {
        languageList.find('li').removeClass('active');
        var $this = $(this),
            value = $this.find('.name').text(),
            icon = $this.find('[data-icon]').attr('class');

        textBox.text(value);
        languageBar.children('[data-icon]').removeAttr('class').addClass(icon);
        $this.addClass('active');
        if(languageBar.parent().hasClass('active')) {
            languageList.stop().slideUp();
            languageBar.parent().removeClass('active');
        }
    })

    if(!Modernizr.touchevents && !Modernizr.ie) {
        MainScrollbar.addListener(function (status) {
            languageList.stop().slideUp();
            languageBar.parent().removeClass('active');
        });
    } else {
        $(window).scroll(function () {
            languageList.stop().slideUp();
            languageBar.parent().removeClass('active');
        })
    }

    $(window).on("click", function (e) {
        var container = $('#language_bar');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            languageList.stop().slideUp();
            languageBar.parent().removeClass('active');
        }
    })
}


const init = () => {
    mbMenu();
    calSubMenuPosition();
    changeMenuImage();
    language();
};

export { init };
