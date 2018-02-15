@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'homepage';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Experience a variety of culinary delights',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/mobile-slide-02.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/desktop-slide-03.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/mobile-slide-03.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/desktop-slide-04.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/mobile-slide-04.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'section_heading' => 'Verandah Restaurant',
        'article_content' => "<p>Situated so guests can enjoy superb views overlooking Erakor Lagoon and the resort's private Erongo Island, the Verandah Restaurant offers sumptuous spreads for breakfast and mouth-watering à la carte dishes for dinner. The local and international creations made by our talented chefs will surely tantalise your taste buds. </p>",
        'object_data' => [
            [
                'article_heading' => 'Services & facilities',
                'list_style' => 'column', // (default, column)
                'article_content' => '',
                'image_url' => '',
                'alt' => '',
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu,reservation
                        'info' => 'Overlooking Erakor Lagoon',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu,reservation
                        'info' => 'Breakfast: 6:30am – 10:30am<br>Lunch: 12pm - 3.00pm<br>Dinner: 5:30pm – 10:00pm',
                        'link_url' => ''
                    ]
                ]
            ]
        ],
        'info_item' => [],
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Holiday-Inn-Pool-Bar_1.jpg'),
                'alt' => '',
                'article_heading' => 'Pool Bar',
                'link_url' => '#'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Holiday-Inn-Resort-Van-078.jpg'),
                'alt' => '',
                'article_heading' => "Vanuatu's Favourite Local Beverages Await You In Our Bar",
                'link_url' => '#'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail')

@endsection

@section('scripts')
@endsection