var $grid, elem = $('#masonry'), _currentPage, _totalPage, currentPage = 1, _totalFilteredItem = 0, _itemPerPage;
const checkItemPerPage = () => {
    var vpw = verge.viewportW();
    if (vpw >= 768) {
        var wrapper = $("#masonry");
        if (wrapper.data("item")) {
            _itemPerPage = parseInt(wrapper.data("item"), 10);
        } else {
            _itemPerPage = 8;
        }
    } else {
        _itemPerPage = 6
    }
}

const showPreviewModal = (itemList, initIndex) => {
    var modal = $(".gallery-preview-modal"), initTitle, totalPreviewImage, initNumber ,previewSliderHtml = '';
    previewSliderHtml = '<div class="slider-preview-wrapper">';
    previewSliderHtml += '<div class="gallery-top">';

    //Slider Item
    previewSliderHtml += '<div class="gallery-slider">';
    $.each(itemList, function (idx, item) {
        if (item.type == 'image') {
            previewSliderHtml += '<div class="item" data-title="'+  item.imageTitle +'">';
            previewSliderHtml += '<div class="img-wrapper">';
            previewSliderHtml += '<img src="' + item.imageUrl + '"/>';
            previewSliderHtml += '</div>';
            previewSliderHtml += '</div>';
        } else {
            previewSliderHtml += '<div class="item">';
            previewSliderHtml += item.videoHtml;
            previewSliderHtml += '</div>';
        }

    });
    previewSliderHtml += '</div>';

    //Prev, Next
    previewSliderHtml += '<div class="slide-nav show-for-large"></div>';

    previewSliderHtml += '</div>';
    previewSliderHtml += '</div>';

    if (modal.length > 0) {
        modal.removeClass("opened closing");
        modal.find(".slider-title").html("");
        modal.find(".slider-item-number").html("");
        modal.find(".box-content-wrapper").removeClass('ready');
        modal.find(".box-content-wrapper").html(previewSliderHtml);
        if (!modal.hasClass("opened") && !modal.hasClass("closing")) {

            initTitle = itemList[initIndex].imageTitle;
            totalPreviewImage = itemList.length;
            modal.find(".slider-title").html(initTitle);
            modal.find(".slider-item-number").html((initIndex + 1) + "/" + totalPreviewImage);

            modal.find(".gallery-slider").attr("id", "dvGalleryPreviewContainer");
            modal.addClass("opened");
            setTimeout(function () {

                $('#dvGalleryPreviewContainer').on('init', function () {
                    modal.find(".box-content-wrapper").addClass('ready');
                })
                $('#dvGalleryPreviewContainer').slick({
                    initialSlide: initIndex,
                    infinite: true,
                    appendArrows: $($('#dvGalleryPreviewContainer').parent().find('.slide-nav')),
                    prevArrow: '<div class="slide-prev"></div>',
                    nextArrow: '<div class="slide-next"></div>',
                });
                $('#dvGalleryPreviewContainer').on('afterChange', function (event, slick, currentSlide, nextSlide) {
                    var title = $(slick.$slides.get(currentSlide)).attr('data-title');
                    modal.find(".slider-title").html(title != 'undefined' ? title : '');
                    modal.find(".slider-title").removeClass("hiding");
                    if ($('#dvGalleryPreviewContainer iframe').length > 0) {
                        $('#dvGalleryPreviewContainer iframe').each(function () {
                            var frameScript = $(this).get(0).outerHTML;
                            $(this).replaceWith(frameScript);
                        });
                    }

                })
            }, 1000);
        }
    }
}

const modalButtonHandler = () => {
    var modal = $(".gallery-preview-modal");

    modal.on("click", ".box-close", function () {
        if (modal.hasClass("opened")) {
            console.log('close')
            modal.addClass("closing");
            setTimeout(function () {
                modal.removeClass("opened closing");
                $('#wrapper').removeClass('open');
            }, 350);
        }
    });
}

