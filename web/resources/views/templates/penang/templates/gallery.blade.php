@if(isset_not_empty($pageItem))
    <?php
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $order = 1;
    ?>
    <section class="container gallery-section">
        @if(isset_not_empty($pageItem->section_heading))
            <h1 class="section-header">{!! $pageItem->section_heading !!}</h1>
        @endif
        <div class="filter-list">
            <select name="" id="mb_filters" class="hide-for-large">
                <option value="*" data-filter="*">{{ isset_not_empty($translate->all_label,'All') }}</option>
                @if(isset_not_empty($pageItem->images_category))
                    @foreach($pageItem->images_category as $i => $value)
                        @if(isset_not_empty($value->category))
                            <option value="cat-{{ $i }}"
                                    data-filter="cat-{{ $i }}">{{ $value->category }}</option>
                        @endif
                    @endforeach
                @endif
            </select>

            <ul id="desktop_filters" class="show-for-large">
                <li class="active">
                    <a href="#" data-filter="*">{{ isset_not_empty($translate->view_all_label,'View All') }}</a>
                </li>
                @if(isset_not_empty($pageItem->images_category))
                    @foreach($pageItem->images_category as $i => $value)
                        @if(isset_not_empty($value->category))
                            <li>
                                <a href="#" data-filter="cat-{{ $i }}">{{ $value->category }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div id="masonry" class="grid-x small-up-1 medium-up-2 large-up-3 content-block-filter" data-item="6">
            @if(isset_not_empty($pageItem->images_category))
                @foreach($pageItem->images_category as $i => $cat)
                    @if(isset_not_empty($cat->items))
                        @foreach($cat->items as $idx => $value)
                            @if(isset_not_empty($value->video_url))
                                <div
                                    class="cell filter-item cat-{{ $i }}"
                                    data-type="video">
                                    <div class="image-block-container">
                                        <div class="article-image">
                                            <div class="video-box">
                                                @if(isset_not_empty($value->video_url))
                                                    <iframe src="{{$value->video_url}}" frameborder="0"></iframe>
                                                @endif
                                            </div>
                                            <div class="image">
                                                @if(isset_not_empty($value->image))
                                                    <img
                                                        src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                        alt="{{ isset_not_empty($value->image_alt) }}" class="lazyload">
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="hover-block show-for-large">{{ isset_not_empty($translate->see_image_label,'See image +') }}</div>
                                    </div>
                                </div>
                            @else
                                <div class="cell filter-item cat-{{ $i }}"
                                    data-type="image">
                                    <div class="image-block-container">
                                        <div class="article-image">
                                            <div class="image">
                                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                     alt="{{ isset_not_empty($value->image_alt) }}"
                                                     class="lazyload"
                                                     data-title="{{ isset_not_empty($value->title) }}"
                                                >
                                            </div>
                                        </div>
                                        <div
                                            class="hover-block show-for-large">{{ isset_not_empty($translate->see_image_label,'See image +') }}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
        <div class="button-block load-more hiding">
            <a href="#" class="link">{{ isset_not_empty($translate->load_more_label,'Load more') }}</a>
        </div>
    </section>
@endif