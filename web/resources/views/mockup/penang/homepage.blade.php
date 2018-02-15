@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    //done
    $template = 'homepage';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Make You Next <br>Business Trip a Pleasure',
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
    ];
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    //done
    $template_item = [
        'format' => 'content_align_left', //default --> content_align_left, content_align_right
        'section_heading' => 'Welcome to Makati',
        'sub_heading' => ' Everything you could imagine.',
        'article' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. In eu placerat lectus. Cras hendrerit ipsum sagittis sem sodales blan dit. Aenean eu hendrerit lacus. Nulla facilisi. Suspendisse congue molestie tortor. In hac habitasse platea dictumst. Morbi laoreet, dui vel sagittis suscipit.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. In eu placerat lectus. Cras hendrerit ipsum sagittis sem sodales blan dit. Aenean eu hendrerit lacus. Nulla facilisi. Suspendisse congue molestie tortor. In hac habitasse platea dictumst. Morbi laoreet, dui vel sagittis suscipit.</p>',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/intro-01.jpg'),
//      'media_url' => 'https://www.youtube.com/watch?v=DUZvfW3SK5I',
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    //done
    $template_item = [
        'tile_box_1' => [
            'small_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/h-01.jpg'),
            'large_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/large-01.jpg'),
            'small_alt' => '',
            'large_alt' => '',
            'article_content' => 'Enjoy Our Facilities',
            'link_url' => '#',
