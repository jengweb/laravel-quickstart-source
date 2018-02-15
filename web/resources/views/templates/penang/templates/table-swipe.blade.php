@if(isset_not_empty($pageItem))
    <?php
    $roomType = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('room_type');
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    ?>
    <section class="container table-swipe-section">
        <div class="heading-box">
            <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1></div>
        <div class="article">
            {!! isset_not_empty($pageItem->article_content) !!}
        </div>
        <div class="swipe-table-block-container">
            <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" tablesaw-all-cols-visible>
                <thead>
                <tr>
                    <th class="title" data-tablesaw-sortable-col
                        data-tablesaw-priority="persist">{{ isset_not_empty($translate->event_room_label,'Event Room') }}</th>
                    @if(isset_not_empty($roomType->items))
                        @foreach($roomType->items as $i => $k)
                            <th scope="col">
                                <div class="icon {{ isset_not_empty($k->icon_class) }}"></div>
                                <div class="text">{{ isset_not_empty($k->title) }}</div>
                            </th>
                        @endforeach
                            <th><i class="fa fa-search"></i></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(isset_not_empty($pageItem->event_rooms))
                    @foreach($pageItem->event_rooms as $i => $k)
                        <tr>
                            <td class="title">{{ isset_not_empty($k->title) }}</td>
                            @if(isset_not_empty($roomType->items))
                                @foreach($roomType->items as $idx => $item)
                                    <td>{{ isset_not_empty($k->{str_replace('-','_',$item->icon_class)})  }}</td>
                                @endforeach
                            @endif
                            <td>
                                @if(isset_not_empty($k->link_url))
                                    <a href="{{ $k->link_url }}" target="{{ isset_not_empty($k->link_target,'_self') }}" title="{{ isset_not_empty($translate->see_details) }}">
                                    <i class="fa fa-search"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </section>
@endif