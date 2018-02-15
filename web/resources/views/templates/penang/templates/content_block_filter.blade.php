@if(isset_not_empty($pageItem))
    <?php
    $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $thumbClass = ' default';
    if (isset_not_empty($pageItem->format) == 'thumbs') {
        $thumbClass = ' thumbs-box';
    }
    $dataList = null;
    switch ($currentPage->template) {
        case 'homepage' :
        case 'accommodation' :
        case 'room_and_suites' :
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('rooms');
            break;
        case 'special_offers' :
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('offers');
            break;
        case 'latest_news' :
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('news');
            break;
    }
    ?>
    <section class="container content-block-section">
        @if(isset_not_empty($pageItem->section_heading))
            <h1 class="section-header">{!! $pageItem->section_heading !!}</h1>
        @endif
        <div class="filter-list">
            <select name="" id="mb_filters" class="hide-for-large">
                @if(isset_not_empty($dataList->items))
                <option value="*" data-filter="*">{{ isset_not_empty($translate->all_label,'All') }}</option>
                    @foreach($dataList->items as $i => $value)
                        @if(isset_not_empty($value->category))
                            <option value="cat-{{ $i }}"
                                    data-filter="cat-{{ $i }}">
                                {{ $value->category }}
                            </option>
                        @endif
                    @endforeach
                @endif
            </select>

            <ul id="desktop_filters" class="show-for-large">
                @if(isset_not_empty($dataList->items))
                    <li class="active">
                        <a href="#" data-filter="*">
                            {{ isset_not_empty($translate->view_all_label,'View all') }}
                        </a>
                    </li>
                    @foreach($dataList->items as $i => $value)
                        @if(isset_not_empty($value->category))
                            <li>
                                <a href="#" data-filter="cat-{{ $i }}">
                                    {{ $value->category }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div id="masonry" class="grid-x small-up-1 medium-up-2 large-up-3 content-block-filter" data-item="6">
            @if(isset_not_empty($dataList->items))
                @foreach($dataList->items as $i => $value)
                    @if(isset_not_empty($value->items))
                        @foreach($value->items as $item)
                            @if(isset_not_empty($value->category))
                                <div class="cell filter-item cat-{{ $i }}">
                                    <div class="article-box {{ $thumbClass }}">
                                        <div class="image-block-container">
                                            @if(isset_not_empty($pageItem->format) != 'thumbs')
                                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($item->link_url) }}"
                                                   target="{{ isset_not_empty($item->link_target,'_blank') }}"
                                                   class=""></a>
                                            @endif
                                            <div class="article-image">
                                                <div class="image">
                                                    @if(isset_not_empty($item->image))
                                                        <img
                                                            src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($item->image) }}"
                                                            alt="{{ isset_not_empty($item->image_alt) }}"
                                                            class="lazyload">
                                                    @endif
                                                </div>
                                                @if(isset_not_empty($pageItem->format) != 'thumbs')
                                                    <div class="article-heading">
                                                        <h3 class="article_heading">{!! isset_not_empty($item->article_heading)!!}</h3>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="article-block-container article">
                                            @if(isset_not_empty($pageItem->format) != 'default')
                                                <div class="article-heading">
                                                    <h3 class="article_heading">{!! isset_not_empty($item->article_heading) !!}</h3>
                                                </div>
                                            @endif
                                            @if(isset_not_empty($pageItem->format) == 'thumbs')
                                                @if(isset_not_empty($item->sub_content))
                                                    <div class="sub-content">
                                                        {!! $item->sub_content !!}
                                                    </div>
                                                @endif
                                            @endif
                                            <div class="article-summary">
                                                {!! isset_not_empty($item->article_summary) !!}
                                            </div>
                                            @if(isset_not_empty($item->link_url))
                                                <div class="button-block">
                                                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($item->link_url) }}"
                                                       target="{{ isset_not_empty($item->link_target) }}"
                                                       class="link">{{ isset_not_empty($item->link_label) }}</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </section>
@endif