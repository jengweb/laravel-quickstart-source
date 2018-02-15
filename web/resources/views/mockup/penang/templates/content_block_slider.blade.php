<?php
$thumb_class = ' default';
if($template_item['format'] == 'thumbs') {
  $thumb_class = ' thumbs-box';
}
?>
<section class="container content-block-section">
  <div class="heading-box">
    <h2 class="heading">{!! $template_item['section_heading'] !!}</h2>
    @if(isset($template_item['sub_heading']) && !empty($template_item['sub_heading']))
      <h3 class="sub-heading">{!! $template_item['sub_heading'] !!}</h3>
    @endif
  </div>
  <div class="slider-block-container">
    <div class="grid-x content-block-slider">
      @foreach($template_item['object_data'] as $i => $k)
        <div class="cell auto slide-item">
          <div class="article-box{{$thumb_class}}">
            <div class="image-block-container">
              <div class="article-image">
                <div class="image">
                  <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
                </div>
                @if($template_item['format'] != 'thumbs')
                <div class="article-heading">
                  <h3 class="article_heading">{!! $k['article_heading'] !!}</h3>
                </div>
                @endif
              </div>
            </div>
            <div class="article-block-container article">
              <div class="article-heading">
                <h3 class="article_heading">{!! $k['article_heading'] !!}</h3>
              </div>
              <div class="article-summary">
                {!! $k['article_content'] !!}
              </div>
              @if(isset($k['link_url']) && !empty($k['link_url']))
                <div class="button-block">
                  <a href="{{$k['link_url']}}" class="link">{{$k['link_label']}}</a>
                </div>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>

    @if(count($template_item['object_data']) > 1)
    <div class="slide-dots hide-for-large"></div>
    @endif
    @if(count($template_item['object_data']) > 3)
      <div class="slide-nav show-for-large"></div>
    @endif
  </div>
</section>