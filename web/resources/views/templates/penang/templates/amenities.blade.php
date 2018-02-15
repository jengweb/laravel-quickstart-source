<div class="amenities-section">
    <h2 class="heading">{!! $pageItem->amenities_heading !!}</h2>
    <div class="grid-x list-item-wrapper">
        @if(isset_not_empty($pageItem->amenities_content))
            <div class="article-content">
                {!! $pageItem->amenities_content !!}
            </div>
        @endif
        @if(isset_not_empty($pageItem->amenities_list))
            @foreach($pageItem->amenities_list as $i => $value)
                <div class="cell small-12 large-auto list-item">
                    <div class="list-heading {{isset_not_empty($value->item_type)}}">
                        {!! isset_not_empty($value->list_heading) !!}
                    </div>
                    <ul>
                        @if(isset_not_empty($value->items))
                            @foreach($value->items as $idx => $item)
                                <li>{!! isset_not_empty($item->content_text) !!}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
</div>