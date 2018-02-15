<?php
    $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('destination');
?>
@if(isset_not_empty($dataList->items))
    <section class="container content-column-block-section">
        <div class="clearfix" data-equrizer data-equire-on="large">
            @foreach($dataList->items as $i => $value)
                <div class="article-box" data-equrizer-watch>
                    <div class="grid-x">
                        <div class="cell small-12 medium-auto image-block-container">
                            <div class="article-image">
                                <div class="image">
                                    @if(isset_not_empty($value->image))
                                        <img class="lazyload"
                                             src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                             alt="{{ isset_not_empty($value->image_alt) }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 medium-8 article-block-container">
                            <h2 class="heading">{!! isset_not_empty($value->heading) !!}</h2>
                            <div class="article-summary">
                                {!! isset_not_empty($value->article_summary) !!}
                            </div>
                            @if(isset_not_empty($value->link_url))
                                <div class="button-block">
                                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                       class="link">{{ isset_not_empty($value->link_label) }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif