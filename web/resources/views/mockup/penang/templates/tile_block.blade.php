<section class="container tile-section">
  <div class="grid-x tile-box-wrapper">
    @foreach($template_item['object_data'] as $i => $k)
      @if($i < 4)
        <div class="cell small-12 medium-6 large-4 tile-box" data-item="{{$i+1}}">
          @if(isset($k['media_url']) && !empty($k['media_url']))
            <div class="article-image">
              <div class="image video-cover">
                <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
                <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
              </div>
              @if(strpos($k['media_url'], 'youtu') !==false)
                <div class="video-wrapper">
                  <video id="video_{{$i+1}}"
                         data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$k['media_url']}}"}] }'
                         class="video-js vjs-default-skin" controls data-video="{{$k['media_url']}}" playsinline>
                  </video>
                </div>
              @endif
            </div>
          @else
            <div class="article-image">
              <div class="image">
                <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
              </div>
            </div>
          @endif

          @if(isset($k['link_url']) && !empty($k['link_url']))
            <div class="heading">
              <a href="{{$k['link_url']}}">{{$k['link_label']}}</a>
            </div>
          @endif
        </div>
      @endif
    @endforeach
      <div class="grid-x tile-group-wrapper">
        @foreach($template_item['object_data'] as $i => $k)
          @if($i >= 4)
            <div class="cell small-12 medium-6 large-12 tile-box" data-item="{{$i+1}}">
              @if(isset($k['media_url']) && !empty($k['media_url']))
                <div class="article-image">
                  <div class="image video-cover">
                    <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
                    <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
                  </div>
                  @if(strpos($k['media_url'], 'youtu') !==false)
                    <div class="video-wrapper">
                      <video id="video_{{$i+1}}"
                             data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$k['media_url']}}"}] }'
                             class="video-js vjs-default-skin" controls data-video="{{$k['media_url']}}" playsinline>
                      </video>
                    </div>
                  @endif
                </div>
              @else
                <div class="article-image">
                  <div class="image">
                    <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
                  </div>
                </div>
              @endif

              @if(isset($k['link_url']) && !empty($k['link_url']))
                <div class="heading">
                  <a href="{{$k['link_url']}}">{{$k['link_label']}}</a>
                </div>
              @endif
            </div>
          @endif
        @endforeach
      </div>
  </div>
</section>