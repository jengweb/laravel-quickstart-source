@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'latest-news';

    $template_item = [
        'format' => 'thumbs', // default, thumbs
        'section_heading' => 'Latest News',
        'sub_heading' => '',
        'category' => [
            [
                'category_id' => '2017',
                'category_label' => '2017'
            ]
        ],
        'object_data' => [
            [
                'category_id' => '2017',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'An island Christmas',
                'sub_content' => '30 August 2017',
                'article_heading' => 'An island Christmas',
                'article_summary' => '<p>Here are six (6) reasons why you should book your Holiday Inn Resort Vanuatu Christmas escape now!</p>',
                'article_content' => '<p>Here are six (6) reasons why you should book your Holiday Inn Resort Vanuatu Christmas escape now!</p>',
                'link_url' => '/latest-news-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => '2017',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-02.jpg'),
                'alt' => 'King Room',
                'sub_content' => '7 August 2017',
                'article_heading' => 'Great Destination Weddings Magazine, Real Wedding',
                'article_summary' => '<p>Deanna and Michael had fallen in love with Vanuatu, which is why they chose to marry in this island paradise. Enjoy reading about their stunning day in the most recent edition of Great Destination Weddings Magazine.</p>',
                'article_content' => '<p>Deanna and Michael had fallen in love with Vanuatu, which is why they chose to marry in this island paradise. Enjoy reading about their stunning day in the most recent edition of Great Destination Weddings Magazine.</p>',
                'link_url' => '/latest-news-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => '2017',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'sub_content' => '6 July 2017',
                'article_heading' => "It's All About The Kids",
                'article_summary' => "<p>Family holidays are no chore at Holiday Inn Resort Vanuatu. They are full of fun with loads of activities for the little kids and the big kids, ensuring everyone has a memorable stay at Vanuatu's leading family resort.</p>",
                'article_content' => "<p>Family holidays are no chore at Holiday Inn Resort Vanuatu. They are full of fun with loads of activities for the little kids and the big kids, ensuring everyone has a memorable stay at Vanuatu's leading family resort.</p>",
                'link_url' => '/latest-news-detail',
                'link_label' => 'See details',
            ],
            [
                'category_id' => '2017',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-03.jpg'),
                'alt' => 'King Suite',
                'sub_content' => '30 June 2017',
                'article_heading' => 'NEW Look Website',
                'article_summary' => '<p>Let your holiday begin before you even arrive with our new website.</p>',
                'article_content' => '<p>Let your holiday begin before you even arrive with our new website.</p>',
                'link_url' => '/latest-news-detail',
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