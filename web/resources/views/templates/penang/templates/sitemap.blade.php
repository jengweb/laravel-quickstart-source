@if(isset_not_empty($pageItem))
    <section class="container text-section">
        <div class="cell small-12 large-auto article-block-container">
            <h1 class="heading">{!! isset_not_empty($pageItem->title) !!}</h1>
            @if(isset_not_empty($pageItem->sub_title))
                <h2 class="sub-heading">{!! $pageItem->sub_title !!}</h2>
            @endif
        </div>
        <div class="cell small-12 large-auto article-block-container" data-sitemap>
            <?php
            $except = [
                'sitemap',
            ];
            $sitemap = \App\CMS\Helpers\CMSHelper::getSiteMapData($except); ?>
                <ul>
                @foreach($sitemap as $key=>$value)
                    @if(isset_not_empty($value->children))
                        <li>
                            <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->friendly_url) }}">{{ isset_not_empty($value->name) }}</a>
                            <ul>
                            @foreach($value->children as $idx=>$val)
                                @if(isset_not_empty($val->name))
                                    <li><a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($val->friendly_url) }}">{{ isset_not_empty($val->name) }}</a></li>
                                    @endif
                            @endforeach
                            </ul>
                        </li>
                        @elseif(!isset_not_empty($value->parents))
                        <li><a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->friendly_url) }}">{{ isset_not_empty($value->name) }}</a></li>
                    @endif
                @endforeach
                </ul>
        </div>
    </section>
@endif