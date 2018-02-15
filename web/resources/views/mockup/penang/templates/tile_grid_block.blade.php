<section class="container tile-grid-block-section">
  <div class="tile-box-1">
    <div class="content-block-wrapper">
      <div class="item-wrapper">
        @foreach($template_item['tile_box_1']['item'] as $i => $k)
          <div class="item">
            <div class="text {{$k['class']}}">{!! $k['text'] !!}</div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="image-block-wrapper">
      <div class="large-image-block">
        <div class="article-image">
          <div class="image">
            <img class="lazyload" src="{{$template_item['tile_box_1']['large_image_url']}}" alt="">
          </div>
        </div>
      </div>
      <div class="small-image-block">
        <div class="article-image">
          <div class="image">
            <img class="lazyload" src="{{$template_item['tile_box_1']['small_image_url']}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tile-box-2">
    <div class="image-block-wrapper">
      @if(isset($template_item['tile_box_2']['media_url']) && !empty($template_item['tile_box_2']['media_url']))
        <div class="article-image">
          <div class="image video-cover">
            <img src="{{$template_item['tile_box_2']['image_url']}}" alt="" class="lazyload">
            <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
          </div>
          @if(strpos($template_item['tile_box_2']['media_url'], 'youtu') !==false)
            <div class="video-wrapper">
              <video id="video_tile"
                     data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$template_item['tile_box_2']['media_url']}}"}] }'
                     class="video-js vjs-default-skin" controls data-video="{{$template_item['tile_box_2']['media_url']}}" playsinline >
              </video>
            </div>
          @endif
        </div>
      @else
        <div class="article-image">
          <div class="image">
            <img src="{{$template_item['tile_box_2']['image_url']}}" alt="" class="lazyload">
          </div>
        </div>
      @endif
    </div>
    <div class="content-block-wrapper">
      <div class="item-wrapper">
      @foreach($template_item['tile_box_2']['item'] as $i => $k)
        <div class="item">
          <div class="text {{$k['class']}}">{!! $k['text'] !!}</div>
        </div>
      @endforeach
      </div>
      <div class="article-content-block">
        <div class="article-content">
          <div class="header-block">
            <h2 class="article-heading">{!! $template_item['tile_box_2']['article_heading'] !!}</h2>
          </div>
          {!! $template_item['tile_box_2']['article_content'] !!}
        </div>
      </div>
    </div>
  </div>
</section>