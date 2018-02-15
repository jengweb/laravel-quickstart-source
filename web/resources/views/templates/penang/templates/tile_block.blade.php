@if(isset_not_empty($pageItem))
    <section class="container tile-section">
        <div class="grid-x tile-box-wrapper">
            @if(isset_not_empty($pageItem->items))
                @foreach($pageItem->items as $i => $value)
                    @if($i < 4)
                        <div class="cell small-12 medium-6 large-4 tile-box" data-item="{{$i+1}}">
                            @if(isset_not_empty($value->media_url))
                                <div class="article-image">
                                    <div class="image video-cover">
                                        @if(isset_not_empty($value->image))
                                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                 alt="{{ isset_not_empty($value->image_alt) }}" class="lazyload">
                                        @endif
                                        <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                                    </div>
                                    @if(strpos($value->media_url, 'youtu') !==false)
                                        <div class="video-wrapper">
                                            <video id="video_{{$i+1}}"
                                                   data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ isset_not_empty($value->media_url) }}"}] }'
                                                   class="video-js vjs-default-skin" controls
                                                   data-video="{{ isset_not_empty($value->media_url) }}"
                                                   playsinline>
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="article-image">
                                    <div class="image">
                                        @if(isset_not_empty($value->image))
                                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                 alt="{{ isset_not_empty($value->image_alt) }}" class="lazyload">
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if(isset_not_empty($value->link_url))
                                <div class="heading">
                                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                       target="{{ isset_not_empty($value->link_target,'_blank') }}">{{ isset_not_empty($value->link_label) }}</a>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
                <div class="grid-x tile-group-wrapper">
                    @foreach($pageItem->items as $i => $value)
                        @if($i >= 4 && $i <= 6)
                            <div class="cell small-12 medium-6 large-12 tile-box" data-item="{{$i+1}}">
                                @if(isset_not_empty($value->media_url))
                                    <div class="article-image">
                                        <div class="image video-cover">
                                            @if(isset_not_empty($value->image))
                                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                     alt="{{ isset_not_empty($value->image_alt) }}"
                                                     class="lazyload">
                                            @endif
                                            <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                                        </div>
                                        @if(strpos($value->media_url, 'youtu') !==false)
                                            <div class="video-wrapper">
                                                <video id="video_{{$i+1}}"
                                                       data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ isset_not_empty($value->media_url) }}"}] }'
                                                       class="video-js vjs-default-skin" controls
                                                       data-video="{{ isset_not_empty($value->media_url) }}"
                                                       playsinline>
                                                </video>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="article-image">
                                        <div class="image">
                                            @if(isset_not_empty($value->image))
                                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                     alt="{{ isset_not_empty($value->image_alt) }}"
                                                     class="lazyload">
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if(isset_not_empty($value->link_url))
                                    <div class="heading">
                                        <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}">{{ isset_not_empty($value->link_label) }}</a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif