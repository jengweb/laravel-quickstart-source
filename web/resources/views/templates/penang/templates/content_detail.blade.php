@if(isset_not_empty($pageItem))
    <?php
    $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $sideBar = null;
    switch ($currentPage->template) {
        case 'restaurants_bars_detail':
            $sideBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('restaurant');
            break;
        case 'activities_detail':
            $sideBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('activity');
            break;
        case 'recreation_facilities_detail':
            $sideBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('recreation_facilities');
            break;
        case 'events_meetings_detail':
            $sideBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('events');
            break;
        case 'destination_detail':
            $sideBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('destination');
            break;
    }
    ?>
    <section class="container content-detail-section">
        <div class="grid-x" data-equalizer data-equalize-on="large">
            <div class="cell small-12 large-auto article-block-container" data-equalizer-watch>
                <div class="heading-box">
                    <h1 class="heading">{!! isset_not_empty($pageItem->heading) !!}</h1>
                </div>

                <div class="article">
                    {!! isset_not_empty($pageItem->article_content) !!}
                </div>

                @if(isset_not_empty($pageItem->service_facilities))
                    @foreach($pageItem->service_facilities as $i => $k)
                        <div class="content-list-container">
                            <h2 class="heading">{!! isset_not_empty($k->article_heading) !!}</h2>
                            @if(isset_not_empty($k->article_content))
                                <div
                                    class="article {{ isset_not_empty($k->list_style) == 'column' ? 'list-column' : ''}}">
                                    {!! isset_not_empty($k->article_content) !!}
                                </div>
                            @endif
                            @if(isset_not_empty($k->information_item))
                                <div class="info-block-container">
                                    <ul>
                                        @foreach($k->information_item as $idx => $item)
                                            @if(isset_not_empty($item->icon) == 'reservation')
                                                <li><a data-fancybox data-src="#reservation"
                                                       data-enquiry="{!! isset_not_empty($k->article_heading) !!}"
                                                       href="{{ isset_not_empty($item->link_url,'#reservation') }}"
                                                       class="{{ isset_not_empty($item->icon) }}">{!! isset_not_empty($item->info) !!}</a>
                                                </li>
                                            @elseif(isset_not_empty($item->link_url) && isset_not_empty($item->icon) !== 'reservation')
                                                <li><a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($item->link_url) }}"
                                                       class="{{ isset_not_empty($item->icon) }}">{!! isset_not_empty($item->info) !!}</a>
                                                </li>
                                            @else
                                                <li class="{{ isset_not_empty($item->icon) }}">{!! isset_not_empty($item->info) !!}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(isset_not_empty($k->image))
                                <div class="image-block-container">
                                    <div class="section-image">
                                        <div class="image">
                                            <img class="lazyload"
                                                 src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($k->image) }}"
                                                 alt="{{ isset_not_empty($k->image_alt) }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif

                @if(isset($pageItem->information_item) && count($pageItem->information_item) > 0)
                    <div class="info-block-container">
                        <ul>
                            @foreach($pageItem->information_item as $i => $k)
                                @if(isset_not_empty($k->icon) == 'reservation')
                                    <li><a data-fancybox data-src="#reservation"
                                           href="{{ isset_not_empty($k->link_url,'#reservation')}}"
                                           data-heading="{{ isset_not_empty($pageItem->heading) }}"
                                           class="{{isset_not_empty($k->icon)}}">{!! isset_not_empty($k->info) !!}</a></li>
                                @elseif(isset_not_empty($k->link_url) && isset_not_empty($k->icon) !== 'reservation')
                                    <li><a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($k->link_url) }}"
                                           class="{{isset_not_empty($k->icon)}}">{!! isset_not_empty($k->info) !!}</a>
                                    </li>
                                @else
                                    <li class="{{isset_not_empty($k->icon)}}">{!! isset_not_empty($k->info) !!}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset_not_empty($pageItem->contact))
                    <div class="button-block">
                        <a href="mailto:{{ isset_not_empty($pageItem->contact) }}"
                           class="btn btn-default">{{ isset_not_empty($translate->contact_us_label,'Contact us') }}</a>
                    </div>
                @endif
            </div>
            <div class="cell small-12 large-4 side-block-container show-for-large" data-equalizer-watch>
                @if(isset_not_empty($sideBar))
                    @foreach($sideBar->items as $idx => $item)
                        @if($currentPage->friendly_url !== $item->link_url)
                            <div class="article-box">
                                <div class="image-block-container">
                                    <a href="{{\App\CMS\Helpers\CMSHelper::pageUrl($item->link_url)}}"></a>
                                    <div class="article-image">
                                        <div class="image">
                                            @if(isset_not_empty($item->image))
                                                <img class="lazyload"
                                                     src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($item->image) }}"
                                                     alt="{{ isset_not_empty($item->image_alt) }}">
                                            @endif
                                        </div>
                                        <div class="article-heading">
                                            <h3>{{ isset_not_empty($item->heading) }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endif