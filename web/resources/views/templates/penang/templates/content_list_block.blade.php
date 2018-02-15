@if(isset_not_empty($pageItem))
    <?php
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
    $dataList = null;
    $fieldInfo = 'info';
    switch ($currentPage->template) {
        case 'homepage':
        case 'restaurants_and_bars':
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('restaurant');
            $fieldInfo = 'restaurant_info';
            break;
        case 'activities':
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('resort_activities');

            break;
        case 'recreation_facilities':
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('recreation_facilities');
            break;
        case 'events_meetings':
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('events');
            break;
        case 'meeting_room':
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('meetings');
            break;
        case 'catering_service':
            $dataList = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('catering_service');
            break;
    }

    ?>
    @if(isset_not_empty($dataList->items))

        <section class="container content-list-block-section {{ isset_not_empty($pageItem->format,'text-image') }}">
            @foreach($dataList->items as $i => $value)
                <div class="grid-x list-wrapper">
                    <div class="cell small-12  large-3 image-block-container">
                        <a class="section-image heading-form" data-heading="{{ isset_not_empty($value->heading) }}"
                           data-template="{{$currentPage->template}}"
                            @if($value->reservation_form === true)
                                data-fancybox data-src="#reservation"
                            @endif
                            @if(isset_not_empty($value->reservation_url))
                                href="{{ isset_not_empty($value->reservation_url) }}"
                            @endif
                        >
                        <span class="image ">
                            @if(isset_not_empty($value->image))
                                <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                     alt="{{ isset_not_empty($value->image_alt) }}">
                            @endif
                        </span>
                            @if($value->reservation_form === true)
                                <span class="btn btn-primary">
                                    {{ isset_not_empty($translate->reservation_enquiries_label,'Reservation/Enquiries') }}
                                </span>
                            @endif
                        </a>
                    </div>
                    <div class="cell small-12 large-auto article-block-container">
                        <h2 class="heading">{!! isset_not_empty($value->heading) !!}</h2>
                        <div class="article">
                            {!! isset_not_empty($value->article_summary) !!}
                        </div>
                        @if(isset_not_empty($value->link_url) && $value->link_url != '#')
                            <div class="button-block">
                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}" target="{{ $value->link_target }}"
                                   class="link">{{ isset_not_empty($value->link_label) }}</a>
                            </div>
                        @endif
                    </div>
                    @if(isset_not_empty($value->{$fieldInfo}))
                        <div class="cell small-12 large-3 info-block-container">
                            <ul>
                                @foreach($value->{$fieldInfo} as $i => $info)
                                    @if(isset_not_empty($info->link_url ) || isset_not_empty($info->file_document))
                                        <?php
                                            $linkUrl = \App\CMS\Helpers\CMSHelper::pageUrl($info->link_url);
                                            if(isset_not_empty($info->file_document)){
                                                $linkUrl = url($info->file_document);
                                            }
                                        ?>
                                        <li>
                                            <a href="{{ $linkUrl }}" target="{{ isset_not_empty($info->link_target) }}"
                                               class="heading-form {{ isset_not_empty($info->icon) }}"
                                               data-heading="{{ isset_not_empty($value->heading) }}"
                                               data-template="{{$currentPage->template}}"
                                            >
                                                {!! isset_not_empty($info->info) !!}
                                            </a>
                                        </li>
                                    @else
                                        <li class="{{ isset_not_empty($info->icon) }}">{!! isset_not_empty($info->info) !!}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
        </section>
        @if($currentPage->template == 'events_meetings' || $currentPage->template == 'catering_service'|| $currentPage->template == 'meeting_room')
            @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('templates.meeting_form'))
        @elseif($currentPage->template == 'restaurants_and_bars' || $currentPage->template == 'activities')
            @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('templates.proposal_form'))
        @endif
    @endif
@endif
