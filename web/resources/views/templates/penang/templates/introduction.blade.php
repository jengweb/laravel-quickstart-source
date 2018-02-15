@if(isset_not_empty($pageItem))
    <?php $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage(); ?>
    <section id="sticky" class="container introduction-section" data-sticky>
        <div class="clearfix">
            @if(isset_not_empty($pageItem->format) == 'content_align_left')
                <div class="article-block-container" data-sticky-content>
                    @if($currentPage->template == 'homepage')
                        <h2 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h2>
                    @else
                        <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1>
                    @endif
                    @if( isset_not_empty($pageItem->sub_heading) )
                        <h3 class="sub-heading">{!! $pageItem->sub_heading !!}</h3>
                    @endif
                    <div class="article">
                        {!! isset_not_empty($pageItem->article) !!}
                    </div>
                </div>
                <div class="image-block-container show-for-large" data-sticky-sidebar>
                    @if(isset_not_empty($pageItem->media_url))
                        <div class="section-image article-image">
                            <div class="image video-cover">
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->image) }}" alt="{{ isset_not_empty($pageItem->image_alt) }}"
                                     class="lazyload">
                                <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                            </div>
                            @if(strpos($pageItem->media_url, 'youtu') !==false)
                                <div class="video-wrapper">
                                    <video id="video_introduction"
                                           data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ isset_not_empty($pageItem->media_url) }}"}] }'
                                           class="video-js vjs-default-skin" controls
                                           data-video="{{ isset_not_empty($pageItem->media_url) }}" playsinline>
                                    </video>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="section-image">
                            <div class="image">
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->image) }}" alt="{{ isset_not_empty($pageItem->image_alt) }}"
                                     class="lazyload">
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="cell small-12 large-6 image-block-container show-for-large">
                    @if(isset_not_empty($pageItem->media_url))
                        <div class="section-image article-image">
                            <div class="image video-cover">
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->image) }}" alt="{{ isset_not_empty($pageItem->image_alt) }}"
                                     class="lazyload">
                                <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                            </div>
                            @if(strpos($pageItem->media_url, 'youtu') !==false)
                                <div class="video-wrapper">
                                    <video id="video_introduction"
                                           data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ isset_not_empty($pageItem->media_url) }}"}] }'
                                           class="video-js vjs-default-skin" controls
                                           data-video="{{ isset_not_empty($pageItem->media_url) }}" playsinline>
                                    </video>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="section-image">
                            <div class="image">
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->image) }}" alt="{{ isset_not_empty($pageItem->image_alt) }}"
                                     class="lazyload">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="cell small-12 large-6 article-block-container">
                    @if($currentPage->template == 'homepage')
                        <h2 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h2>
                    @else
                        <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1>
                    @endif
                    @if( isset_not_empty($pageItem->sub_heading) )
                        <h3 class="sub-heading">{!! $pageItem->sub_heading !!}</h3>
                    @endif
                    <div class="article">
                        {!! isset_not_empty($pageItem->article) !!}
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if(isset_not_empty($pageItem->show_content_list))
        @if($currentPage->template === 'destination' && $pageItem->show_content_list === true)
            @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('templates.content_column_block'))
        @else
        @if($currentPage->template === 'destination')
            @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('templates.content_column_block'))
        @endif
        @endif
    @endif
@endif
