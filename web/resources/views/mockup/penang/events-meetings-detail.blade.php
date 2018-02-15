@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'events-meetings-detail';
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
        'section_heading' => 'Meetings',
        'article_content' => '<p>Holiday Inn Resort Vanuatu is an oasis within Port Vila and a destination that will surely inspire delegates at your next conference, incentive trip or event.</p>
<p>The combination of our stunning location, outstanding event facilities, 138 superbly appointed rooms and 10 Overwater Villas located on our very own private Erongo Island, will induce excitement as delegates experience true Melanesian charm and hospitality.</p>
<p>With versatile function rooms, including the use of a marquee space on the resort’s private beach, and various onsite locations that can cater for up to 200 delegates, organisers are encouraged to make the most of the tranquil lagoon setting to create a unique event experience.</p>
<p>All this, plus exceptional food and beverage options provided by the resort, means Holiday Inn Resort Vanuatu is the first choice for a distinctive and successful event.</p>
<p>Our experienced team understand the demands in organising any event and are focused to ensure every aspect runs seamlessly.</p>
<p><a href="#">Learn more about our Meeting Packages</a></p>',
        'object_data' => [
//      [
//        'article_heading' => 'Services & facilities',
//        'list_style' => 'column', // (default, column)
//        'article_content' => '<ul><li>Banquets and Catering</li><li>Largest Room Capacity:150</li><li>Digital Projector</li><li>Largest Room Measurement: 208</li><li>Wedding planning & organizer</li><li>Smallest Room Measurement: 208</li></ul>',
//        'image_url' => '',
//        'alt' => '',
//        'info_item' => [
//          [
//            'item' => 'reservation', //item: location,time,schedule,menu,reservation
//            'info' => 'Reservation/Enquiries',
//            'link_url' => ''
//          ]
//        ]
//      ]
        ],
        'info_item' => [],
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/events-meetings/weddings.jpg'),
                'alt' => '',
                'article_heading' => 'Weddings',
                'link_url' => '#'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail')

    <?php
    $template_item = [
        'heading' => 'Event Enquiry',
        'article_content' => '<p>Please complete the form below and one of our meetings team members will attend to your enquiry. Alternatively, you can contact us on +00(0) 0000 0000 or email <a href="mailto:info@hi-makati.com">info@hi-makati.com</a></p>'
    ]
    ?>
    @include('mockup.hi-makati.templates.meeting_form')

@endsection

@section('scripts')

@endsection