@extends(\App\CMS\Helpers\CMSHelper::getTemplatePath('layout.master'))
<?php
$site = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('site');
$translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
$isPreview = session(\App\CMS\Constants\CMSConstants::CMS_PAGE_PREVIEW_ACTIVE, false);
$currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
$currentLanguage = \App\CMS\Helpers\CMSHelper::getCurrentLanguageCode();
$isDev = env('APP_DEBUG', false);
?>
@section('content')
    @if(${\App\CMS\Constants\CMSConstants::RENDER_DATA} = \App\CMS\Helpers\CMSHelper::prepareTemplates())
        @foreach (${\App\CMS\Constants\CMSConstants::RENDER_DATA} as $key => $template)
            @if($isPreview || $isDev)
                @include($template[\App\CMS\Constants\CMSConstants::TEMPLATE_PATH], $template)
            @else
                <?php
                $id = \App\CMS\Helpers\CMSHelper::generateCacheKey(
                    isset_not_empty($template[\App\CMS\Constants\CMSConstants::PAGE_ITEM_KEY]->_variable_name, $key)
                );
                ?>
                @cache($template[\App\CMS\Constants\CMSConstants::TEMPLATE_PATH], $template, 10080, $id)
            @endif
        @endforeach
    @endif
@endsection
@section('scripts')
    <script type="text/javascript">
        Number.prototype.padLeft = function (n,str){
            return Array(n-String(this).length+1).join(str||'0')+this;
        }

        function reservation(formId){
            if(formId !== 'undefined') {
                console.log(formId);
                var checkIn = $('form#' + formId + ' input#'+formId+'_checkIn').val();
                var checkInSplit = checkIn.split('.');
                var checkOut = $('form#' + formId + ' input#'+formId+'_checkOut').val();
                var checkOutSplit = checkOut.split('.');
                var adults = $('form#' + formId + ' select#adult').val();
                var childrens = $('form#' + formId + ' select#children').val();
                var rooms = $('form#' + formId + ' select#rooms').val();
                var hotelCode = '{{ isset_not_empty($site->hotel_code) }}';
                var brandCode = '{{ isset_not_empty($site->brand_code) }}';
                var localeCode = '{{ isset_not_empty($currentLanguage) }}';

                var formData = {
                    bookingUrl: '{{ isset_not_empty($site->booking_url) }}',
                    checkInDate: checkInSplit[0],
                    checkInMonthYear: (parseInt(checkInSplit[1]) - 1).padLeft(2) + checkInSplit[2],
                    checkOutDate: checkOutSplit[0],
                    checkOutMonthYear: (parseInt(checkOutSplit[1]) - 1).padLeft(2) + checkOutSplit[2],
                    numberOfAdults: adults,
                    numberOfChildren: childrens,
                    numberOfRooms: rooms,
                    hotelCode: hotelCode,
                    brandCode: brandCode,
                    localeCode: localeCode,
                }
                initReservation(formData);
            }
        }

        function offerReservation(formId){
            if(formId !== undefined) {
                var checkIn = $('form#' + formId + ' input#offer_checkin').val();
                var checkInSplit = checkIn.split('.');
                var checkOut = $('form#' + formId + ' input#offer_checkout').val();
                var checkOutSplit = checkOut.split('.');
                var adults = $('form#' + formId + ' select#offer_adult').val();
                var childrens = $('form#' + formId + ' select#offer_children').val();
                var rooms = $('form#' + formId + ' select#offer_room').val();
                var hotelCode = '{{ isset_not_empty($site->hotel_code) }}';
                var brandCode = '{{ isset_not_empty($site->brand_code) }}';
                var localeCode = '{{ isset_not_empty($currentLanguage) }}';

                var formData = {
                    bookingUrl: '{{ isset_not_empty($site->booking_url) }}',
                    checkInDate: checkInSplit[0],
                    checkInMonthYear: (parseInt(checkInSplit[1]) - 1).padLeft(2) + checkInSplit[2],
                    checkOutDate: checkOutSplit[0],
                    checkOutMonthYear: (parseInt(checkOutSplit[1]) - 1).padLeft(2) + checkOutSplit[2],
                    numberOfAdults: adults,
                    numberOfChildren: childrens,
                    numberOfRooms: rooms,
                    hotelCode: hotelCode,
                    brandCode: brandCode,
                    localeCode: localeCode,
                }
                initReservation(formData);
                $('#'+formId)[0].reset();
            }
        }

        function setFormValue(header,template){
            switch('{{$currentPage->template}}'){
                case 'restaurants_and_bars' :
                    <?php $pageData = \App\CMS\Helpers\CMSHelper::getPageItemByVariableName('restaurants'); ?>
                    var currentHeader = '{{ isset_not_empty($pageData->heading) }}' + ' {{ isset_not_empty($translate->for_label) }} ' + header ;
                    $('div.reservation-form h3.heading').html(currentHeader);
                    $('input#enquiry_for').val(header);
                    break;
                case 'activities' :
                    <?php $pageData = \App\CMS\Helpers\CMSHelper::getPageItemByVariableName('resort_activities'); ?>
                    var currentHeader = '{{ isset_not_empty($pageData->heading) }}' + ' {{ isset_not_empty($translate->for_label) }} ' + header ;
                    $('div.reservation-form h3.heading').html(currentHeader);
                    $('input#enquiry_for').val(header);
                    break;
                case 'events_meetings' :
                case 'meeting_room' :
                    <?php $pageData = \App\CMS\Helpers\CMSHelper::getPageItemByVariableName('events'); ?>
                    var currentHeader = '{{ isset_not_empty($pageData->heading) }}' + ' {{ isset_not_empty($translate->for_label) }} ' + header ;
                    $('div.reservation-form h3.heading').html(currentHeader);
                    $('input#subject').val(header);
                    break;
            }
            $('#reservation form').show();
            $('#reservation form')[0].reset();
        }

        function submitNewsletter(formId,thxMessageArea){
            <?php
            $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('newsletter_form');
            $formData = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('newsletter_form');
            ?>
            @if(isset_not_empty($form))
                $("form#"+formId).validate({
                    rules: {
                        @if(isset_not_empty($form->properties))
                            @foreach($form->properties as $key=>$value)
                                @if($value->required == true)
                                    @if($value->type == 'email')
                                        {{$value->name}}: {required: true, email: true},
                                    @else
                                        {{$value->name}}:"required",
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    },
                    messages: {
                        @if(isset_not_empty($form->properties))
                            @foreach($form->properties as $key=>$value)
                                @if($value->required == true)
                                    {{ $value->name }}: "{{ $value->validate_message }}",
                                @endif
                            @endforeach
                        @endif
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            success: function(response) {
                                $(form).fadeOut();
                                $(thxMessageArea).html('{!! isset_not_empty($formData->success_message) !!}');
                                $(thxMessageArea).scrollTop();
                            }
                        });
                    }
                });
            @endif
        }

        function submitForm(formId,thxMessageArea){
            if(formId !== undefined) {
            <?php
            $form = null;
            $formData = null;
            switch($currentPage->template){
                case 'contact_us' :
                    $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('contact_form');
                    $formData = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('contact_form');
                    break;
                case 'restaurants_and_bars' :
                case 'activities' :
                case 'catering_service' :
                    $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('proposal_form');
                    $formData = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('proposal_form');
                    break;
                case 'events_meetings' :
                case 'meeting_room' :
                    $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('event_form');
                    $formData = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('event_form');
                    break;
            }
            ?>
            @if(isset_not_empty($form))
                $("form#"+formId).validate({
                    rules: {
                        @if(isset_not_empty($form->properties))
                            @foreach($form->properties as $key=>$value)
                                @if($value->required == true)
                                    @if($value->type == 'email')
                                        {{$value->name}}: {required: true, email: true},
                                    @else
                                        {{$value->name}}:"required",
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    },
                    messages: {
                        @if(isset_not_empty($form->properties))
                            @foreach($form->properties as $key=>$value)
                                @if($value->required == true)
                                    {{ $value->name }}: "{{ $value->validate_message }}",
                                @endif
                            @endforeach
                        @endif
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            success: function(response) {
                                $(form).fadeOut();
                                $(thxMessageArea).html('{!! isset_not_empty($formData->success_message) !!}');
                                $(thxMessageArea).scrollTop();
                            }
                        });
                    }
                });
            @endif
            }
        }

        window.initPage = function() {

            $('li.language-menu').click(function(){
                var redirectTo = $(this).data('url');
                window.location = redirectTo;
            });
            $('#offer-booking').click(function(){
                var formId = $(this).data('form');
                offerReservation(formId);
            });
            $('.heading-form').click(function(){
                var templateName = $(this).data('template');
                var heading = $(this).data('heading');
                setFormValue(heading,templateName);
            });
            $('.booking-button').click(function(){
                var parentEle = $(this).closest( "div.booking-section" );
                var formEle = parentEle.find('form');
                formEle.attr('id',parentEle.attr('id'))
                var formId = parentEle.attr('id');
                reservation(formId);
            });

            switch('{{$currentPage->template}}'){
                case 'accommodation' :
                case 'gallery' :
                case 'special_offers' :
                case 'latest_news' :
                case 'room_and_suites' :
                    if (typeof initFilter === 'function') {
                        initFilter();
                    }
                break;
                case 'contact_us':
                <?php $contact = \App\CMS\Helpers\CMSHelper::getPageItemByVariableName('contact');
                    $latitude = 14.550597;
                    $longitude = 121.025075;
                    if(isset_not_empty($contact->map_coordinate)){
                        $splitMap = explode(',',$contact->map_coordinate);
                        if(count($splitMap)>1){
                            $latitude = $splitMap[0];
                            $longitude = $splitMap[1];
                        }
                    }
                    $pinPath = isset_not_empty($contact->pin_for_map,'/templates/penang/images/pin.png');
                ?>
                    window.mapInfo = {
                        lat: {{ $latitude }},
                        lng: {{ $longitude }}
                    };

                    if (typeof initMap === 'function') {
                        if (window.mapInfo && window.mapInfo.lat && window.mapInfo.lng && Map) {
                            var mapObject = {
                                startingInfo: window.mapInfo,
                                markerList: [
                                    {
                                        latitude: window.mapInfo.lat,
                                        longitude: window.mapInfo.lng
                                    }
                                ],
                                mapApiKey: '{{ isset_not_empty($contact->map_api_key,'AIzaSyBzbUZZWlUUnZoqa86KKVeFSgAcpQjlgXI') }}',
                                pinPath: '{{ \App\CMS\Helpers\CMSHelper::thumbnail($pinPath) }}'
                            };
                            initMap(mapObject);
                        }
                    }
                    // Has reservation form
                    submitForm('contact-form','.form-contact');
                break;
                case 'restaurants_and_bars' :
                    // Has reservation form
                    submitForm('proposal-form','h3.heading');
                break;
                case 'catering_service' :
                case 'events_meetings' :
                case 'meeting_room' :
                    // Has reservation form
                    submitForm('event-form','h3.heading');
                break;
                }
            // Newsletter
            submitNewsletter('newsletter-form','div.newsletter-wrapper h4.heading');

            @if(isset_not_empty($site->show_web_loader) == true)
                if (typeof initLoader === 'function') {
                    initLoader();
                }
            @endif

            if (typeof initWeather === 'function') {
                var weatherInfo = {
                    keyCode : '{{ isset_not_empty($site->weather_key_code) }}'
                }
                initWeather(weatherInfo);
            }

            if (typeof initGuestReview === 'function') {
                var guestReviewInfo = {
                    hotelCode : '{{ strtoupper(isset_not_empty($site->hotel_code)) }}',
                    brandCode : '{{ strtoupper(isset_not_empty($site->brand_code)) }}',
                    domain : '{{ isset_not_empty($site->guest_review_domain) }}'
                }
                initGuestReview(guestReviewInfo);
            }

        }
    </script>
@endsection
