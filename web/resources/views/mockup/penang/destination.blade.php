@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'destination';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Discover serenity and happiness at Vanuatu',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/mobile-slide-02.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'format' => 'content_align_left', //default --> content_align_left, content_align_right
        'section_heading' => 'Destination',
        'sub_heading' => 'Explore the Culture and World of Vanuatu',
        'article' => '<p>Vanuatu is a captivating destination brimming with remarkable sites, breathtaking scenery and an abundance of things to do. But before you arrive, there are some things you might like to know. Here you’ll find the answers to frequently asked questions, and we also provide  you with a brief lesson on Vanuatu’s culture and history.</p>',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/desktop-slide-02.jpg'),
//      'media_url' => 'https://www.youtube.com/watch?v=DUZvfW3SK5I',
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    $template_item = [
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/culture.jpg'),
                'alt' => '',
                'article_heading' => 'Rich with History, Vanuatu Beckons You for a Visit',
                'article_summary' => '<p>Formerly known as the New Hebrides, Vanuatu is a group of 83 islands in the South Pacific Ocean, east of Australia and west of Fiji. In 1906, British and French settlers agreed to administer the islands jointly in what was called the British-French Condominium.</p>',
                'article_content' => '<p>Formerly known as the New Hebrides, Vanuatu is a group of 83 islands in the South Pacific Ocean, east of Australia and west of Fiji. In 1906, British and French settlers agreed to administer the islands jointly in what was called the British-French Condominium.</p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/Holiday-Inn-Resort-Van-115.jpg'),
                'alt' => '',
                'article_heading' => 'Immerse Yourself in Vanuatu Culture at Holiday Inn Resort',
                'article_summary' => '<p>Vanuatu is recognised as one of the most culturally diverse countries in the world. Apart from the Ni-Vanuatu people, small communities of French, British, Australian, New Zealand, Vietnamese, Chinese and other Pacific Islanders make up the country’s population.</p>',
                'article_content' => '<p>Vanuatu is recognised as one of the most culturally diverse countries in the world. Apart from the Ni-Vanuatu people, small communities of French, British, Australian, New Zealand, Vietnamese, Chinese and other Pacific Islanders make up the country’s population.</p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/resort-location.jpg'),
                'alt' => '',
                'article_heading' => 'Resort Location',
                'article_summary' => '<p>Vanuatu is an archipelago of 83 islands located in the South Pacific Ocean, approximately 1,750km east of Australia.</p>',
                'article_content' => '<p>Vanuatu is an archipelago of 83 islands located in the South Pacific Ocean, approximately 1,750km east of Australia.</p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/Holiday-Inn-Resort_Useful-information.jpg'),
                'alt' => '',
                'article_heading' => 'Useful Information',
                'article_summary' => '<p>The local currency is Vatu (VT or VUV). You can change your money at the resort, at one of the local banks, at currency exchange kiosks in town or at the airport.</p>',
                'article_content' => '<p>The local currency is Vatu (VT or VUV). You can change your money at the resort, at one of the local banks, at currency exchange kiosks in town or at the airport.</p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/Mt-Yasur.jpg'),
                'alt' => '',
                'article_heading' => 'Local Attrations',
                'article_summary' => '<p>There is so much to see and do during your stay in Vanuatu. Visit our Resort Hub to learn more about these attractions and the many more options available.</p>',
                'article_content' => '<p>There is so much to see and do during your stay in Vanuatu. Visit our Resort Hub to learn more about these attractions and the many more options available.</p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_column_block')

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