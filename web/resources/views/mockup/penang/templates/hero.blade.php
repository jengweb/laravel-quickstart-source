<?php
  $show_foreground = '';
  if($template_item['show_foreground'] == true) {
    $show_foreground .= ' data-type=foreground';
  }
?>
<section class="container hero-section"{{$show_foreground}}>
  <div id="hero">
      @foreach($template_item['object_data'] as $i => $k)
        <div class="slide-item">
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
                         class="video-js vjs-default-skin" controls data-video="{{$k['media_url']}}" playsinline >
                  </video>
                </div>
              @endif
            </div>
          @else
            @if(isset($k['mobile_image_url']) && !empty($k['mobile_image_url']))
              <div class="image lazyload"
                   data-bgset="{{ $k['mobile_image_url'] }} [(max-width: 990px)] | {{ $k['desktop_image_url'] }}"
                   data-sizes="auto"></div>
            @else
              <div class="image lazyload" data-bgset="{{ $k['desktop_image_url'] }}" data-sizes="auto"></div>
            @endif
          @endif
        </div>
      @endforeach
  </div>
  @if(isset($template_item['title']) && !empty($template_item['title']))
    <div class="slide-title scroll-parallax {{$template_item['show_foreground'] == true ? 'align-left' : ''}}">{!! $template_item['title'] !!}</div>
  @endif

  @if($template_item['show_foreground'] == true)
    <div class="foreground show-for-large">
      <div class="image" style="background-image: url('templates/hi-makati/images/holiday-inn-logo.png')"></div>
    </div>
  @endif

  @if(count($template_item['object_data'] > 1))
    <div class="slide-nav show-for-large"></div>
  @endif

  <div class="anchor show-for-large">discover</div>
</section>