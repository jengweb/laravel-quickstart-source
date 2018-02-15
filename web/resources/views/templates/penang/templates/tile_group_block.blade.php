@if(isset_not_empty($pageItem))
    <section class="container tile-group-section">
        <div class="grid-x">
            <div class="cell small-12 large-6 tile-wrapper">
                <div class="grid-x tile-box-group" data-group="1">
                    <div class="cell small-12 large-4 small">
                        <div class="grid-x">
                            <div class="cell small-6 large-12">
                                <div class="article-image">
                                    <div class="image">
                                        @if(isset_not_empty($pageItem->box_1_small_image))
                                            <img
                                                src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_1_small_image) }}"
                                                alt="{{ isset_not_empty($pageItem->box_1_small_image_alt) }}"
                                                class="lazyload">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="cell small-6 large-12">
                                <div class="article-content">
                                    <div class="article">
                                        {!! isset_not_empty($pageItem->box_1_article_content) !!}
                                    </div>
                                    @if(isset_not_empty($pageItem->box_1_link_url))
                                        <a href="{{ $pageItem->box_1_link_url}}"
                                           target="{{ isset_not_empty($pageItem->box_1_link_target,'_self') }}"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell small-12 large-8 large">
                        @if(isset_not_empty($pageItem->box_1_youtube_embed_url))
                            <div class="article-image">
                                <div class="image video-cover">
                                    <img src="{{$pageItem->box_1_large_image}}"
                                         alt="{{$pageItem->box_1_large_image_alt}}" class="lazyload">
                                    <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                                </div>
                                @if(strpos($pageItem->box_1_youtube_embed_url, 'youtu') !==false)
                                    <div class="video-wrapper">
                                        <video id="video_tile_01"
                                               data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$pageItem->box_1_youtube_embed_url}}"}] }'
                                               class="video-js vjs-default-skin" controls
                                               data-video="{{$pageItem->box_1_youtube_embed_url}}" playsinline>
                                        </video>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="article-image">
                                <div class="image">
                                    <img src="{{$pageItem->box_1_large_image}}"
                                         alt="{{$pageItem->box_1_large_image_alt}}" class="lazyload">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="grid-x tile-box-inline" data-group="2">
                    <div class="cell small-4">
                        <div class="article-image">
                            <div class="image">
                                @if(isset_not_empty($pageItem->box_2_small_image))
                                    <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_2_small_image) }}"
                                         alt="{{ isset_not_empty($pageItem->box_2_small_image_alt) }}" class="lazyload">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="cell small-8 article-content">
                        {!! isset_not_empty($pageItem->box_2_article_content) !!}
                        @if(isset_not_empty($pageItem->box_2_link_url))
                            <a href="{{ $pageItem->box_2_link_url}}"
                               target="{{ isset_not_empty($pageItem->box_2_link_target,'_self') }}"></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="cell small-12 large-6 tile-wrapper">
                <div class="grid-x tile-box-inline" data-group="3">
                    <div class="cell small-8 article-content">
                        {!! isset_not_empty($pageItem->box_3_article_content) !!}
                        @if(isset_not_empty($pageItem->box_3_link_url))
                            <a href="{{ $pageItem->box_3_link_url }}"
                               target="{{ isset_not_empty($pageItem->box_3_link_target,'_self') }}"></a>
                        @endif
                    </div>
                    <div class="cell small-4">
                        <div class="article-image">
                            <div class="image">
                                @if(isset_not_empty($pageItem->box_3_small_image))
                                    <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_3_small_image) }}"
                                         alt="{{ isset_not_empty($pageItem->box_3_small_image_alt) }}" class="lazyload">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x tile-box-group" data-group="4">
                    <div class="cell small-12 large-8 large">
                        @if(isset_not_empty($pageItem->box_4_youtube_embed_url))
                            <div class="article-image">
                                <div class="image video-cover">
                                    <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_4_large_image) }}"
                                         alt="{{ isset_not_empty($pageItem->box_4_large_image_alt) }}" class="lazyload">
                                    <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                                </div>
                                @if(strpos($pageItem->box_4_youtube_embed_url, 'youtu') !==false)
                                    <div class="video-wrapper">
                                        <video id="video_tile_04"
                                               data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$pageItem->box_4_youtube_embed_url}}"}] }'
                                               class="video-js vjs-default-skin" controls
                                               data-video="{{ $pageItem->box_4_youtube_embed_url }}" playsinline>
                                        </video>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="article-image">
                                <div class="image">
                                    @if(isset_not_empty($pageItem->box_4_large_image))
                                        <img
                                            src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_4_large_image) }}"
                                            alt="{{ isset_not_empty($pageItem->box_4_large_image_alt) }}"
                                            class="lazyload">
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="cell small-12 large-4 small">
                        <div class="grid-x">
                            <div class="cell small-6 large-12">
                                <div class="article-content">
                                    <div class="article">
                                        {!! isset_not_empty($pageItem->box_4_article_content) !!}
                                    </div>
                                    @if(isset_not_empty($pageItem->box_4_link_url))
                                        <a href="{{ $pageItem->box_4_link_url}}"
                                           target="{{ isset_not_empty($pageItem->box_4_link_target,'_self') }}"></a>
                                    @endif
                                </div>
                            </div>
                            <div class="cell small-6 large-12">
                                <div class="article-image">
                                    <div class="image">
                                        @if(isset_not_empty($pageItem->box_4_small_image))
                                            <img
                                                src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->box_4_small_image) }}"
                                                alt="{{ isset_not_empty($pageItem->box_4_small_image_alt) }}"
                                                class="lazyload">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif