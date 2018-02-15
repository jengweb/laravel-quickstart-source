<section id="sticky" class="container introduction-section" data-sticky>
  <div class="clearfix">
    @if($template_item['format'] == 'content_align_left')
    <div class="article-block-container" data-sticky-content>
      @if($template == 'homepage')
        <h2 class="heading">{!! $template_item['section_heading'] !!}</h2>
      @else
        <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
      @endif
      @if(isset($template_item['sub_heading']) && !empty($template_item['sub_heading']))
        <h3 class="sub-heading">{!! $template_item['sub_heading'] !!}</h3>
      @endif
      <div class="article">
        {!! $template_item['article'] !!}
      </div>
    </div>
    <div class="image-block-container show-for-large" data-sticky-sidebar>
      @if(isset($template_item['media_url']) && !empty($template_item['media_url']))
      <div class="section-image article-image">
        <div class="image video-cover">
          <img src="{{$template_item['section_image_url']}}" alt="{{$template_item['alt']}}" class="lazyload">
          <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
        </div>
        @if(strpos($template_item['media_url'], 'youtu') !==false)
          <div class="video-wrapper">
            <video id="video_introduction"
                   data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$template_item['media_url']}}"}] }'
                   class="video-js vjs-default-skin" controls data-video="{{$template_item['media_url']}}" playsinline >
            </video>
          </div>
        @endif
      </div>
      @else
      <div class="section-image">
        <div class="image">
          <img src="{{$template_item['section_image_url']}}" alt="{{$template_item['alt']}}" class="lazyload">
        </div>
      </div>
      @endif
    </div>
    @else
      <div class="cell small-12 large-6 image-block-container show-for-large">
        @if(isset($template_item['media_url']) && !empty($template_item['media_url']))
          <div class="section-image article-image">
            <div class="image video-cover">
              <img src="{{$template_item['section_image_url']}}" alt="{{$template_item['alt']}}" class="lazyload">
              <div class="btn-vdo"><i class="fa fa-play-circle"></i></div>
            </div>
            @if(strpos($template_item['media_url'], 'youtu') !==false)
              <div class="video-wrapper">
                <video id="video_introduction"
                       data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$template_item['media_url']}}"}] }'
                       class="video-js vjs-default-skin" controls data-video="{{$template_item['media_url']}}" playsinline >
                </video>
              </div>
            @endif
          </div>
        @else
        <div class="section-image">
          <div class="image">
            <img src="{{$template_item['section_image_url']}}" alt="{{$template_item['alt']}}" class="lazyload">
          </div>
        </div>
        @endif
      </div>
      <div class="cell small-12 large-6 article-block-container">
        @if($template == 'homepage')
          <h2 class="heading">{!! $template_item['section_heading'] !!}</h2>
        @else
          <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
        @endif
        @if(isset($template_item['sub_heading']) && !empty($template_item['sub_heading']))
          <h3 class="sub-heading">{!! $template_item['sub_heading'] !!}</h3>
        @endif
        <div class="article">
          {!! $template_item['article'] !!}
        </div>
      </div>
    @endif
  </div>
</section>