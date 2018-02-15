<?php
$logo_type = "vertical"; // vertical, horizon
$logo = \App\CMS\Helpers\CMSHelper::getAssetPath('images/logo-vert.png');
$main_nav = [
    'show_image' => true,
    'object_data' => [
        [
            'link_url' => '/accommodation',
            'link_label' => 'Accommodation',
            'sub_menu' => [
                [
                    'data_id' => 'twin-room',
                    'link_url' => '#',
                    'link_label' => 'Twin Room',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/menu/01.jpg')
                ],
                [
                    'data_id' => 'king-room',
                    'link_url' => '#',
                    'link_label' => 'King Room',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/menu/02.jpg')
                ],
                [
                    'data_id' => 'king-suit',
                    'link_url' => '#',
                    'link_label' => 'King Suit',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/menu/03.jpg')
                ],
                [
                    'data_id' => 'family-suit',
                    'link_url' => '#',
                    'link_label' => 'Family Suit',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/menu/04.jpg')
                ],
                [
                    'data_id' => 'family-villa',
                    'link_url' => '#',
                    'link_label' => 'Family Villa',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/menu/05.jpg')
                ],
                [
                    'data_id' => 'overwater-villa',
                    'link_url' => '#',
                    'link_label' => 'Overwater Villa',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/menu/06.jpg')
                ]
            ]
        ],
        [
            'link_url' => '/restaurant-bars',
            'link_label' => 'Restaurants & Bars',
            'sub_menu' => [
                [
                    'data_id' => 'verandah',
                    'link_url' => '#',
                    'link_label' => 'Verandah Restaurant',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/menu/01.jpg')
                ],
                [
                    'data_id' => 'pool-bar',
                    'link_url' => '#',
                    'link_label' => 'Pool Bar',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/menu/02.jpg')
                ],
                [
                    'data_id' => 'lobby-bar',
                    'link_url' => '#',
                    'link_label' => 'Lobby Bar',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/menu/03.jpg')
                ],
                [
                    'data_id' => 'themed',
                    'link_url' => '#',
                    'link_label' => 'Themed Dining',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/restaurants/menu/04.jpg')
                ]
            ]
        ],
        [
            'link_url' => '/family-adventure',
            'link_label' => 'Family Adventure'
        ],
        [
            'link_url' => '/recreation',
            'link_label' => 'Recreation & Facilities'
        ],
        [
            'link_url' => '/events-meetings',
            'link_label' => 'Events & Meetings'
        ],
        [
            'link_url' => '/destination',
            'link_label' => 'Destination',
            'sub_menu' => [
                [
                    'data_id' => 'destination1',
                    'link_url' => '#',
                    'link_label' => 'Destination1',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/menu/01.jpg')
                ],
                [
                    'data_id' => 'destination2',
                    'link_url' => '#',
                    'link_label' => 'Destination2',
                    'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/menu/02.jpg')
                ]
            ]
        ],
        [
            'link_url' => '/gallery',
            'link_label' => 'Gallery'
        ],
        [
            'link_url' => '/offers',
            'link_label' => 'Offers'
        ]
    ]

];
$secondary_nav = [
    [
        'link_url' => '/',
        'link_label' => 'Home'
    ],
    [
        'link_url' => '/about',
        'link_label' => 'About Us'
    ],
    [
        'link_url' => '/latest-news',
        'link_label' => 'Latest News'
    ],
    [
        'link_url' => '/contact',
        'link_label' => 'Contact Us'
    ]
];
$language = [
    'show_flags' => true,
    'object_data' => [
        [
            'name' => 'EN',
            'value' => 'en'
        ],
        [
            'name' => 'TH',
            'value' => 'th'
        ],
        [
            'name' => 'JP',
            'value' => 'jp'
        ]
    ]
];
?>

<header id="header">
    <div class="secondary-header"></div>
    <div class="grid-x main-header">
        <div class="shrink cell logo-wrapper">
            <div class="logo" data-type="{{$logo_type}}"><a href="/"><img src="{{$logo}}" alt=""></a></div>
        </div>
        <div class="auto cell navigation-wrapper">
            <div class="nav-toggle toggle" data-toggle="navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div id="language_bar" class="language-bar {{$language['show_flags'] == true ? 'show-icon' : ''}}">
                <div class="language-text">
                    @if($language['show_flags'] == true)
                        <span data-icon class="flag-icon flag-icon-{{$language['object_data'][0]['value']}}"></span>
                    @endif
                    <span class="language-name">En</span>
                </div>

                <ul id="language" class="language-item">
                    @foreach($language['object_data'] as $i => $k)
                        <li data-value="{{$k['value']}}" class="">
                            @if($language['show_flags'] == true)
                                <span data-icon class="flag-icon flag-icon-{{$k['value']}}"></span>
                            @endif
                            <span class="name">{{$k['name']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="navigation" class="nav-panel-wrapper">
                <div class="nav-panel">
                    <div class="booking-toggle">
                        <button class="btn btn-default">Book now</button>
                    </div>
                    <div class="main-nav">
                        <ul>
                            @foreach($main_nav['object_data'] as $i => $k)
                                <?php
                                $child_class = '';
                                if (isset($k['sub_menu']) && !empty($k['sub_menu'])) {
                                    $child_class .= ' class=has-child';
                                }
                                ?>
                                <li{{$child_class}}>
                                    <a href="{{$k['link_url']}}">{{$k['link_label']}}</a>
                                    @if(isset($k['sub_menu']) && !empty($k['sub_menu']))
                                        <div
                                            class="grid-x sub-menu{{$main_nav['show_image'] == true?' show-image':''}}">
                                            <ul class="shrink cell sub-menu-list">
                                                @foreach($k['sub_menu'] as $idx => $item)
                                                    <li data-id="{{$item['data_id']}}"
                                                        data-image="{{!empty($item['image_url'])? $item['image_url'] : '' }}">
                                                        <a href="{{$item['link_url']}}">{{$item['link_label']}}</a></li>
                                                @endforeach
                                            </ul>
                                            @if($main_nav['show_image'] == true)
                                                <div class="auto cell image-menu-list">
                                                    <div class="image">
                                                        <img class="lazyload" src="{{$k['sub_menu'][0]['image_url']}}"
                                                             alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="secondary-nav">
                        <ul>
                            @foreach($secondary_nav as $i => $k)
                                <li><a href="{{$k['link_url']}}">{{$k['link_label']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>