//        'media_url' => 'https://www.youtube.com/watch?v=DUZvfW3SK5I'
        ],
        'tile_box_2' => [
            'small_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/h-02.jpg'),
            'small_alt' => '',
            'article_content' => '#MeetingTIME',
            'link_url' => '#'
        ],
        'tile_box_3' => [
            'small_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/h-03.jpg'),
            'small_alt' => '',
            'article_content' => '#VACATIONTIME',
            'link_url' => '#'
        ],
        'tile_box_4' => [
            'small_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/h-04.jpg'),
            'large_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/large-02.jpg'),
            'small_alt' => '',
            'large_alt' => '',
            'article_content' => 'Supreme Catering Services',
            'link_url' => '#'
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.tile_group_block')

    <?php
    //done
    $template_item = [
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/01.jpg'),
                'alt' => '',
                'link_url' => '#',
                'link_label' => 'Family Adventure'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/02.jpg'),
                'alt' => '',
                'link_url' => '#',
                'link_label' => 'Restaurant & Bar'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/03.jpg'),
                'alt' => '',
                'link_url' => '#',
                'link_label' => 'Events & Meetings'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/04.jpg'),
                'alt' => '',
                'link_url' => '',
                'link_label' => '',
                'media_url' => 'https://www.youtube.com/watch?v=DUZvfW3SK5I'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/05.jpg'),
                'alt' => '',
                'link_url' => '#',
                'link_label' => 'Recreation & Facilities'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/highlight/06.jpg'),
                'alt' => '',
                'link_url' => '#',
                'link_label' => 'Destination'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.tile_block')

    <?php
    //done
    $template_item = [
        'tile_box_1' => [
            'large_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/tile-01.jpg'),
            'small_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/tile-02.jpg'),
            'item' => [
                [
                    'class' => 'wifi',
                    'text' => 'Breakfast Choice'
                ],
                [
                    'class' => 'wifi',
                    'text' => 'A good night sleep'
                ]
            ]
        ],
        'tile_box_2' => [
            'media_url' => 'https://www.youtube.com/watch?v=DUZvfW3SK5I',
            'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/homepage/tile-03.jpg'),
            'article_heading' => 'Make your neck happy.',
            'article_content' => '<p>We understand the importance of a great night’s sleep. With your choice of soft or firm pillows, and a comfortable bed, you’ll wake up refreshed and energised.</p>',
            'item' => [
                [
                    'class' => 'wifi',
                    'text' => 'Service when you need it'
                ],
                [
                    'class' => 'wifi',
                    'text' => 'Wifi'
                ]
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.tile_grid_block')

    <?php
        //done
    $template_item = [
        'background' => true,
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
        'format' => 'thumbs', // default, thumbs
        'section_heading' => 'Accommodation',
        'sub_heading' => 'Discover types of room we offer',
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'article_heading' => 'Twin Room',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area.</p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-02.jpg'),
                'alt' => 'King Room',
                'article_heading' => 'King Room',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area.</p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'King Suite',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. </p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'King Suite',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. </p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_block_slider')

    <?php
        //done
    $template_item = [
        'format' => 'default', // default, thumbs
        'section_heading' => 'Accommodation',
        'sub_heading' => 'Discover types of room we offer',
        'category' => [
            [
                'category_id' => 'suites',
                'category_label' => 'Suites'
            ],
            [
                'category_id' => 'overwater_villas',
                'category_label' => 'Overwater Villas'
            ],
            [
                'category_id' => 'family_friendly',
                'category_label' => 'Family-friendly'
            ]
        ],
        'object_data' => [
            [
                'category_id' => 'suites',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'article_heading' => 'Twin Room',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area.</p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'overwater_villas',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-02.jpg'),
                'alt' => 'King Room',
                'article_heading' => 'King Room',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area.</p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'family_friendly',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'King Suite',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. </p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'suite',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'King Suite',
                'article_summary' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. </p>',
                'article_content' => '<p>The resort twin room features two queen size beds and 28 sqm of well appointed space including a balcony or patio area. The twin room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_block_filter')

    <?php
        //done
    $template_item = [
        'format' => 'text-image', //default --> text-image (text-image, image-text)
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'heading' => 'Verandah Restaurant',
                'article_summary' => '<p>Sit, relax and enjoy the expansive postcard view across the tropical lagoon to the resorts private island whilst you dine in the Verandah Restaurant. </p>',
                'article_content' => '<p>Sit, relax and enjoy the expansive postcard view across the tropical lagoon to the resorts private island whilst you dine in the Verandah Restaurant. Open daily for an extensive buffet breakfast and a la carte dinner, Chef’s creations are bound to tantalise your taste buds with </p>',
                'link_url' => '/restaurant-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu
                        'info' => 'Over looking Erakor Lagoon',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu
                        'info' => '6:00 am - 10:30 am, <br>6:00 pm – 10:00 pm',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'menu', //item: location,time,schedule,menu
                        'info' => 'See Menu',
                        'link_url' => '#'
                    ]
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'heading' => 'Pool Bar',
                'article_summary' => '<p>Wander up to the Pool Bar or allow one our team to serve you at your sun lounge and choose from our extensive all-day menu, drinks and cocktail selection. </p>',
                'article_content' => '<p>Wander up to the Pool Bar or allow one our team to serve you at your sun lounge and choose from our extensive all-day menu, drinks and cocktail selection. Our newly installed wood fire pizza oven, offers a wide range of tempting pizzas, both savoury and sweet. Ice-cream and sandwich bar are also available.</p>',
                'link_url' => '/restaurant-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu
                        'info' => 'Hotel Pool',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu
                        'info' => '8:00 am – 6.30 pm',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'menu', //item: location,time,schedule,menu
                        'info' => 'See Menu',
                        'link_url' => '#'
                    ]
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'heading' => 'Lobby Bar',
                'article_summary' => '<p>Relax in the Resort’s Lobby Bar infused with Melanesian charm and enjoy drinks and cocktails complemented by our tapas menu.  </p>',
                'article_content' => '<p>Relax in the Resort’s Lobby Bar infused with Melanesian charm and enjoy drinks and cocktails complemented by our tapas menu. Hot beverages, including coffee made by our experienced barista’s, and sweet selections are also available throughout the day.</p>',
                'link_url' => '/restaurant-detail',
                'link_label' => 'See details',
                'reservation_form' => true,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                    [
                        'item' => 'location', //item: location,time,schedule,menu
                        'info' => 'Hotel Lobby',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'time', //item: location,time,schedule,menu
                        'info' => '8:00 am til late',
                        'link_url' => ''
                    ],
                    [
                        'item' => 'menu', //item: location,time,schedule,menu
                        'info' => 'See Menu',
                        'link_url' => '#'
                    ]
                ]
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_list_block')

    <?php
        //done
    $template_item = [
        'heading' => 'Event Enquiry',
        'article_content' => '<p>Please complete the form below and one of our meetings team members will attend to your enquiry. Alternatively, you can contact us on +00(0) 0000 0000 or email <a href="mailto:info@hi-makati.com">info@hi-makati.com</a></p>'
    ]
    ?>
    @include('mockup.hi-makati.templates.meeting_form')

    <?php
        //done
    $template_item = [
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'article_heading' => 'Discover Vanuatu',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet </p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet feugiat. Vestibulum ex urna, ullamcorper eu rhoncus eget, aliquam eu ligula. Donec pharetra lorem ut nisl. </p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'article_heading' => 'Culture',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet </p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet feugiat. Vestibulum ex urna, ullamcorper eu rhoncus eget, aliquam eu ligula. Donec pharetra lorem ut nisl. </p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'article_heading' => 'Resort Location',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet </p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet feugiat. Vestibulum ex urna, ullamcorper eu rhoncus eget, aliquam eu ligula. Donec pharetra lorem ut nisl. </p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'article_heading' => 'Useful Information',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet </p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet feugiat. Vestibulum ex urna, ullamcorper eu rhoncus eget, aliquam eu ligula. Donec pharetra lorem ut nisl. </p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => '',
                'article_heading' => 'Local Attrations',
                'article_summary' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet </p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras varius ex at est aliquet feugiat. Vestibulum ex urna, ullamcorper eu rhoncus eget, aliquam eu ligula. Donec pharetra lorem ut nisl. </p>',
                'link_url' => '/destination-detail',
                'link_label' => 'See details'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_column_block')

    <?php
        //done
    $template_item = [
        'object_data' => [
            [
                'bg_color' => 'red', // red, blue, yellow
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/kids.jpg'),
                'alt' => 'Kids Stay & Eat Free',
                'heading' => 'Kids Stay & Eat Free',
                'link_url' => '#',
                'link_label' => 'See details'
            ],
            [
                'bg_color' => 'blue', // red, blue, yellow
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/kids.jpg'),
                'alt' => 'Join IHG Business Rewards',
                'heading' => 'Join IHG Business Rewards',
                'link_url' => '#',
                'link_label' => 'See details'
            ],
            [
                'bg_color' => 'yellow', // red, blue, yellow
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/kids.jpg'),
                'alt' => 'IHG® Rewards Club',
                'heading' => 'IHG<sup>®</sup> Rewards Club',
                'link_url' => '#',
                'link_label' => 'See details'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.ihg_group')

    <?php

    $template_item = [
        'section_heading' => 'Share your Holidays!',
        'link_url' => '#',
        'link_label' => 'See all feeds',
        'access_token' => '1434456566.1473709.83f39f62fa454c1ea0da402172bf995e'
    ]
    ?>
    @include('mockup.hi-makati.templates.instagram')

@endsection

@section('scripts')
    <script type="text/javascript">
        {{--window.accessToken = {--}}
            {{--access_token: {{ $template_item['access_token'] }}--}}
            {{--};--}}

            window.initPage = function () {
//      if (typeof initWidget === 'function') {
//          initMap(window.accessToken );
//      }
            if (typeof initLoader === 'function') {
                initLoader();
            }

            if (typeof initFilter === 'function') {
                initFilter();
            }
        }
    </script>
@endsection