@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'recreation-detail';
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
        'section_heading' => 'Pool',
        'article_content' => "<p>The two pools at Holiday Inn Resort Vanuatu offer the best of both worlds. The freeform Terrace Pool is located in our ‘non-active’ zone, one of the quietest parts of the resort. Take a dip, relax on a sun lounger, read in peace and quiet, and let the rest of the world just melt away.</p>
        <p>The resort's Beach Pool is where all the action is. Complete with a paddling pool, mushroom waterfall as well as tipping buckets, is a great spot for the kids and holidaymakers who don’t want to miss out on all the fun and activities.</p>",
        'object_data' => [
//      [
//        'article_heading' => 'Terrace Pool',
//        'list_style' => 'default', // (default, column)
//        'article_content' => '<p>Our Terrace Pool is a quieter area, known as our ‘non-active’ zone. Food and beverage service is also available at the Terrace Pool. Once you relax on your sun lounge there’s not much else to think about……. just unwind and enjoy.</p>',
//        'image_url' => '',
//        'alt' => '',
//        'info_item' => [
//          [
//            'item' => 'time', //item: location,time,schedule,menu,reservation
//            'info' => 'Pool Usage 6:00 am – 6:00 pm',
//            'link_url' => ''
//          ]
//        ]
//      ]
        ],
        'info_item' => [
            [
                'item' => 'time', //item: location,time,schedule,menu,reservation
                'info' => 'Pool Usage 6:00 am – 6:00 pm',
                'link_url' => ''
            ]
        ],
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/golf.jpg'),
                'alt' => '',
                'article_heading' => 'Golf',
                'link_url' => '#'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail')

@endsection

@section('scripts')

@endsection