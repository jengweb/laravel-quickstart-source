@extends('mockup.hi-makati.layout.master')

@section('content')
    <?php
    $template = 'gallery';
    $template_item = [
        'section_heading' => 'Gallery',
        'category' => [
            [
                'category_id' => 'rooms',
                'category_label' => 'Rooms'
            ],
            [
                'category_id' => 'restaurants_bars',
                'category_label' => 'Restaurants & Bars'
            ],
            [
                'category_id' => 'recreations_facilities',
                'category_label' => 'Recreations & Facilities'
            ],
            [
                'category_id' => 'events_meetings',
                'category_label' => 'Events & Meetings'
            ]
        ],
        'object_data' => [
            [
                'category_id' => 'rooms',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'restaurants_bars',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'rooms',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'restaurants_bars',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'recreations_facilities',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'rooms',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'events_meetings',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'restaurants_bars',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ],
            [
                'category_id' => 'events_meetings',
                'image_url' => \App\CMS\Helpers\CMSHelper::getAssetPath('images/accommodation/accommodation-01.jpg'),
                'alt' => 'Twin Room',
                'title' => 'Twin Room'
            ]
        ]
    ]
    ?>
    @include('mockup.hi-makati.templates.gallery')

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