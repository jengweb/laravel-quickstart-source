<section class="container content-detail-section">
  <div class="grid-x" data-equalizer data-equalize-on="large">
    <div class="cell small-12 large-auto article-block-container" data-equalizer-watch>
      <div class="heading-box">
        <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
      </div>

      <div class="article">
        {!! $template_item['article_content'] !!}
      </div>

      @if(count($template_item['object_data']) > 0)
        @foreach($template_item['object_data'] as $i => $k)
        <div class="content-list-container">
          <h2 class="heading">{!! $k['article_heading'] !!}</h2>
          @if(isset($k['article_content']) && !empty($k['article_content']))
          <div class="article {{$k['list_style'] == 'column' ? 'list-column' : ''}}">
            {!! $k['article_content'] !!}
          </div>
          @endif
          @if(isset($k['info_item']) && count($k['info_item']) > 0)
            <div class="info-block-container">
              <ul>
                @foreach($k['info_item'] as $idx => $item)
                  @if($item['item'] == 'reservation')
                    <li><a data-fancybox data-src="#reservation" href="{{ isset($item['link_url']) && !empty($item['link_url']) ? $item['link_url'] : '#reservation'}}" class="{{$item['item']}}">{!! $item['info'] !!}</a></li>
                  @elseif(isset($item['link_url']) && !empty($item['link_url']) && $item['item'] !== 'reservation')
                    <li><a href="{{$item['link_url']}}" class="{{$item['item']}}">{!! $item['info'] !!}</a></li>
                  @else
                    <li class="{{$item['item']}}">{!! $item['info'] !!}</li>
                  @endif
                @endforeach
              </ul>
            </div>
          @endif

          @if(isset($k['image_url']) && !empty($k['image_url']))
            <div class="image-block-container">
              <div class="section-image">
                <div class="image">
                  <img class="lazyload" src="{{$k['image_url']}}" alt="{{$k['alt']}}">
                </div>
              </div>
            </div>
          @endif
        </div>
        @endforeach
      @endif

      @if(isset($template_item['info_item']) && count($template_item['info_item']) > 0)
        <div class="info-block-container">
          <ul>
            @foreach($template_item['info_item'] as $i => $k)
            @if($k['item'] == 'reservation')
              <li><a data-fancybox data-src="#reservation" href="{{ isset($k['link_url']) && !empty($k['link_url']) ? $k['link_url'] : '#reservation'}}" class="{{$k['item']}}">{!! $k['info'] !!}</a></li>
            @elseif(isset($k['link_url']) && !empty($k['link_url']) && $k['item'] !== 'reservation')
              <li><a href="{{$k['link_url']}}" class="{{$k['item']}}">{!! $k['info'] !!}</a></li>
            @else
              <li class="{{$k['item']}}">{!! $k['info'] !!}</li>
            @endif
              @endforeach
          </ul>
        </div>
      @endif

      @if(isset($template_item['contact']) && !empty($template_item['contact']))
        <div class="button-block">
          <a href="mailto:{{$template_item['contact']}}" class="btn btn-default">Contact Us</a>
        </div>
      @endif
    </div>
    <div class="cell small-12 large-4 side-block-container show-for-large" data-equalizer-watch>
      @foreach($template_item['side'] as $idx => $item)
      <div class="article-box">
        <div class="image-block-container">
          <a href="{{$item['link_url']}}"></a>
          <div class="article-image">
            <div class="image">
              <img class="lazyload" src="{{$item['image_url']}}" alt="{{$item['alt']}}">
            </div>
            <div class="article-heading">
              <h3>{{$item['article_heading']}}</h3>
            </div>
          </div>
        </div>
      </div>
     @endforeach
    </div>
  </div>
</section>