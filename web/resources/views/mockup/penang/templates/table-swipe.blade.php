<section class="container table-swipe-section">
  <div class="heading-box">
    <h1 class="heading">{!! $template_item['section_heading'] !!}</h1></div>
    <div class="article">
      {!! $template_item['article_content'] !!}
    </div>
    <div class="swipe-table-block-container">
      <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" tablesaw-all-cols-visible>
        <thead>
        <tr>
          @foreach($template_item['room_type'] as $i => $k)
            @if($i == 0)
            <th class="title" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{$k['label']}}</th>
            @else
            <th scope="col">
              <div class="icon {{$k['class']}}"></div>
              <div class="text">{{$k['label']}}</div>
            </th>
            @endif
          @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($template_item['object_data'] as $i => $k)
          <tr>
            <td class="title">{{$k['label']}}</td>
            @foreach($k['number'] as $idx => $item)
              <td>{{$item? $item : '-'}}</td>
            @endforeach
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</section>