@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'offer-detail';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Celebrate a special occasion or spoil that special someone',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/mobile-slide-02.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'section_heading' => 'Stay Romantic',
        'contact' => 'sales.vanuatu@ihg.com',
        'article_content' => "<p>Celebrate a special occasion or spoil that special someone.</p>
        <p>Enjoy the superb service of your own personal waiter while dining in a private, tiki torch-lit cabana overlooking the tranquil waters of Erakor Lagoon.</p>
        <p>Holiday Inn Resort Vanuatu’s romantic dinner for two includes a five-course menu and a glass each of sparkling wine on arrival.</p>
        <p>Bookings are essential.</p>
        <p>For more information and to make a reservation, please contact: <br>
        P: +678 22040 or E: <a href='mailto:sales.vanuatu@ihg.com'>sales.vanuatu@ihg.com</a></p>
        <p>Holiday Inn Resort Vanuatu, where experiences are created and memories made</p>
        <p>Terms and conditions apply. Menu is subject to change.</p>
        <img src='templates/hi-makati/images/offers/HIRVanuatu---Romantic-Dinner-MOTT-21.jpg') alt=''>",
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
//      [
//        'item' => 'time', //item: location,time,schedule,menu,reservation
//        'info' => 'Pool Usage 6:00 am – 6:00 pm',
//        'link_url' => ''
//      ]
        ],
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/wedding-offer.jpg'),
                'alt' => '',
                'article_heading' => 'Tugeta Wedding Package',
                'link_url' => '#'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/HIRVanuatu---Fireshow-MOTT-18.jpg'),
                'alt' => '',
                'article_heading' => 'Fire Night Dinner',
                'link_url' => '#'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail')
    <?php
    $template_item = [
        'background' => true,
        'section_heading' => 'Latest Offers',
        'sub_heading' => 'Dive straight in to your next holiday.',
        'link_url' => '/offers',
        'link_label' => 'See all special offers',
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/offers/Stars_Melissa_Findley-Vanuatu-MFBlog-55.jpg'),
                'alt' => 'Plan the Best Birthday Party in Vanuatu',
                'article_heading' => 'Plan the Best Birthday Party in Vanuatu',
                'article_summary' => '<p>Happy Birthday! Bon Anniversaire! Hapi Birthdei! Holiday Inn Resort Vanuatu has all you need to take the stress out of planning your child’s next birthday party.</p>',
                'article_content' => '<p>Happy Birthday! Bon Anniversaire! Hapi Birthdei! Holiday Inn Resort Vanuatu has all you need to take the stress out of planning your child’s next birthday party.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_slider')


@endsection

@section('scripts')

@endsection