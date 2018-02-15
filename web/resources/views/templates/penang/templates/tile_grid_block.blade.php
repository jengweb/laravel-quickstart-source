@if(isset_not_empty($pageItem))
    <section class="container tile-grid-block-section">
        <div class="tile-box-1">
            <div class="content-block-wrapper">
                <div class="item-wrapper">
                    @if(isset_not_empty($pageItem->box_1_grid_items))
                        @foreach($pageItem->box_1_grid_items as $i => $value)
                            <div class="item">
                                <div
                                    class="text {{ isset_not_empty($value->icon) }}">{!! isset_not_empty($value->text) !!}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="image-block-wrapper">
                <div class="large-image-block">
                    <div class="article-image">
                        <div class="image">
                            @if(isset_not_empty($pageItem->box_1_large_image))
                                <img class="lazyload"
                                     src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_1_large_image) }}"
                                     alt="{{ isset_not_empty($pageItem->box_1_large_image_alt) }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="small-image-block">
                    <div class="article-image">
                        <div class="image">
                            @if(isset_not_empty($pageItem->box_1_small_image))
                                <img class="lazyload"
                                     src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_1_small_image) }}"
                                     alt="{{ isset_not_empty($pageItem->box_1_large_image_alt) }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile-box-2">
            <div class="image-block-wrapper">
                @if(isset_not_empty($pageItem->box_2_youtube_embed_url))
                    <div class="article-image">
                        <div class="image video-cover">
                            @if(isset_not_empty($pageItem->box_2_image))
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_2_image) }}"
                                     alt="{{ isset_not_empty($pageItem->box_2_image_alt) }}"
                                     class="lazyload">
                            @endif
                            <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                        </div>
                        @if(strpos($pageItem->box_2_youtube_embed_url, 'youtu') !==false)
                            <div class="video-wrapper">
                                <video id="video_tile"
                                       data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ isset_not_empty($pageItem->box_2_youtube_embed_url) }}"}] }'
                                       class="video-js vjs-default-skin" controls
                                       data-video="{{ isset_not_empty($pageItem->box_2_youtube_embed_url) }}"
                                       playsinline>
                                </video>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="article-image">
                        <div class="image">
                            @if(isset_not_empty($pageItem->box_2_image))
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_2_image) }}"
                                     alt="{{ isset_not_empty($pageItem->box_2_image) }}"
                                     class="lazyload">
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            <div class="content-block-wrapper">
                <div class="item-wrapper">
                    @foreach($pageItem->box_2_grid_items as $i => $value)
                        <div class="item">
                            <div
                                class="text {{ isset_not_empty($value->icon) }}">{!! isset_not_empty($value->text) !!}</div>
                        </div>
                    @endforeach
                </div>
                <div class="article-content-block">
                    <div class="article-content">
                        <div class="header-block">
                            <h2 class="article-heading">{!! isset_not_empty($pageItem->box_2_article_heading) !!}</h2>
                        </div>
                        {!! isset_not_empty($pageItem->box_2_article_content) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif