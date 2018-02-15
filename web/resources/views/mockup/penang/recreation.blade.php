@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'homepage';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => '',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/desktop-slide-01.jpg'),
//        'mobile_image_url' => config('app.imagePath').'/recreation/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/desktop-slide-02.jpg'),
//        'mobile_image_url' => config('app.imagePath').'/recreation/mobile-slide-02.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/desktop-slide-03.jpg'),
//        'mobile_image_url' => config('app.imagePath').'/recreation/mobile-slide-03.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/desktop-slide-04.jpg'),
//        'mobile_image_url' => config('app.imagePath').'/recreation/mobile-slide-03.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'format' => 'content_align_left', //default --> content_align_left, content_align_right
        'section_heading' => 'Recreation & Facilities',
        'sub_heading' => 'Endless fun under the sun',
        'article' => "<p>The adventures are endless at the Holiday Inn Resort Vanuatu — from rainforest and waterfall hikes to underwater adventures and beach sports, just to name a few. While the little ones play at the Kids’ Club, parents can visit one of our sparkling pools, spoil themselves at the spa or sink a few holes at the adjacent golf course.</p>",
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/desktop-slide-04.jpg'),
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    $template_item = [
        'format' => 'image-text', //default --> text-image (text-image, image-text)
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/pool.jpg'),
                'alt' => '',
                'heading' => "Pools",
                'article_summary' => "<p>he two pools at Holiday Inn Resort Vanuatu offer the best of both worlds. The freeform Terrace Pool is located in our ‘non-active’ zone, one of the quietest parts of the resort. Take a dip, relax on a sun lounger, read in peace and quiet, and let the rest of the world just melt away</p>",
                'article_content' => "<p>he two pools at Holiday Inn Resort Vanuatu offer the best of both worlds. The freeform Terrace Pool is located in our ‘non-active’ zone, one of the quietest parts of the resort. Take a dip, relax on a sun lounger, read in peace and quiet, and let the rest of the world just melt away</p>",
                'link_url' => '/recreation-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/golf.jpg'),
                'alt' => '',
                'heading' => "Golf",
                'article_summary' => "<p>The Day Spa is a haven for pure self-indulgence, offering a variety of rejuvenating massages, body treatments, holistic therapies and more. The Hot Rocks Massage, which uses smooth, heated volcanic rocks to energise the body and soothe aching muscles</p>",
                'article_content' => '<p>The Day Spa is a haven for pure self-indulgence, offering a variety of rejuvenating massages, body treatments, holistic therapies and more. The Hot Rocks Massage, which uses smooth, heated volcanic rocks to energise the body and soothe aching muscles</p>',
                'link_url' => '/recreation-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/day-spa.jpg'),
                'alt' => '',
                'heading' => "Relaxation Awaits at the Holiday Inn Vanuatu Resort Day Spa",
                'article_summary' => "<p>While there are plenty of options to keep you active when you stay at Holiday Inn Resort Vanuatu, we also have a gym for the use of our in-house guests. Work up a sweat with our fitness equipment and full set of free weights.</p>",
                'article_content' => "<p>While there are plenty of options to keep you active when you stay at Holiday Inn Resort Vanuatu, we also have a gym for the use of our in-house guests. Work up a sweat with our fitness equipment and full set of free weights.</p>",
                'link_url' => '/recreation-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/gym.jpg'),
                'alt' => '',
                'heading' => "Stay in Shape at our Vanuatu Resort Gym",
                'article_summary' => "<p>Holiday Inn Resort Vanuatu has got everything covered, whether you’re hoping to try your hand at paddle boarding or wanting to improve your tennis game. There are an extensive range of activities available at the resort including catamaran sailing, beach volleyball, snorkelling, tennis</p>",
                'article_content' => "<p>Holiday Inn Resort Vanuatu has got everything covered, whether you’re hoping to try your hand at paddle boarding or wanting to improve your tennis game. There are an extensive range of activities available at the resort including catamaran sailing, beach volleyball, snorkelling, tennis</p>",
                'link_url' => '/recreation-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/resort-activities.jpg'),
                'alt' => '',
                'heading' => "Resort Activities",
                'article_summary' => "<p>Visit a local primary school and adore the smiles on the ‘Pikininis’ faces as you appreciate their latest artwork and they talk about the areas they are currently studying</p>",
                'article_content' => "<p>Visit a local primary school and adore the smiles on the ‘Pikininis’ faces as you appreciate their latest artwork and they talk about the areas they are currently studying</p>",
                'link_url' => '/recreation-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/resort-tour.jpg'),
                'alt' => '',
                'heading' => "Resort Tour",
                'article_summary' => "<p>All of our resort guests are treated like VIPs, even the little ones. At Holiday Inn Resort Vanuatu, your kids not only play free, they also eat and stay free. Children aged 12 and below eat breakfast, lunch and dinner without any charge when they dine at any of our restaurants with an adult</p>",
                'article_content' => "<p>All of our resort guests are treated like VIPs, even the little ones. At Holiday Inn Resort Vanuatu, your kids not only play free, they also eat and stay free. Children aged 12 and below eat breakfast, lunch and dinner without any charge when they dine at any of our restaurants with an adult</p>",
                'link_url' => '/recreation-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
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
        'background' => true,
        'section_heading' => 'Dining Offers',
        'sub_heading' => 'Dive straight in to your next holiday.',
        'link_url' => '/offers',
        'link_label' => 'See all special offers',
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/recreation/family-island-fun.jpg'),
                'alt' => 'Plan the Best Birthday Party in Vanuatu',
                'article_heading' => 'Family Island Fun Package!',
                'article_summary' => '<p>Get The Best Deal on Your Resort Holiday to Vanuatu</p>',
                'article_content' => '<p>Get The Best Deal on Your Resort Holiday to Vanuatu</p>',
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