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
        'format' => 'content_align_left', //default --> content_align_left, content_align_right
        'section_heading' => 'Restaurants & Bars',
        'sub_heading' => 'Breakfast, lunch, dinner and everything in between',
        'article' => "<p>The resort's dining options ensure there is something for everyone’s taste buds. Guests can choose to dine at the relaxing Verandah Restaurant or soak up the sun with small bites and a cocktail at the Pool Bar. Enjoy a fun and delicious themed dinner on the beach, or relax and have a drink or a snack in our Lobby Bar. All of our dining outlets combine local flavours and the freshest produce to ensure delicious, appetising fare.</p>",
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Holiday-Inn-Resort-Van-307.jpg'),
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    $template_item = [
        'format' => 'text-image', //default --> text-image (text-image, image-text)
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Holiday-Inn-Resort-Van-307.jpg'),
                'alt' => '',
                'heading' => 'Verandah Restaurant',
                'article_summary' => "<p>Situated so guests can enjoy superb views overlooking Erakor Lagoon and the resort's private Erongo Island, the Verandah Restaurant offers sumptuous spreads for breakfast and mouth-watering à la carte dishes for dinner.</p>",
                'article_content' => "<p>Situated so guests can enjoy superb views overlooking Erakor Lagoon and the resort's private Erongo Island, the Verandah Restaurant offers sumptuous spreads for breakfast and mouth-watering à la carte dishes for dinner. The local and international creations made by our talented chefs will</p>",
                'link_url' => '/restaurant-bars-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu
                        'info' => 'Overlooking Erakor Lagoon',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu
                        'info' => 'Breakfast: 6:30am – 10:30am<br>Lunch: 12pm - 3.00pm<br>Dinner: 5:30pm – 10:00pm',
                        'link_url' => ''
                    ]
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Holiday-Inn-Pool-Bar_1.jpg'),
                'alt' => '',
                'heading' => 'Pool Bar',
                'article_summary' => "<p>Ice cream all day, and pizza too! We aim to spoil at Holiday Inn Resort Vanuatu’s Pool Bar. At this relaxing location, enjoy an extensive all-day menu that offers scrumptious bites, a wide range of pizzas (both savoury and sweet), delicious ice cream, and a selection of hot and cold drinks</p>",
                'article_content' => '<p>Ice cream all day, and pizza too! We aim to spoil at Holiday Inn Resort Vanuatu’s Pool Bar. At this relaxing location, enjoy an extensive all-day menu that offers scrumptious bites, a wide range of pizzas (both savoury and sweet), delicious ice cream, and a selection of hot and cold drinks</p>',
                'link_url' => '/restaurant-bars-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu
                        'info' => 'Resort Beach Pool',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu
                        'info' => '8:00am – 6:00pm',
                        'link_url' => ''
                    ]
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Holiday-Inn-Resort-Van-078.jpg'),
                'alt' => '',
                'heading' => "Vanuatu's Favourite Local Beverages Await You In Our Bar",
                'article_summary' => "<p>Infused with a charming Melanesian ‘welkam’, the resort’s open-air Lobby Bar is the perfect venue for a relaxing coffee, an ice-cold beer, a delicious cocktail or an apéritif. The Lobby Bar is open until late and offers tapas, light meals and snacks. </p>",
                'article_content' => "<p>Infused with a charming Melanesian ‘welkam’, the resort’s open-air Lobby Bar is the perfect venue for a relaxing coffee, an ice-cold beer, a delicious cocktail or an apéritif. The Lobby Bar is open until late and offers tapas, light meals and snacks. </p>",
                'link_url' => '/restaurant-bars-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu
                        'info' => 'Resort Lobby',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu
                        'info' => '8:00am – late',
                        'link_url' => ''
                    ]
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/features/Stars_Melissa_Findley-Vanuatu-MFBlog-55.jpg'),
                'alt' => '',
                'heading' => 'Themed Dining <br>Night Under the Stars',
                'article_summary' => '<p>Discover a unique Vanuatu dining experience!</p><p>As the stars shine brightly above, we invite you to enjoy the ambience on the Resort Beach and relax while indulging in a sumptuous dinner complete with irresistible</p>',
                'article_content' => '<p>As the stars shine brightly above, we invite you to enjoy the ambience on the Resort Beach and relax while indulging in a sumptuous dinner complete with irresistible</p>',
                'link_url' => '/restaurant-bars-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => []
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_list_block')

    <?php
    $template_item = [
        'heading' => 'Request Proposal',
        'article_content' => '<p>Please complete the form below and one of our meetings team members will attend to your enquiry. Alternatively, you can contact us on +00(0) 0000 0000 or email <a href="mailto:info@hi-makati.com">info@hi-makati.com</a></p>'
    ]
    ?>
    @include('mockup.hi-makati.templates.proposal_form')

    <?php
    $template_item = [
        'background' => true,
        'section_heading' => 'Dining Offers',
        'sub_heading' => 'Dive straight in to your next holiday.',
        'link_url' => '/offers',
        'link_label' => 'See all special offers',
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/offers/HIRVanuatu---Romantic-Dinner-MOTT-21.jpg'),
                'alt' => 'Stay Romantic',
                'article_heading' => 'Stay Romantic',
                'article_summary' => '<p>Celebrate a special occasion or spoil that special someone. Enjoy the superb service of your own personal waiter while dining in a private, tiki torch-lit cabana overlooking the tranquil waters of Erakor Lagoon.</p>',
                'article_content' => '<p>Celebrate a special occasion or spoil that special someone. Enjoy the superb service of your own personal waiter while dining in a private, tiki torch-lit cabana overlooking the tranquil waters of Erakor Lagoon.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/offers/offer-birthday-party.jpg'),
                'alt' => 'Night Under the Stars ',
                'article_heading' => 'Night Under the Stars ',
                'article_summary' => '<p>Discover a unique Vanuatu dining experience! Enjoy the ambience on our resort beach while indulging in a sumptuous dinner complete with irresistible desserts and live entertainment.</p>',
                'article_content' => '<p>Discover a unique Vanuatu dining experience! Enjoy the ambience on our resort beach while indulging in a sumptuous dinner complete with irresistible desserts and live entertainment.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
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