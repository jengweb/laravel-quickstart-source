@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'about';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Discover serenity and happiness at Vanuatu.',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/about/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/about/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/about/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/about/mobile-slide-02.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'section_heading' => 'About us',
        'sub_heading' => 'About The Holiday Inn Vanuatu Resort',
        'article_content' => '<p>Tucked within more than 40 acres of tropical palms and nestled against the shores of the Erakor Lagoon, this oasis offers affordable luxury combined with the genuine, unaffected warmth and friendliness of the Ni-Vanuatu people. In a remote setting that defines paradise, the Holiday Inn Resort Vanuatu immerses you in an authentic Melanesian experience.</p>
    <p>The Holiday Inn Resort Vanuatu is a short 10-minute drive from the airport and boasts 148 guestrooms, two pool areas, a Kids’ Club, day spa, nine-hole golf course and a variety of fabulous food and beverage outlets. Wi-Fi is available at the resort and family stays are extra affordable with Holiday Inn Resorts’ signature ‘Kids Stay and Eat Free’ programme.</p>',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/about/01.jpg'),
        'alt' => ''
    ]
    ?>
    @include('mockup.hi-makati.templates.text')


@endsection

@section('scripts')

@endsection