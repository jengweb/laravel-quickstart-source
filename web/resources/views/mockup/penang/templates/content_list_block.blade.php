<section class="container content-list-block-section {{$template_item['format']}}">
  @foreach($template_item['object_data'] as $i => $k)
  <div class="grid-x list-wrapper">
    <div class="cell small-12  large-3 image-block-container">
      <a class="section-image" data-fancybox data-src="#reservation" href="{{ isset($k['reservation_url']) && !empty($k['reservation_url']) ? $k['reservation_url'] : '#reservation'}}">
        <span class="image ">
          <img src="{{$k['image_url']}}" alt="{{$k['alt']}}">
        </span>
        @if($k['reservation_form'] == true)
          <span class="btn btn-primary">Reservation/Enquiries</span>
        @endif
      </a>
    </div>
    <div class="cell small-12 large-auto article-block-container">
      <h2 class="heading">{!! $k['heading'] !!}</h2>
      <div class="article">
        {!! $k['article_summary'] !!}
      </div>
      @if(isset($k['link_url']) && !empty($k['link_url']))
        <div class="button-block">
          <a href="{{$k['link_url']}}" class="link">{{$k['link_label']}}</a>
        </div>
      @endif
    </div>
    @if(isset($k['info_item']) && !empty($k['info_item']))
    <div class="cell small-12 large-3 info-block-container">
      <ul>
        @foreach($k['info_item'] as $i => $k)
          @if(isset($k['link_url']) && !empty($k['link_url']))
          <li><a href="{{$k['link_url']}}" class="{{$k['item']}}">{!! $k['info'] !!}</a></li>
          @else
            <li class="{{$k['item']}}">{!! $k['info'] !!}</li>
          @endif
        @endforeach
      </ul>
    </div>
    @endif
  </div>
  @endforeach
</section>