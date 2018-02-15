@if(isset_not_empty($pageItem))
    <?php
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $show_foreground = '';
    if ($pageItem->show_foreground == true) {
        $show_foreground = ' data-type=foreground';
    }
    ?>
    <section class="container hero-section"{{ $show_foreground }}>
        <div id="hero">
            @if(isset_not_empty($pageItem->images))
                @foreach($pageItem->images as $i => $value)
                    <div class="slide-item">
                        @if(isset_not_empty($value->video_url))
                            <div class="article-image">
                                <div class="image video-cover">
                                    @if(isset_not_empty($value->desktop_image))
                                        <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->desktop_image) }}"
                                             alt="{{ isset_not_empty($value->desktop_image_alt) }}" class="lazyload">
                                    @endif
                                    <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                                </div>
                                @if(strpos($value->video_url, 'youtu') !==false)
                                    <div class="video-wrapper">
                                        <video id="video_{{ $i+1 }}"
                                               data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $value->video_url }}"}] }'
                                               class="video-js vjs-default-skin" controls
                                               data-video="{{ $value->video_url }}"
                                               playsinline>
                                        </video>
                                    </div>
                                @endif
                            </div>
                        @else
                            @if(isset_not_empty($value->mobile_image))
                                <div class="image lazyload"
                                     data-bgset="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->mobile_image) }} [(max-width: 990px)] | {{ \App\CMS\Helpers\CMSHelper::thumbnail($value->desktop_image) }}"
                                     data-sizes="auto"></div>
                            @else
                                <div class="image lazyload"
                                     data-bgset="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->desktop_image) }}"
                                     data-sizes="auto"></div>
                            @endif
                        @endif
                        @if(isset_not_empty($value->title))
                           <div class="slide-title {{ $pageItem->show_foreground == true ? 'align-left' : ''}}">
                               <div class="title  scroll-parallax">{!! $value->title !!}</div>
                           </div>
                        @endif
                    </div>

                @endforeach
            @endif
        </div>


        @if($pageItem->show_foreground == true)
            <div class="foreground show-for-large">
                @if(isset_not_empty($pageItem->foreground_image))
                    <div class="image"
                         style="background-image: url('{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->foreground_image) }}')"></div>
                @endif
            </div>
        @endif
        @if(isset_not_empty($pageItem->images))
            @if(count($pageItem->images) > 1)
                <div class="slide-nav show-for-large"></div>
            @endif
        @endif
        <div class="anchor show-for-large">{{ isset_not_empty($translate->discover,'discover') }}</div>
    </section>
@endif