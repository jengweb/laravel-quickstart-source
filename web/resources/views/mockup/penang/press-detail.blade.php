@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'recreation-detail';
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
        'section_heading' => 'Press Releases',
        'article_heading' => 'Charity Project 2016',
        'sub_heading' => '02 August',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/press/01.jpg'),
        'alt' => '',
        'article_content' => '<p>Welcome to  the 11th Charity Project, August 2nd, 2016 was our annual charity day. We organized various activities for the school in order to help more children who need help in education. Every year, we are selecting a local school and provides upgrades, scholarships, uniforms, painting mission, clean up service and a day of fun activities. </p>
<p>This year, Watsuwankeereewong School Patong was selected and 580 children received sport and school uniforms and many donations to help out with expenses.</p><p>We are proud to take the initiative to fulfill our Corporate Social Responsibility and giving back to the local community with their education is an important part of our community service.  The community events link us with Phuket people and show that we care for our neighborhood. </p>',
        'link_url' => '#',
        'link_label' => 'See all articles',
        'side' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/golf.jpg'),
                'alt' => '',
                'article_heading' => 'Golf',
                'link_url' => '#'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/day-spa.jpg'),
                'article_heading' => 'Day spa',
                'alt' => '',
                'link_url' => '#'
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/gym.jpg'),
                'article_heading' => 'Gym',
                'alt' => '',
                'link_url' => '#'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_detail_text')

@endsection

@section('scripts')

@endsection