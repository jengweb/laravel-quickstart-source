@if(isset_not_empty($pageItem))
    <section class="container ihg-group-section">
        <div id="ihg_group_slider" class="slider-box">
            @if(isset_not_empty($pageItem->items))
                @foreach($pageItem->items as $i => $value)
                    <div class="slide-item">
                        <div class="grid-x article-box {{ isset_not_empty($value->bg_color) }}">
                            <div class="cell small-6 image-block-container">
                                <div class="article-image">
                                    <div class="image">
                                        @if(isset_not_empty($value->image))
                                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                 alt="{{ isset_not_empty($value->image_alt)}}" class="lazyload">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="cell small-6">
                                <div class="article-block-container">
                                    <h2 class="heading">{!!  isset_not_empty($value->heading)!!}</h2>
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
                    </div>
                @endforeach
            @endif
        </div>
        <div class="slide-dots hide-for-large"></div>
    </section>
@endif