let BVFRW;
let hotelCode;
let brandCode;
let domain;
const guestReview = () => {
    var configData = '{"staging":false,"apiKeyStg":"ouw9v7k5ehuldslskw3yi9jgj","apiKey":"t7glodpixu3faifbjkpp0y8c9","moderatorhighlights":false,"productId":"'+hotelCode+'","layoutType":"horiz","brandSelector":"'+brandCode+'","bLanguage":"en","languageCode":"en","countryCode":"1","domain":"'+ domain +'","layoutWidth":"100%","languageLabelsData":{"header":"Guest Reviews","bbody":"({{1}} Reviews)","readreviews":"READ REVIEWS"},"BVFRWStyles":"#IWSfrContainer {background: transparent;}.IWSfrHeader {padding: 5px 0;}.IWSfrLink a {height: auto; font-size: 11px; text-transform: uppercase;}.IWSfrContainer_vert .IWSfrLink a {display: block; height: auto; font-size: 11px; text-transform: uppercase;}.IWSfrContainer_ar {text-align: right;}.IWSfrContainer_vert .IWSfrContainer_de .IWSfrHeader, .IWSfrContainer_vert .IWSfrContainer_nl .IWSfrHeader, .IWSfrContainer_vert .IWSfrContainer_tr .IWSfrHeader {font-size: 14px;}.IWSfrContainer_horiz {position: relative; padding-bottom: 5px !important;}.IWSfrContainer_horiz .IWSfrLogo {float: left; margin-right: 5px;}.IWSfrContainer_horiz .IWSfrHeader {padding: 0; line-height: 1;}.IWSfrContainer_horiz .IWSfrLink {position: absolute;right: 10px; top: 0; margin: 0!important;}.IWSfrContainer_horiz .IWSfrCount {display: inline;}","selectedBrandData":{"fullname":"hotelindigo","hColor":"00a895","headerHColor":"424D59","linkWeight":"bold","linkColor":"ffffff","borderRadius":"0px"},"stagingUrl":"//stg.api.bazaarvoice.com/data/reviews.json","productionUrl":"//api.bazaarvoice.com/data/reviews.json","additionalParameters":"","apiVersion":5.4,"limit":1,"noContentResponse":"No Data","bvContainerId":"IWSfrContainer","fontFace":"color:#37404a"}';
    javascript:(function (e, a, g, h, f, c, b, d) {
        if (!(f = e.jQuery) || g > f.fn.jquery || h(f)) {
            c = a.createElement("script");
            c.type = "text/javascript";
            c.src = "http://ajax.googleapis.com/ajax/libs/jquery/" + g + "/jquery.min.js";
            c.onload = c.onreadystatechange = function () {
                if (!b && (!(d = this.readyState) || d == "loaded" || d == "complete")) {
                    h((f = e.jQuery).noConflict(1), b = 1);
                    f(c).remove()
                }
            };
            a.documentElement.childNodes[0].appendChild(c)
        }
    })(window, document, "1.11.0", function ($, L) {
        // If these function is used on hotels/third-party website, render the widget as soon as page load.
        if (typeof configData !== 'undefined') {
            $(document).ready(function () {
                BVFRW.featuredReview(JSON.parse(configData));
            });
        }
        BVFRW = {
            featuredReview: function (bvc) {
                if (!bvc.languageLabelsData || !bvc.selectedBrandData || bvc.layoutType === "") {
                    $("#IWSfrContainer").empty();
                    $("#generatedCodeBVFRWWidget").val("");
                    return false;
                }
                bvc.stagingUrl = bvc.stagingUrl || '//stg.api.bazaarvoice.com/data/reviews.json';
                bvc.productionUrl = bvc.productionUrl || '//api.bazaarvoice.com/data/reviews.json';
                bvc.moderatorhighlights = bvc.moderatorhighlights || false;
                bvc.additionalParameters = (bvc.moderatorhighlights) ? '&attributes=ModeratorCodes,moderatorhighlights&filter=ModeratorCode:eq:PQ&callback=?' : '';
                bvc.apiVersion = bvc.apiVersion || 5.4;
                bvc.limit = bvc.limit || 1;
                bvc.noContentResponse = bvc.noContentResponse || 'No Data';
                bvc.bvContainerId = bvc.bvContainerId || 'IWSfrContainer';
                /* container to place content into */
                bvc.fontFace = (bvc.selectedBrandData.bFontFamily) ? bvc.selectedBrandData.bFontFamily : 'color:#' + bvc.selectedBrandData.hColor;

                /* set staging or production values */
                var urlPath = (bvc.staging) ? bvc.stagingUrl : bvc.productionUrl;
                var apiKey = (bvc.staging) ? bvc.apiKeyStg : bvc.apiKey;
                /* build parameter string */
                var urlParams = '?apiversion=' + bvc.apiVersion + '&passkey=' + apiKey + '&include=products&stats=reviews&filter=ProductId:' + bvc.productId + '&limit=' + bvc.limit + bvc.additionalParameters;
                var headerColor = (bvc.selectedBrandData.headerHColor) ? bvc.selectedBrandData.headerHColor : bvc.selectedBrandData.hColor;

                var envVal = "";

                if (location.host.indexOf("qap.") != -1) {
                    envVal = "qap."
                } else if (location.host.indexOf("staging.") != -1) {
                    envVal = "staging."
                }

                var brandSel = bvc.brandSelector;
                if (brandSel == 'ihg') {
                    brandSel = '6c';
                }


                var hotelUrl = "//" + envVal + "www." + bvc.domain + "/redirect?path=hd-hotel-reviews" +
                    "&brandCode=" + brandSel +
                    "&hotelCode=" + bvc.productId.toLowerCase() +
                    "&regionCode=" + bvc.countryCode +
                    "&localeCode=" + bvc.languageCode +
                    "&cm_mmc=iws_widget_" + bvc.productId.toUpperCase() + "&icdv=99502222&dp=true";

                /* these are the template containers, the classes/ids should not change */
                var
                // pQContents =  '<div class="IWSfrLogo"><img src=""/></div>';
                    pQContents = '<div class="IWSfrContentContainer">';
                pQContents += '  <div class="IWSfrOverall rating-review">';
                pQContents += ' <span class="guest-rating-static"></span>';
                pQContents += '  </div>';
                pQContents += '  <div class="IWSfrOutOf"><a href=' + hotelUrl + ' target="_blank"><span></span>/5 </a></div>';
                pQContents += '  <div class="IWSfr"></div>';
                pQContents += '</div>';
                pQContents += '  <div class="IWSfrCountWrapper"><a href=' + hotelUrl + ' target="_blank"><span class="IWSfrCount"></span></a></div>';

                function getRatingSuccess(data) {
                    if (!bvc.languageLabelsData || !bvc.selectedBrandData || bvc.layoutType === "") {
                        $("#IWSfrContainer").empty();
                        $("#generatedCodeBVFRWWidget").val("");
                        return false;
                    }
                    $("#" + bvc.bvContainerId).empty();
                    var brandNamePath = (bvc.selectedBrandData.alternativeBrandName) ? bvc.selectedBrandData.alternativeBrandName : bvc.brandSelector;
                    var logoPath = 'http://www.ihg.com/content/dam/etc/media_library/branded/' + brandNamePath + '/common/brand-logos/' + bvc.layoutType + '/img_' + bvc.selectedBrandData.fullname + '.png';
                    $("#" + bvc.bvContainerId).prepend(pQContents).css('width', bvc.layoutWidth);
                    /* add container divs to dom */
                    $('head').append('<style type="text/css" id="BVFRWStyles">' + bvc.BVFRWStyles + '</style>');
                    /* add css to page */
                    $("#" + bvc.bvContainerId + ' .' + 'IWSfrLogo img').attr('src', logoPath)
                    /* add logo src */
                    $("#" + bvc.bvContainerId + ' .' + 'IWSfrHeader').html(bvc.languageLabelsData.header).attr('style', bvc.fontFace);
                    /* set header language */

                    // Generate the "Read Review" widget button
                    /*
                     var hotelUrl = "//www." + bvc.domain + "/hotels/" + bvc.countryCode + "/" + bvc.languageCode + "/"
                     + bvc.productId.toLowerCase() + "/hoteldetail/hotel-reviews?cm_mmc=iws_widget_"
                     + bvc.productId.toUpperCase() + "&icdv=99502222";
                     */


                    var regionSel = $("#languageCode option:selected").attr("data-country");


                    //console.log("Hotel Review URL : " + hotelUrl);

                    // $("#IWSfrContainer").append('<div class="IWSfrLink"><a href=' + hotelUrl + ' target="_blank">'+bvc.languageLabelsData.readreviews+'</a></div>');

                    $("#" + bvc.bvContainerId + ' .' + 'IWSfrLink a').css({
                        /* style button */
                        'background-color': '#' + headerColor,
                        'color': '#' + bvc.selectedBrandData.linkColor,
                        'border': '1px solid #' + bvc.selectedBrandData.headerHColor,
                        'border-radius': bvc.selectedBrandData.borderRadius,
                        'height': 'auto',
                        'font-weight': bvc.selectedBrandData.linkWeight,
                        'line-height': '11px',
                        'margin-top': '5px',
                        'padding': '5px',
                        'text-align': 'center',
                        'display': 'inline-block',
                        'text-decoration': 'none'
                    }).parent().css({
                        'margin-top': '10px'
                    });

                    if (data.HasErrors === true || !data.Results || data.Results.length === 0) { /* return errors (hidden) */
                        $("#IWSfrContainer").empty();
                        $("#IWSfrContainer").html("Unable to load hotel review ratings.");
                        $("#generatedCodeBVFRWWidget").empty().val("");
                        // $("#"+bvc.bvContainerId+' .IWSfrContentContainer').attr('style', 'display: none;').html('<div class="custom-bv-text" style="display:none">API Response Error: ' + data.Errors[0].Message+ '<br/>API URL: ' + urlPath + urlParams+'</div>');
                        return false;

                    } else if (data.TotalResults > 0) { /* does return review data */
                        var reviewResults = data.Results[0];
                        var reviewStats = data.Includes.Products[bvc.productId];
                        var qPTotalReviewCount = reviewStats.TotalReviewCount;
                        var ratingAveNumber = parseFloat(reviewStats.ReviewStatistics.AverageOverallRating).toFixed(1);
                        // var overAllStarPath = 'http://intercontinental.ugc.bazaarvoice.com/2067/'+ratingAveNumber.replace(/\./g, '_')+'/5/rating.gif';
                        var overAllStarPath = 'guest-rating-' + ratingAveNumber.replace(/\./g, '');
                        var selectedText = (reviewResults.ModeratorHighlights && bvc.moderatorhighlights) ? reviewResults.ModeratorHighlights.PQ.Highlights[0].SelectedText : '';
                        var totalReview = bvc.languageLabelsData.bbody.replace(/\{\{1\}\}/g, qPTotalReviewCount);
                        totalReview = totalReview.replace('(','');
                        totalReview = totalReview.replace(')','');
                        /* add data content to approprate containers */
                        $("#" + bvc.bvContainerId).removeClass();
                        $("#" + bvc.bvContainerId).addClass(bvc.bvContainerId + '_' + bvc.layoutType + ' ' + bvc.bvContainerId + '_' + bvc.bLanguage)
                        // $("#"+bvc.bvContainerId+' .'+'IWSfrOverall span').attr('src', overAllStarPath);
                        $("#" + bvc.bvContainerId + ' .' + 'IWSfrOverall span').addClass(overAllStarPath);
                        $("#" + bvc.bvContainerId + ' .' + 'IWSfrOutOf span').html(ratingAveNumber);
                        $("#" + bvc.bvContainerId + ' .' + 'IWSfrCount').html(totalReview);
                        $("#" + bvc.bvContainerId + ' .' + 'IWSfr').html(selectedText);
                        if ((bvc.languageCode === 'ar' || bvc.languageCode === 'he') && bvc.layoutType === 'horiz') {
                            $("div.IWSfrLink").css("position", 'static');
                        }

                    } else { /* hide overall container if no content */
                        $("#" + bvc.bvContainerId + ' .IWSfrContentContainer').attr('style', 'display: none;').html('<div class="custom-bv-text">' + bvc.noContentResponse + '</div>');
                        return false;
                    }
                    // If it's RedirectLite website, generate the code which will be used on hotels/third-party website.
                    if ($("#generatedCodeBVFRWWidget").length > 0) {
                        $("#generatedCodeBVFRWWidget").val("<div id='IWSfrContainer' "
                            + " style='font-family:Arial,Helvetica,sans-serif;'></div>"
                            + "<script type='text/javascript'>"
                            + "var configData = " + "'" + JSON.stringify(BVFRWConfig).trim() + "';"
                            + $("#widgetGeneratorFunctions").html().trim() + "<\/script>");
                    }
                };

                /* get product data */
                $.getJSON(urlPath + urlParams, {
                    format: 'json'
                }).done(getRatingSuccess);
            }
        }
    });
}
const init = (guestReviewInfo) => {
    hotelCode = guestReviewInfo.hotelCode;
    brandCode = guestReviewInfo.brandCode;
    domain = guestReviewInfo.domain;
    guestReview();
}
export { init };
