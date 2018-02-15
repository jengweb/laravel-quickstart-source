@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'homepage';
    $template_item = [
        'show_foreground' => true, //show H(character) --> true, false
        'title' => 'Make You Next <br>Business Trip a Pleasure',
        'object_data' => [
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/desktop-slide-01.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/mobile-slide-01.jpg')
            ],
            [
                'desktop_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/desktop-slide-02.jpg'),
                'mobile_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/mobile-slide-02.jpg')
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.hero')
    <?php
    $template_item = [
        'format' => 'content_align_right', //default --> content_align_left, content_align_right
        'section_heading' => 'Accommodation',
        'sub_heading' => ' Welcoming and Comfortable Vanuatu Accommodations',
        'article' => '<p>Tucked among tropical palms and nestled in the embrace of a secluded lagoon, the Holiday Inn Resort Vanuatu offers a variety of accommodation ranging from charming garden rooms to fabulous suites and well-appointed overwater villas. Each room features a private balcony or patio that overlooks landscaped gardens and are superbly appointed to ensure you enjoy a relaxing holiday in island paradise.</p>',
        'section_image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/desktop-slide-02.jpg'),
        'alt' => 'Everything you could imagine'
    ]
    ?>
    @include('mockup.hi-makati.templates.introduction')

    <?php
    $template_item = [
        'format' => 'default', // default, thumbs
        'section_heading' => '',
        'sub_heading' => '',
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
                'category_id' => 'suites family_friendly',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'article_heading' => 'Twin Room',
                'article_summary' => '<p>Our Twin Room has two comfortable queen size beds and 28-square-metres of well appointed space including a balcony or patio area. The room features Melanesian sand drawing murals and neutral colours.</p>',
                'article_content' => '<p>Our Twin Room has two comfortable queen size beds and 28-square-metres of well appointed space including a balcony or patio area. The room features Melanesian sand drawing murals and neutral colours.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'family_friendly',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-02.jpg'),
                'alt' => 'King Room',
                'article_heading' => 'King Room',
                'article_summary' => '<p>The King Room is the ideal way to enjoy what our island paradise has to offer. This 28-square-metre space is perfect for the independent traveller or couple on a Vanuatu getaway. Island comfort at its best.</p>',
                'article_content' => '<p>The King Room is the ideal way to enjoy what our island paradise has to offer. This 28-square-metre space is perfect for the independent traveller or couple on a Vanuatu getaway. Island comfort at its best.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'suites family_friendly',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'King Suite',
                'article_summary' => "<p>Our King Suite is a spacious option that's ideal for extended stays or when you just want to spoil yourself. It combines a King Room and a separate lounge area with its own sofa and LCD TV for that little added luxury.</p>",
                'article_content' => "<p>Our King Suite is a spacious option that's ideal for extended stays or when you just want to spoil yourself. It combines a King Room and a separate lounge area with its own sofa and LCD TV for that little added luxury.</p>",
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'suites family_friendly',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-04.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'Family Suite',
                'article_summary' => '<p>As the leading family resort in Vanuatu, our Family Suite has been designed with kids (big and small) in mind. This vibrant 56-square-metre room combines a King Room with a Banyan tree house-themed room for kids.</p>',
                'article_content' => '<p>As the leading family resort in Vanuatu, our Family Suite has been designed with kids (big and small) in mind. This vibrant 56-square-metre room combines a King Room with a Banyan tree house-themed room for kids.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'overwater_villas family_friendly',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-05.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'Overwater Family Villa',
                'article_summary' => '<p>If you’re looking for fun family accommodation in Vanuatu, this option ticks all the boxes. Our well-appointed Overwater Family Villas, located on the resort’s private Erongo Island, offers 47-square-metres of comfortable luxury.</p>',
                'article_content' => '<p>If you’re looking for fun family accommodation in Vanuatu, this option ticks all the boxes. Our well-appointed Overwater Family Villas, located on the resort’s private Erongo Island, offers 47-square-metres of comfortable luxury.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => 'overwater_villas',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-06.jpg'),
                'alt' => 'King Suite',
                'article_heading' => 'Overwater Villa',
                'article_summary' => '<p>The resort villas offer the perfect overwater accommodation for a unique and private romantic tropical getaway. Enjoy the views from your private balcony and direct access to the lagoon’s warm waters.</p>',
                'article_content' => '<p>The resort villas offer the perfect overwater accommodation for a unique and private romantic tropical getaway. Enjoy the views from your private balcony and direct access to the lagoon’s warm waters.</p>',
                'link_url' => '/accommodation-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_block_filter')

    <?php
    $template_item = [
        'background' => true,
        'section_heading' => 'Room Offers',
        'sub_heading' => 'Dive straight in to your next holiday.',
        'link_url' => '/offers',
        'link_label' => 'See all special offers',
        'object_data' => [
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/offer-01.jpg'),
                'alt' => 'Free Lunch Boxes',
                'article_heading' => 'Family Island Fun Package!',
                'article_summary' => '<p>Get The Best Deal on Your Resort Holiday to Vanuatu</p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. In eu placerat lectus. Cras hendrerit ipsum sagittis sem sodales blandit. Aenean eu hendrerit lacus.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ],
            [
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/offer-02.jpg'),
                'alt' => 'Stay Romantic',
                'article_heading' => 'Treat Yourself to a Family Holiday in Vanuatu Not to Be Forgotten',
                'article_summary' => '<p>If it’s a family getaway you’re planning, our Port Vila Vanuatu accommodation offers family villas and suites that tick all the boxes.</p>',
                'article_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius arcu nec ante viverra, vel finibus purus sagittis. In eu placerat lectus. Cras hendrerit ipsum sagittis sem sodales blandit. Aenean eu hendrerit lacus.</p>',
                'link_url' => '/offers-detail',
                'link_label' => 'See details',
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.content_slider')

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