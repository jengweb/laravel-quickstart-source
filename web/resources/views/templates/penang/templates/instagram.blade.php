@if(isset_not_empty($pageItem))
    <?php $site = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('site');?>
    <section class="container instagram-section">
        <div class="grid-x">
            <div class="cell small-12 large-3">
                <div class="article-box">
                    <div class="article">
                        <h3 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h3>
                        @if(isset_not_empty($pageItem->link_url))
                            <div class="button-block">
                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($pageItem->link_url) }}"
                                   class="link">{{ isset_not_empty($pageItem->link_label) }}</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            {{--<div class="columns small-12 large-9">--}}
                {{--<div class="widget-block">--}}
                    {{--<div class="widget" data-token="{{ isset_not_empty($site->instagram_access_token) }}"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {!!   isset_not_empty($site->instagram_access_script) !!}
        </div>
    </section>
@endif