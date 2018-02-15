@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'homepage';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Experience a variety of culinary delights',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/mobile-slide-02.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/desktop-slide-03.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/mobile-slide-03.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'section_heading' => "Kid's Club",
        'article_content' => "<p>The Holiday Inn Vanuatu resort's Kids’ Club is the place to be and our little guests love it! This dedicated facility for younger guests aged three to 12 years. We offers non-stop fun the whole day long with arts and crafts, games and an on-site play area. Our Kid's Club in Vanuatu is complimentary for in-house guests. Kid's Club is open daily from 9:00am to 9:00pm so Mum and Dad can have a break too! For children aged under three years, Pikinini Carers are available.</p>",
        'object_data' => [],
        'info_item' => [],
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/desktop-slide-03.jpg'),
                'alt' => '',
                'article_heading' => 'The Perfect Activities for Kids and Teens in Vanuatu',
                'link_url' => '/family-adventure-detail'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/Holiday-Inn-Resort-Van-016.jpg'),
                'alt' => '',
                'article_heading' => "Kids Stay & Eat Free Program",
                'link_url' => '/family-adventure-detail'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail')

@endsection

@section('scripts')
@endsection