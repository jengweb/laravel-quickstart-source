import { scrollbar as MainScrollbar, smoothScrollbar as SmoothScrollInit} from './main';
let STICKY_SELECTOR  = '[data-sticky]';
let STICKY_CONTENT_SELECTOR = '[data-sticky-content]';
let STICKY_SIDEBAR_SELECTOR = '[data-sticky-sidebar]';
let HEADER_SELECTOR =  'header';
let sidebarLeft = 0;
let sidebarHeight = 0;
let sidebarTrigger = 0;
let contentHeight = 0;

const resize = () => {
    $(STICKY_SELECTOR).each(function() {
        var sticky = $(this);
        var stickySidebar = sticky.find($(STICKY_SIDEBAR_SELECTOR));
        var stickyContent = sticky.find($(STICKY_CONTENT_SELECTOR));
        if(!stickySidebar.length) return;

        // sidebarTrigger = stickySidebar.siblings().offset().top;
        sidebarTrigger = MainScrollbar.targets.content.children.sticky.offsetTop - $(HEADER_SELECTOR).outerHeight();
        sidebarLeft = $(window).width() - stickySidebar.width();

        // sticky.data('sidebarTrigger', stickySidebar.siblings().offset().top - sticky.data('sidebarLeft', $(window).width()- stickySidebar.width()));
        
        if(stickySidebar.css('position') != 'relative') {
            stickySidebar.css({
                left: sidebarLeft
            })
        }
        stickySidebar.css({
            height: 'auto'
        })
        sidebarHeight = stickySidebar.height();
        contentHeight = stickyContent.outerHeight();
        stickySidebar.css({
            height: sidebarHeight
        })
    })
}

const sticky = () => {
    $(STICKY_SELECTOR).each(function() {
        var sticky = $(this);
        var stickyContent = sticky.find($(STICKY_CONTENT_SELECTOR));
        var stickySidebar = sticky.find($(STICKY_SIDEBAR_SELECTOR));
        if(!stickySidebar.length) return;

        sidebarTrigger = MainScrollbar.targets.content.children.sticky.offsetTop - $(HEADER_SELECTOR).outerHeight();
        sidebarLeft = $(window).width() - stickySidebar.width();
        MainScrollbar.addListener(function (status) {
            stickySidebar.css({
                height: 'auto'
            });
            sidebarHeight = stickySidebar.height();
            contentHeight = stickyContent.outerHeight();
            if (stickySidebar.length > 0) {
                if (contentHeight > sidebarHeight) {
                    var scrollTop = MainScrollbar.scrollTop;
                    if (sidebarTrigger < scrollTop) {
                        stickySidebar.css({
                            position: 'fixed',
                            left: sidebarLeft,
                            top: status.offset.y + $(HEADER_SELECTOR).outerHeight(),
                            bottom: 'auto',
                            height: sidebarHeight,
                            'min-height': sidebarHeight
                        });
                        stickyContent.css({
                            'min-height': sidebarHeight
                        });
                        // console.log('fixed');

                        var sidebarBottom = stickySidebar.offset().top + sidebarHeight;
                        var stickyStop = stickyContent.offset().top + stickyContent.outerHeight();
                        if (stickyStop < sidebarBottom) {
                            stickySidebar.css({
                                position: 'absolute',
                                left: sidebarLeft,
                                top: 'auto',
                                bottom: 0,
                                height: sidebarHeight,
                                'min-height': sidebarHeight
                            });
                            stickyContent.css({
                                'min-height': sidebarHeight
                            });
                        }
                    } else {
                        stickySidebar.css({
                            position: 'relative',
                            left: 'auto',
                            top: 'auto',
                            bottom: 'auto',
                            height: sidebarHeight,
                            'min-height': sidebarHeight
                        });
                        stickyContent.css({
                            'min-height': sidebarHeight
                        });
                    }
                }
            }
        })
    })

}


const init = () => {
    if(!Modernizr.touchevents && !Modernizr.ie) {
        sticky();
        $(window).resize(function() {
            resize();
        })
    }

};

export { init };
