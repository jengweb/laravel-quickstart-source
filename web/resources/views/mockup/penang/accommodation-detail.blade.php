@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'accommodation-detail';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Twin Room',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/desktop-slide-detail-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/mobile-slide-detail-01.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')
    <?php
    $template_item = [
        'section_heading' => 'Twin Room',
        'article_content' => '<p>Featuring intricate sand-drawing murals and neutral tones, these 28-square-metre rooms reflect Melanesian design and architecture at its best. Each Twin Room has two comfortable twin-size beds with a choice of firm or soft pillows plus a host of modern amenities. An additional private Juliet balcony or patio allows guests to step outside and take in the resort’s beautiful natural surroundings.</p>',
        'info_item' => [
            [
                'item' => 'bed', //item: bed,wifi,tv
                'info' => 'Capacity: Adults 2, Children 2',
                'link_url' => ''
            ]
        ],
        'amenities' => [
            'heading' => 'Amenities',
            'article_content' => '<ul>
            <li>Complimentary Wi-Fi access for IHG Rewards Club members</li>
            <li>LAN port for hard-wired connection</li>
            <li>Environmentally friendly linen and towel programme</li>
            <li>Multi-function massage showerhead with curved shower rail</li>
            <li>Pillow menu  (firm/ soft selection)</li>
            <li>Mini refrigerator</li>
            <li>32-inch LCD TV</li>
            <li>iPod docking station</li>
            <li>24-hour in-room dining</li>
            <li>Biodegradable bathroom amenities</li>
            <li>Coffee and tea selection</li>
            <li>In-room safe</li>
            <li>Laundry service</li>
            <li>Flat iron and ironing board</li>
            <li>Hairdryer</li>
            </ul>',
//      'object_data' => [
//        [
//          'list_heading' => '',
//          'item' => '', //item: bed,wifi,tv
//          'list_data' => [
//            [
//              'item' => 'LAN port for hard wired connection'
//            ],
//            [
//              'item' => 'iPod docking station'
//            ],
//            [
//              'item' => '24 hour In-Room Dining'
//            ],
//            [
//              'item' => 'Coffee & Tea selection'
//            ],
//            [
//              'item' => 'iodegradable bathroom amenities'
//            ]
//          ]
//        ],
//        [
//          'list_heading' => 'Complimentary Internet for IHG members',
//          'item' => 'wifi', //item: bed,wifi,tv
//          'list_data' => [
//            [
//              'item' => 'LAN port for hard wired connection'
//            ],
//            [
//              'item' => 'iPod docking station'
//            ],
//            [
//              'item' => '24 hour In-Room Dining'
//            ],
//            [
//              'item' => 'Coffee & Tea selection'
//            ],
//            [
//              'item' => 'iodegradable bathroom amenities'
//            ]
//          ]
//        ]
//      ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail_booking')


@endsection

@section('scripts')

@endsection