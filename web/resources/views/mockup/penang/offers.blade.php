@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'offers';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Book your perfect island stay now',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/mobile-slide-02.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')

    <?php
    $template_item = [
        'format' => 'content_align_right', //default --> content_align_left, content_align_right
        'section_heading' => 'Special Offers',
        'sub_heading' => 'Amazing stays, great-value Vanuatu holiday packages',
        'article' => '<p>Give yourself the holiday you deserve at the Holiday Inn Resort Vanuatu. Whether you’re looking for a fun-filled family vacation or a romantic escape, we have package to best suit your needs.</p>',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/HIRVanuatu---Family-hammock-&-tree-MOTT-009_2.jpg'),
//      'media_url' => 'https://www.youtube.com/watch?v=DUZvfW3SK5I',
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    $template_item = [
        'format' => 'default', // default, thumbs
        'section_heading' => 'Accommodation',
        'sub_heading' => 'Discover types of room we offer',
        'category' => [
            [
                'category_id' => 'packages',
                'category_label' => 'Packages'
            ],
            [
                'category_id' => 'dining',
                'category_label' => 'Dining'
            ],
            [
                'category_id' => 'weddings',
                'category_label' => 'Weddings'
            ],
            [
                'category_id' => 'events',
                'category_label' => 'Events'
            ]
        ],
        'object_data' => [
            [
                'category_id' => 'dining',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/HIRVanuatu---Romantic-Dinner-MOTT-21.jpg'),
                'alt' => 'Stay Romantic',
                'article_heading' => 'Stay Romantic',
                'article_summary' => '<p>Celebrate a special occasion or spoil that special someone. Enjoy the superb service of your own personal waiter while dining in a private, tiki torch-lit cabana overlooking the tranquil waters of Erakor Lagoon.</p>',
                'article_content' => '<p>Celebrate a special occasion or spoil that special someone. Enjoy the superb service of your own personal waiter while dining in a private, tiki torch-lit cabana overlooking the tranquil waters of Erakor Lagoon.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'weddings',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/wedding-offer.jpg'),
                'alt' => 'Tugeta Wedding Package',
                'article_heading' => 'Tugeta Wedding Package',
                'article_summary' => '<p>A once-in-a-lifetime occasion deserves an idyllic destination where everything can easily be taken care of.</p>',
                'article_content' => '<p>A once-in-a-lifetime occasion deserves an idyllic destination where everything can easily be taken care of.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'dining',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/HIRVanuatu---Fireshow-MOTT-18.jpg'),
                'alt' => 'Fire Night Dinner',
                'article_heading' => 'Fire Night Dinner',
                'article_summary' => '<p>Relax on the Resort beach, feel the sand between your toes and indulge in a delicious extensive buffet dinner created by our team of talented chefs.</p>',
                'article_content' => '<p>Relax on the Resort beach, feel the sand between your toes and indulge in a delicious extensive buffet dinner created by our team of talented chefs.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'events',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/offer-meeting-packages.jpg'),
                'alt' => 'Meeting Packages',
                'article_heading' => 'Meeting Packages',
                'article_summary' => '<p>When you’re planning an event, it’s important to select the right venue and at times you simply need a private, well-appointed space to host your small meeting or conference.</p>',
                'article_content' => '<p>When you’re planning an event, it’s important to select the right venue and at times you simply need a private, well-appointed space to host your small meeting or conference.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'packages',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/Couple_and_Overwater_Vila_720x450.jpg'),
                'alt' => 'Weekend Getaway Package',
                'article_heading' => 'Weekend Getaway Package',
                'article_summary' => '<p>Your weekend island escape awaits at Holiday Inn Resort Vanuatu.</p>',
                'article_content' => '<p>Your weekend island escape awaits at Holiday Inn Resort Vanuatu.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'dining',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/offers/Stars_Melissa_Findley-Vanuatu-MFBlog-55.jpg'),
                'alt' => 'Night Under the Stars ',
                'article_heading' => 'Night Under the Stars ',
                'article_summary' => '<p>Discover a unique Vanuatu dining experience! Enjoy the ambience on our resort beach while indulging in a sumptuous dinner complete with irresistible desserts and live entertainment.</p>',
                'article_content' => '<p>Discover a unique Vanuatu dining experience! Enjoy the ambience on our resort beach while indulging in a sumptuous dinner complete with irresistible desserts and live entertainment.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_block_filter')


@endsection

@section('scripts')
    <script type="text/javascript">
        window.initPage = function () {
            if (typeof initFilter === 'function') {
                initFilter();
            }
        }
    </script>
@endsection