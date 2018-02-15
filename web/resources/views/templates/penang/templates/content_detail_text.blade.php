@if(isset_not_empty($pageItem))
    <?php
    $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $sideBar = null;
    switch ($currentPage->template) {
        case 'press_release':
            $sideBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('press_release');
            break;
    }
    ?>
    <section class="container content-detail-section content-detail-text-section">
        <div class="grid-x" data-equalizer data-equalize-on="large">
            <div class="cell small-12 large-auto article-block-container" data-equalizer-watch>
                <div class="heading-box">
                    <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1>
                </div>
                @if(isset_not_empty($pageItem->image))
                    <div class="section-image">
                        <div class="image">
                            <img class="lazyload" src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->image) }}"
                                 alt="{{ isset_not_empty($pageItem->image_alt) }}">
                        </div>
                    </div>
                @endif
                <div class="article">
                    @if(isset_not_empty($pageItem->article_heading))
                        <h2 class="article-heading">{!! $pageItem->article_heading !!}</h2>
                    @endif
                    @if(isset_not_empty($pageItem->sub_heading))
                        <h3 class="sub-heading">{!! $pageItem->sub_heading !!}</h3>
                    @endif
                    <div class="article-content">
                        {!! isset_not_empty($pageItem->article_content) !!}
                    </div>
                </div>
            </div>
            <div class="cell small-12 large-4 side-block-container show-for-large" data-equalizer-watch>
                @foreach($pageItem->side as $idx => $item)
                    <div class="article-box">
                        <div class="image-block-container">
                            @if(isset_not_empty($item->link_url))
                                <a href="{{$item->link_url}}"></a>
                            @endif
                            <div class="article-image">
                                <div class="image">
                                    @if(isset_not_empty($item->image))
                                        <img class="lazyload"
                                             src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($item->image) }}"
                                             alt="{{isset_not_empty($item->image_alt)}}">
                                    @endif
                                </div>
                                <div class="article-heading">
                                    <h3>{{ isset_not_empty($item->article_heading) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if(isset($pageItem->link_url) && !empty($pageItem->link_url))
                <div class="cell small-12 button-block">
                    <a href="{{$pageItem->link_url}}" class="link">{{$pageItem->link_label}}</a>
                </div>
            @endif
        </div>
    </section>
@endif