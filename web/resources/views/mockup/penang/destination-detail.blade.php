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
        'section_heading' => "Rich with History, Vanuatu Beckons You for a Visit",
        'article_content' => "<p>Formerly known as the New Hebrides, Vanuatu is a group of 83 islands in the South Pacific Ocean, east of Australia and west of Fiji. In 1906, British and French settlers agreed to administer the islands jointly in what was called the British-French Condominium. This governing body lasted until the people of Vanuatu were granted independence in 1980.</p>
    <p>Efate is Vanuatu’s main island and is home to the capital, Port Vila. With a rugged coastline, rich marine life and an abundance of restaurants and bars, Efate is the most developed of Vanuatu’s islands and is the ideal base from which to explore the rest of the country.</p>
    <p>Vanuatu’s spectacular natural landscape gives rise to a bounty of activities and attractions that exhilarate the spirit and feed the soul. Guests can zip through dense jungle tops or stand atop active volcanoes. Vanuatu also has some of the world’s best dive sites, and PADI certified courses as well as leisure dives are available at a range of wreck and reef sites. The island's coconut-fringed beaches, serene botanical gardens and relaxed vibe are also perfect for holidaymakers looking to slow down and enjoy an idyllic island getaway.</p>",
        'object_data' => [],
        'info_item' => [],
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/Holiday-Inn-Resort-Van-115.jpg'),
                'alt' => '',
                'article_heading' => 'Immerse Yourself in Vanuatu Culture at Holiday Inn Resort',
                'link_url' => '/destination-detail'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/destination/resort-location.jpg'),
                'alt' => '',
                'article_heading' => "Resort Location",
                'link_url' => '/destination-detail'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail')
@endsection

@section('scripts')
@endsection