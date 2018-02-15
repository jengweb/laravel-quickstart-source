@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'events-meetings';
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
        'section_heading' => 'Capacities by Layout',
        'article_content' => '<p>To find availability and pricing information for your meeting and event, please <a href="#">request a meeting quote online.</a></p>',
        'room_type' => [
            [
                'class' => '',
                'label' => 'Event Room'
            ],
            [
                'class' => 'boardroom',
                'label' => 'Boardroom Style'
            ],
            [
                'class' => 'hollow-square',
                'label' => 'Hollow Square Style'
            ],
            [
                'class' => 'u-shape',
                'label' => 'U-shape Style'
            ],
            [
                'class' => 'classroom',
                'label' => 'Classroom Style'
            ],
            [
                'class' => 'banquet',
                'label' => 'Banquet Style'
            ],
            [
                'class' => 'reception',
                'label' => 'Reception Style'
            ],
            [
                'class' => 'theatre',
                'label' => 'Theatre Style'
            ],
            [
                'class' => 'cabaret',
                'label' => 'Cabaret Style'
            ]
        ],
        'object_data' => [
            [
                'id' => 'tinalak',
                'label' => 'Tinalak',
                'number' => [
                    'boardroom' => '12',
                    'hollow-square' => '18',
                    'u-shape' => '14',
                    'classroom' => '15',
                    'banquet' => '20',
                    'reception' => '30',
                    'theatre' => '32',
                    'cabaret' => '16'
                ]
            ],
            [
                'id' => 'abaca',
                'label' => 'Abaca',
                'number' => [
                    'boardroom' => '25',
                    'hollow-square' => '30',
                    'u-shape' => '27',
                    'classroom' => '60',
                    'banquet' => '20',
                    'reception' => '80',
                    'theatre' => '70',
                    'cabaret' => '48'
                ]
            ],
            [
                'id' => 'jusi',
                'label' => 'Jusi',
                'number' => [
                    'boardroom' => '20',
                    'hollow-square' => '20',
                    'u-shape' => '16',
                    'classroom' => '15',
                    'banquet' => '20',
                    'reception' => '30',
                    'theatre' => '35',
                    'cabaret' => '16'
                ]
            ],
            [
                'id' => 'sinamay',
                'label' => 'Sinamay',
                'number' => [
                    'boardroom' => '20',
                    'hollow-square' => '20',
                    'u-shape' => '20',
                    'classroom' => '15',
                    'banquet' => '20',
                    'reception' => '30',
                    'theatre' => '35',
                    'cabaret' => '16'
                ]
            ],
            [
                'id' => 'yakan',
                'label' => 'Yakan',
                'number' => [
                    'boardroom' => '30',
                    'hollow-square' => '28',
                    'u-shape' => '24',
                    'classroom' => '30',
                    'banquet' => '40',
                    'reception' => '95',
                    'theatre' => '72',
                    'cabaret' => '32'
                ]
            ],
            [
                'id' => 'pina',
                'label' => 'Pina',
                'number' => [
                    'boardroom' => '20',
                    'hollow-square' => '20',
                    'u-shape' => '20',
                    'classroom' => '15',
                    'banquet' => '20',
                    'reception' => '30',
                    'theatre' => '35',
                    'cabaret' => '16'
                ]
            ],
            [
                'id' => 'raffia',
                'label' => 'Raffia',
                'number' => [
                    'boardroom' => '10',
                    'hollow-square' => '',
                    'u-shape' => '',
                    'classroom' => '9',
                    'banquet' => '8',
                    'reception' => '16',
                    'theatre' => '18',
                    'cabaret' => '6'
                ]
            ],
            [
                'id' => 'ramie',
                'label' => 'Ramie',
                'number' => [
                    'boardroom' => '20',
                    'hollow-square' => '20',
                    'u-shape' => '20',
                    'classroom' => '15',
                    'banquet' => '30',
                    'reception' => '30',
                    'theatre' => '35',
                    'cabaret' => '16'
                ]
            ],
            [
                'id' => 'ramie_raffia',
                'label' => 'Ramie & Raffia',
                'number' => [
                    'boardroom' => '25',
                    'hollow-square' => '30',
                    'u-shape' => '27',
                    'classroom' => '60',
                    'banquet' => '20',
                    'reception' => '80',
                    'theatre' => '70',
                    'cabaret' => '48'
                ]
            ],
            [
                'id' => 'yakan_abaca_jusi',
                'label' => 'Yakan + Abaca + Jusi',
                'number' => [
                    'boardroom' => '60',
                    'hollow-square' => '60',
                    'u-shape' => '60',
                    'classroom' => '60',
                    'banquet' => '120',
                    'reception' => '180',
                    'theatre' => '180',
                    'cabaret' => '100'
                ]
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.table-swipe')

    <?php
    $template_item = [
        'format' => 'text-image', //default --> text-image (text-image, image-text)
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/events-meetings/01.jpg'),
                'alt' => '',
                'heading' => "Private Events at Flavors",
                'article_summary' => "<p>he two pools at Holiday Inn Resort Vanuatu offer the best of both worlds. The freeform Terrace Pool is located in our ‘non-active’ zone, one of the quietest parts of the resort. Take a dip, relax on a sun lounger, read in peace and quiet, and let the rest of the world just melt away</p>",
                'article_content' => "<p>he two pools at Holiday Inn Resort Vanuatu offer the best of both worlds. The freeform Terrace Pool is located in our ‘non-active’ zone, one of the quietest parts of the resort. Take a dip, relax on a sun lounger, read in peace and quiet, and let the rest of the world just melt away</p>",
                'link_url' => '/events-meetings-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/events-meetings/02.jpg'),
                'alt' => '',
                'heading' => "Private Events at Oz",
                'article_summary' => "<p>The Day Spa is a haven for pure self-indulgence, offering a variety of rejuvenating massages, body treatments, holistic therapies and more. The Hot Rocks Massage, which uses smooth, heated volcanic rocks to energise the body and soothe aching muscles</p>",
                'article_content' => '<p>The Day Spa is a haven for pure self-indulgence, offering a variety of rejuvenating massages, body treatments, holistic therapies and more. The Hot Rocks Massage, which uses smooth, heated volcanic rocks to energise the body and soothe aching muscles</p>',
                'link_url' => '/events-meetings-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/events-meetings/03.jpg'),
                'alt' => '',
                'heading' => "Platters-to-go & Meetings-on-the-Go",
                'article_summary' => "<p>While there are plenty of options to keep you active when you stay at Holiday Inn Resort Vanuatu, we also have a gym for the use of our in-house guests. Work up a sweat with our fitness equipment and full set of free weights.</p>",
                'article_content' => "<p>While there are plenty of options to keep you active when you stay at Holiday Inn Resort Vanuatu, we also have a gym for the use of our in-house guests. Work up a sweat with our fitness equipment and full set of free weights.</p>",
                'link_url' => '/events-meetings-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/events-meetings/04.jpg'),
                'alt' => '',
                'heading' => "Bento Boxes",
                'article_summary' => "<p>Holiday Inn Resort Vanuatu has got everything covered, whether you’re hoping to try your hand at paddle boarding or wanting to improve your tennis game. There are an extensive range of activities available at the resort including catamaran sailing, beach volleyball, snorkelling, tennis</p>",
                'article_content' => "<p>Holiday Inn Resort Vanuatu has got everything covered, whether you’re hoping to try your hand at paddle boarding or wanting to improve your tennis game. There are an extensive range of activities available at the resort including catamaran sailing, beach volleyball, snorkelling, tennis</p>",
                'link_url' => '/events-meetings-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/events-meetings/05.jpg'),
                'alt' => '',
                'heading' => "Packages",
                'article_summary' => "<p>Visit a local primary school and adore the smiles on the ‘Pikininis’ faces as you appreciate their latest artwork and they talk about the areas they are currently studying</p>",
                'article_content' => "<p>Visit a local primary school and adore the smiles on the ‘Pikininis’ faces as you appreciate their latest artwork and they talk about the areas they are currently studying</p>",
                'link_url' => '/events-meetings-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_list_block')

    <?php
    $template_item = [
        'background' => false,
        'section_heading' => 'Latest Offers',
        'sub_heading' => 'Dive straight in to your next vacation.',
        'link_url' => '/offers',
        'link_label' => 'See all offers',
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/offers-01.jpg'),
                'alt' => 'Free Lunch Boxes',
                'article_heading' => 'Free Lunch Boxes',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. viverra, vel finibus purus sagittis</p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. In eu placerat lectus. Cras hendrerit ipsum sagittis sem sodales blandit. Aenean eu hendrerit lacus.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/offers-02.jpg'),
                'alt' => 'Stay Romantic',
                'article_heading' => 'Stay Romantic',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis.</p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. In eu placerat lectus. Cras hendrerit ipsum sagittis sem sodales blandit. Aenean eu hendrerit lacus.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_slider')
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