const evenHandler = () => {
    $("#mb_filters").change(function () {
        var currentValue = $(this).find("option:selected").val();
        $("#desktop_filters li.active").removeClass("active");
        $('#desktop_filters li a[data-filter="' + currentValue + '"]').parent().addClass("active");
        applyFilter(currentValue);
    });

    $("#desktop_filters li a").click(function (e) {
        e.preventDefault();
        var currentValue = $(this).data("filter");

        if (!$(this).parent().hasClass("active")) {
            $("#desktop_filters li.active").removeClass("active");
            $(this).parent().addClass("active");
            $("#mb_filters option:selected").removeAttr("selected");
            $('#mb_filters').val(currentValue).change();

            var selector = ( currentValue != '*' ) ? '.' + currentValue + '' : '';
            $grid.arrange({
                filter: selector
            });
            $grid.layout();


            applyFilter(currentValue);
        }
    });

    $(".load-more .link").click(function (e) {
        e.preventDefault();
        if (_currentPage < _totalPage) {
            _currentPage += 1;
        }
        pagingItemHandler(true);
    });

    $(".gallery-section .filter-item").click(function () {
        var imageItems = $(".filter-item.display-filter"),
            imageItemList = [],
            startIndex = $(this).data("display-index");
        $('#wrapper').addClass('open');
        if (imageItems.length > 0) {
            imageItems.each(function (idx) {
                var imgItem = $(this);
                if (imgItem.data('type') == 'video') {
                    imageItemList.push({
                        index: idx,
                        videoHtml: imgItem.find(".video-box").html(),
                        imageTitle: imgItem.find('div.image img:last-child').data('title'),
                        type: 'video'
                    });
                } else {
                    var title = imgItem.find('div.image img:last-child').data('title');
                    imageItemList.push({
                        index: idx,
                        imageUrl: imgItem.find('div.image img:last-child').attr('src'),
                        imageTitle: title ,
                        type: 'image'
                    });
                }

            });
            showPreviewModal(imageItemList, startIndex);
        }
    });

    modalButtonHandler();
}
const pagingItemHandler = (setFocus) => {
    var wrapper = $("#masonry"),
        focusIndex = wrapper.find(".filter-item.display-filter.display-paging").length;
    wrapper.find(".filter-item.display-filter:lt(" + (_currentPage * _itemPerPage) + ")").addClass("display-paging");
    $grid.on('revealItemElements', $('.filter-item.display-filter:lt(' + (currentPage * _itemPerPage) + ')')).layout();

    pagingButtonHandler();
}

const pagingButtonHandler = () => {
    if (_currentPage === _totalPage) {
        $(".load-more").addClass("hiding");
    } else {
        if ($(".load-more").hasClass("hiding")) {
            $(".load-more").removeClass("hiding");
        }
    }
}

$(window).on("resizestop", 150, function () {
    checkItemPerPage();
});

const applyFilter = (category) => {
    var wrapper = $("#masonry");
    wrapper.find(".filter-item").removeClass("display-paging display-filter");

    //Reset page value
    _currentPage = 1;
    _totalPage = 1;

    imagesLoaded('#masonry',function (){
        if (category !== "*") {
            $('#masonry').find('.filter-item.' + category).addClass("display-filter");
            $grid.on('revealItemElements', $('.filter-item.' + category +':lt(' + (currentPage * _itemPerPage) + ')'));
            setTimeout(function () {
                $grid.layout();
            }, 50)
            if (wrapper.data("item-per-page")) {
                _itemPerPage = parseInt(wrapper.data("item-per-page"), 10);
            }
        } else {
            $('#masonry').find('.filter-item').addClass("display-filter");
            $grid.on('revealItemElements', $('.filter-item:lt(' + (currentPage * _itemPerPage) + ')'));
            setTimeout(function () {
                $grid.layout();
            }, 50);
        }

        //Get total related item count
        _totalFilteredItem = wrapper.find(".filter-item.display-filter").length;

        //Remove old index and set new one
        wrapper.find(".filter-item").removeAttr("data-display-index");
        wrapper.find(".filter-item.display-filter").each(function (idx) {
            $(this).attr("data-display-index", idx);
        });

        //Calculate page total
        if (_totalFilteredItem > 0) {
            _totalPage = Math.ceil(_totalFilteredItem / _itemPerPage);
        }

        //View more visibility handler
        pagingItemHandler();
    });
}

const init = () => {
    evenHandler();
    checkItemPerPage();
    applyFilter("*");

    $grid = new Isotope('#masonry', {
        itemSelector: '.filter-item',
        percentPosition: true,
        transitionDuration: false,
        layoutMode: 'fitRows'
    });
    $grid.layout();


};

export { init };