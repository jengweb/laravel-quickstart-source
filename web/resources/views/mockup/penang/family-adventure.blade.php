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
        'format' => 'content_align_right', //default --> content_align_left, content_align_right
        'section_heading' => 'Family Adventure',
        'sub_heading' => 'Connect on Your Family Holiday in Vanuatu',
        'article' => "<p>Family time at Holiday Inn Resort Vanuatu is magic for everyone and the various activities at the Resort set the standard. We strive to fulfil every need, providing family-oriented options one expects from a Holiday Inn Resort, including on-site recreation, fun things to do in Vanuatu, a Pikinini Carer (nanny service) and a supervised Kids’ Club.</p>",
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/desktop-slide-01.jpg'),
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    $template_item = [
        'format' => 'image-text', //default --> text-image (text-image, image-text)
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/HIRVanuatu---Kids-Club-MOTT_002.jpg'),
                'alt' => '',
                'heading' => "Kid's Club",
                'article_summary' => "<p>The Holiday Inn Vanuatu resort's Kids’ Club is the place to be and our little guests love it! This dedicated facility for younger guests aged three to 12 years.</p>",
                'article_content' => "<p>The Holiday Inn Vanuatu resort's Kids’ Club is the place to be and our little guests love it! This dedicated facility for younger guests aged three to 12 years.</p>",
                'link_url' => '/family-adventure-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [

                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/desktop-slide-03.jpg'),
                'alt' => '',
                'heading' => "The Perfect Activities for Kids and Teens in Vanuatu",
                'article_summary' => "<p>Vanuatu holidays with kids are all about FUN and keeping everyone entertained. The Holiday Inn Resort Activities Program ensures there is something to keep kids busy and engaged. Traditional Vanuatu activities such as basket weaving, skirt</p>",
                'article_content' => '<p>Vanuatu holidays with kids are all about FUN and keeping everyone entertained. The Holiday Inn Resort Activities Program ensures there is something to keep kids busy and engaged. Traditional Vanuatu activities such as basket weaving, skirt</p>',
                'link_url' => '/family-adventure-detail',
                'link_label' => 'See details',
                'reservation_form' => false,
                'reservation_url' => '', // if have url --> link out 3rd party ,have not --> lightbox
                'info_item' => [
                ]
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/family-adventure/Holiday-Inn-Resort-Van-016.jpg'),
                'alt' => '',
                'heading' => "Kids Stay & Eat Free Program",
                'article_summary' => "<p>All of our resort guests are treated like VIPs, even the little ones. At Holiday Inn Resort Vanuatu, your kids not only play free, they also eat and stay free. Children aged 12 and below eat breakfast, lunch and dinner without any charge when they dine at any of our restaurants with an adult</p>",
                'article_content' => "<p>All of our resort guests are treated like VIPs, even the little ones. At Holiday Inn Resort Vanuatu, your kids not only play free, they also eat and stay free. Children aged 12 and below eat breakfast, lunch and dinner without any charge when they dine at any of our restaurants with an adult</p>",
                'link_url' => '/family-adventure-detail',
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