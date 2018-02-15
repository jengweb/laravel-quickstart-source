<section class="container tile-group-section">
  <div class="grid-x">
    <div class="cell small-12 large-6 tile-wrapper">
      <div class="grid-x tile-box-group" data-group="1">
        <div class="cell small-12 large-4 small">
          <div class="grid-x">
            <div class="cell small-6 large-12">
              <div class="article-image">
                <div class="image">
                  <img src="{{$template_item['tile_box_1']['small_image_url']}}" alt="{{$template_item['tile_box_1']['small_alt']}}" class="lazyload">
                </div>
              </div>
            </div>
            <div class="cell small-6 large-12">
              <div class="article-content">
                <div class="article">
                  {!! $template_item['tile_box_1']['article_content'] !!}
                </div>
                @if(isset($template_item['tile_box_1']['link_url']) && !empty($template_item['tile_box_1']['link_url']))
                  <a href="{{ $template_item['tile_box_1']['link_url']}}"></a>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="cell small-12 large-8 large">
          @if(isset($template_item['tile_box_1']['media_url']) && !empty($template_item['tile_box_1']['media_url']))
            <div class="article-image">
              <div class="image video-cover">
                <img src="{{$template_item['tile_box_1']['large_image_url']}}" alt="{{$template_item['tile_box_1']['large_alt']}}" class="lazyload">
                <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
              </div>
              @if(strpos($template_item['tile_box_1']['media_url'], 'youtu') !==false)
                <div class="video-wrapper">
                  <video id="video_tile_01"
                         data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$template_item['tile_box_1']['media_url']}}"}] }'
                         class="video-js vjs-default-skin" controls data-video="{{$template_item['tile_box_1']['media_url']}}" playsinline >
                  </video>
                </div>
              @endif
            </div>
          @else
          <div class="article-image">
            <div class="image">
              <img src="{{$template_item['tile_box_1']['large_image_url']}}" alt="{{$template_item['tile_box_1']['large_alt']}}" class="lazyload">
            </div>
          </div>
            @endif
        </div>
      </div>
      <div class="grid-x tile-box-inline" data-group="2">
        <div class="cell small-4">
          <div class="article-image">
            <div class="image">
              <img src="{{$template_item['tile_box_2']['small_image_url']}}" alt="{{$template_item['tile_box_2']['small_alt']}}" class="lazyload">
            </div>
          </div>
        </div>
        <div class="cell small-8 article-content">
          {!! $template_item['tile_box_2']['article_content'] !!}
          @if(isset($template_item['tile_box_2']['link_url']) && !empty($template_item['tile_box_2']['link_url']))
          <a href="{{ $template_item['tile_box_2']['link_url']}}"></a>
          @endif
        </div>
      </div>
    </div>
    <div class="cell small-12 large-6 tile-wrapper">
      <div class="grid-x tile-box-inline" data-group="3">
        <div class="cell small-8 article-content">
          {!! $template_item['tile_box_3']['article_content'] !!}
          @if(isset($template_item['tile_box_3']['link_url']) && !empty($template_item['tile_box_3']['link_url']))
          <a href="{{ $template_item['tile_box_3']['link_url']}}"></a>
          @endif
        </div>
        <div class="cell small-4">
          <div class="article-image">
            <div class="image">
              <img src="{{$template_item['tile_box_3']['small_image_url']}}" alt="{{$template_item['tile_box_3']['small_alt']}}" class="lazyload">
            </div>
          </div>
        </div>
      </div>
      <div class="grid-x tile-box-group" data-group="4">
        <div class="cell small-12 large-8 large">
          @if(isset($template_item['tile_box_4']['media_url']) && !empty($template_item['tile_box_4']['media_url']))
            <div class="article-image">
              <div class="image video-cover">
                <img src="{{$template_item['tile_box_4']['large_image_url']}}" alt="{{$template_item['tile_box_4']['large_alt']}}" class="lazyload">
                <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
              </div>
              @if(strpos($template_item['tile_box_4']['media_url'], 'youtu') !==false)
                <div class="video-wrapper">
                  <video id="video_tile_04"
                         data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$template_item['tile_box_4']['media_url']}}"}] }'
                         class="video-js vjs-default-skin" controls data-video="{{$template_item['tile_box_41']['media_url']}}" playsinline >
                  </video>
                </div>
              @endif
            </div>
          @else
          <div class="article-image">
            <div class="image">
              <img src="{{$template_item['tile_box_4']['large_image_url']}}" alt="{{$template_item['tile_box_4']['large_alt']}}" class="lazyload">
            </div>
          </div>
            @endif
        </div>
        <div class="cell small-12 large-4 small">
          <div class="grid-x">
            <div class="cell small-6 large-12">
              <div class="article-content">
                <div class="article">
                  {!! $template_item['tile_box_4']['article_content'] !!}
                </div>
                @if(isset($template_item['tile_box_4']['link_url']) && !empty($template_item['tile_box_4']['link_url']))
                  <a href="{{ $template_item['tile_box_4']['link_url']}}"></a>
                @endif
              </div>
            </div>
            <div class="cell small-6 large-12">
              <div class="article-image">
                <div class="image">
                  <img src="{{$template_item['tile_box_4']['small_image_url']}}" alt="{{$template_item['tile_box_4']['small_alt']}}" class="lazyload">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>