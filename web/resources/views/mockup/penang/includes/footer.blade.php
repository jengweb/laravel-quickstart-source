<?php
$template_item = [
    'format' => 'background', //default ==> default ,background
    'social_item' => [
        [
            'link_url' => '#',
            'class' => 'facebook' // facebook, twitter, instagram, linkedin, tripadvisor, youtube, tumblr
        ],
        [
            'link_url' => '#',
            'class' => 'twitter' // facebook, twitter, instagram, linkedin, tripadvisor, youtube, tumblr
        ],
        [
            'link_url' => '#',
            'class' => 'instagram' // facebook, twitter, instagram, linkedin, tripadvisor, youtube, tumblr
        ]
    ],
    'navigation' => [
        'heading' => '',
        'object_data' => [
            [
                'link_url' => '#',
                'link_label' => 'Sitemap'
            ],
            [
                'link_url' => '#',
                'link_label' => 'Privacy Policy'
            ]
        ]
    ],
    'contact' => [
        'heading' => '',
        'article' => ''
    ],
    'bp_guarantee' => [
        'link_url' => '#',
        'tel' => '+0000 0000',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/bp-guarantee.png'),
        'alt' => ''
    ],
    'logo' => [
        [
            'link_url' => '#',
            'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/kids-stay.jpg'),
            'alt' => ''
        ],
        [
            'link_url' => '#',
            'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/green-engage.jpg'),
            'alt' => ''
        ]
    ],
    'application' => [
        'article' => '<p>For Wherever Life Takes You
<a href="#">Learn more</a> about our free apps
and mobile websites</p>',
        'object_data' => [
            [
                'link_url' => '#',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/app-store.png')
            ],
            [
                'link_url' => '#',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/google-play.png')
            ]
        ]
    ]
];
$ihg_brand = [
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/ihg-brand.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/ihg-brand.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/interCon.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/interCon.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/kimpton.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/kimpton.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hualuxe.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/hualuxe.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/holidayInn.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/holidayInn.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/holidayInn-express.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/holidayInn-express.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/staybridge.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/staybridge.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/indigo.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/indigo.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/evenHotels.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/evenHotels.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/crowneplaza.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/crowneplaza.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/holidayInn-vacations.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/holidayInn-vacations.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/holidayInn-resort.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/holidayInn-resort.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/candlewood.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/candlewood.png')
    ],
    [
        'link_url' => '#',
        'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/ihg-rewards.png'),
        'hover_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/ihg/hover/ihg-rewards.png')
    ]
]
?>
<footer>
    <div class="grid-x footer-bar-top{{$template_item['format'] == 'default' ? '' : ' background'}}">
        <div class="cell small-12 medium-4">
            <div class="guest-review-wrapper">
                <h4 class="heading">Guest reviews</h4>
                <div id="IWSfrContainer"></div>
            </div>
        </div>
        <div class="cell small-12 medium-3 large-4">
            <div class="social-wrapper">
                <h4 class="heading">Get Connected</h4>
                <ul class="social-list">
                    @foreach($template_item['social_item'] as $i => $k)
                        <li><a href="{{$k['link_url']}}"><i class="fa fa-{{$k['class']}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="cell small-12 medium-5 large-4">
            <div class="newsletter-wrapper">
                <h4 class="heading">Newsletter Signup</h4>
                <form class="main-form">
                    <div class="form-group">
                        <label for="newsletter" class="ui-hidden">Newsletter</label>
                        <input type="email" class="form-control" placeholder="Your email">
                        <div class="button-block">
                            <a href="#" class="link">Subscribe</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bar-bottom{{$template_item['format'] == 'default' ? '' : ' background'}}">
        <div class="grid-x">
            <div class="cell small-12 large-4">
                <div class="navigation-wrapper">
                    @if(isset($template_item['navigation']['heading'])  && !empty($template_item['navigation']['heading']))
                        <h4 class="heading">{!! $template_item['navigation']['heading'] !!}</h4>
                    @endif
                    <ul>
                        @foreach($template_item['navigation']['object_data'] as $i => $k)
                            <li><a href="{{$k['link_url']}}">{{$k['link_label']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if(isset($template_item['contact']) && !empty($template_item['contact']))
                <div class="cell small-12 large-4">
                    <div class="contact-wrapper">
                        @if(isset($template_item['contact']['heading'])  && !empty($template_item['contact']['heading']))
                            <h4 class="heading">{!! $template_item['contact']['heading'] !!}</h4>
                        @endif
                        <div class="article">
                            {!! $template_item['contact']['article'] !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="grid-x ihg-info-bar">
            <div class="cell small-12 medium-auto large-5 bp-guarantee-wrapper">
                <div class="image-box">
                    <a href="{{$template_item['bp_guarantee']['link_url']}}" target="_blank">
                        <img src="{{$template_item['bp_guarantee']['image_url']}}"
                             alt="{{$template_item['bp_guarantee']['alt']}}">
                    </a>
                </div>
                <div class="info-box">
                    <div class="heading">Book online or call</div>
                    <a href="tel:{{$template_item['bp_guarantee']['tel']}}">{{$template_item['bp_guarantee']['tel']}}</a>
                </div>
            </div>
            @if(isset($template_item['logo']) && count($template_item['logo']) > 0)
                <div class="cell small-12 medium-4 large-4 logo-wrapper">
                    <ul>
                        @foreach($template_item['logo'] as $i => $k)
                            <li><a href="{{$k['link_url']}}" target="_blank"><img src="{{$k['image_url']}}"
                                                                                  alt="{{$k['alt']}}"></a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="cell small-8 medium-3 large-3 application-wrapper ">
                @foreach($template_item['application']['object_data'] as $i => $k)
                    <span class="image"><a href="{{$k['link_url']}}" target="_blank"><img src="{{$k['image_url']}}"
                                                                                          alt=""></a></span>
                @endforeach
                <div class="article">
                    {!! $template_item['application']['article'] !!}
                </div>
            </div>
        </div>
        @include('mockup.hi-makati.templates.ihg_brand_bar')
    </div>
    <div class="copyright">© 2017 IHG. All rights reserved. Most hotels are independently owned and operated.</div>
</footer>