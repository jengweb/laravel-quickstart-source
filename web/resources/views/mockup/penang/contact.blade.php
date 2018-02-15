@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'contact';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => '',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/mobile-slide-02.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'section_heading' => 'Contact',
        'sub_heading' => 'Location information',
        'article_content' => '<p>Holiday Inn Resort Vanuatu
Tassiriki Park, Port Vila</p>
<p><strong>T. </strong>+678 22040 <br><strong>E. </strong><a href="mailto:reservations.vanuatu@ihg.com">reservations.vanuatu@ihg.com</a></p>',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/about/01.jpg'),
        'alt' => '',
        'latitude' => '14.550597',
        'longitude' => '121.025075'
    ]
    ?>
    @include('mockup.hi-makati.templates.contact')

@endsection

@section('scripts')
    <script type="text/javascript">
        window.mapInfo = {
            lat: {{ $template_item['latitude'] }},
            lng: {{ $template_item['longitude'] }}
        };

        window.initPage = function () {
            if (typeof initMap === 'function') {
                if (window.mapInfo && window.mapInfo.lat && window.mapInfo.lng && Map) {
                    var mapObject = {
                        startingInfo: window.mapInfo,
                        markerList: [
                            {
                                latitude: window.mapInfo.lat,
                                longitude: window.mapInfo.lng
                            }
                        ]
                    };
                    initMap(mapObject);
                }
            }
        }
    </script>
@endsection