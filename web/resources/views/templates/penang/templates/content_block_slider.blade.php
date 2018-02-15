@if(isset_not_empty($pageItem))
    <?php
    $thumb_class = ' default';
    if (isset_not_empty($pageItem->format) == 'thumbs') {
        $thumb_class = ' thumbs-box';
    }
    $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
    $dataList = [];
    switch ($currentPage->template) {
        case 'homepage' :
        case 'room_and_suites_detail' :
            $data = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('rooms');

            foreach ($data->items as $value) {
                if (isset_not_empty($value->items)) {
                    foreach ($value->items as $val) {
                        array_push($dataList, $val);
                    }
                }
            }
            break;
    }
    ?>
    <section class="container content-block-section">
        @if(isset_not_empty($pageItem->section_heading))
            <div class="heading-box">
                <h2 class="heading">{!! $pageItem->section_heading !!}</h2>
                @if(isset_not_empty($pageItem->sub_heading))
                    <h3 class="sub-heading">{!! isset_not_empty($pageItem->sub_heading) !!}</h3>
                @endif
            </div>
        @endif
        <div class="slider-block-container">
            <div class="grid-x content-block-slider">
                @if(isset_not_empty($dataList))
                    @foreach ($dataList as $value)
                        @if($value->link_url !== $currentPage->friendly_url)
                            <div class="cell auto slide-item">
                                <div class="article-box {{$thumb_class}}">
                                    <div class="image-block-container">
                                        <div class="article-image">
                                            <div class="image">
                                                @if(isset_not_empty($value->image))
                                                    <img
                                                        src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                        alt="{{ isset_not_empty($value->image_alt) }}"
                                                        class="lazyload">
                                                @endif
                                            </div>
                                            @if(isset_not_empty($pageItem->format) != 'thumbs')
                                                <div class="article-heading">
                                                    <h3 class="article_heading">{!! isset_not_empty($value->article_heading) !!}</h3>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="article-block-container article">
                                        <div class="article-heading">
                                            <h3 class="article_heading">{!! isset_not_empty($value->article_heading) !!}</h3>
                                        </div>
                                        <div class="article-summary">
                                            {!! isset_not_empty($value->article_summary) !!}
                                        </div>
                                        @if(isset_not_empty($value->link_url))
                                            <div class="button-block">
                                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                                   target="{{ isset_not_empty($value->link_target,'_blank') }}"
                                                   class="link">{{ isset_not_empty($value->link_label) }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            @if(count($dataList) > 1)
                <div class="slide-dots hide-for-large"></div>
            @endif
            @if(count($dataList) > 3)
                <div class="slide-nav show-for-large"></div>
            @endif
        </div>
    </section>
@endif