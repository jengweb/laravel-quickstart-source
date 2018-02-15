<div class="amenities-section">
  <h2 class="heading">{!! $template_item['amenities']['heading'] !!}</h2>
  <div class="grid-x list-item-wrapper">
    @if(isset($template_item['amenities']['article_content']) && !empty($template_item['amenities']['article_content']))
      <div class="article-content">
        {!! $template_item['amenities']['article_content'] !!}
      </div>
    @endif
    @if(isset($template_item['amenities']['object_data']) && count($template_item['amenities']['object_data']))
    @foreach($template_item['amenities']['object_data'] as $i => $k)
      <div class="cell small-12 large-auto list-item">
        <div class="list-heading {{$k['item']}}">{!! $k['list_heading'] !!}</div>
        <ul>
          @foreach($k['list_data'] as $idx => $item)
            <li>{!! $item['item'] !!}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
    @endif
  </div>
</div>