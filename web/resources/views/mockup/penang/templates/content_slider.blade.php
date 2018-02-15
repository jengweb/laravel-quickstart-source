<section class="container content-slider-section{{$template_item['background'] == true ? ' background' : '' }}">
  <div class="heading-box">
    <h2 class="heading">{!! $template_item['section_heading'] !!}</h2>
    @if(isset($template_item['sub_heading']) && !empty($template_item['sub_heading']))
      <h3 class="sub-heading">{!! $template_item['sub_heading'] !!}</h3>
    @endif
  </div>
  <div class="slide-block-container">
    <div class="grid-x content-slider">
      @foreach($template_item['object_data'] as $i => $k)
        <div class="cell auto slide-item">
          <div class="grid-x">
            <div class="cell small-12 medium-6 image-block-container">
              <div class="section-image">
                <div class="image">
                  <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
                </div>
              </div>
            </div>
            <div class="cell grid-x small-12 medium-6 align-left-middle article-block-container">
              <h3 class="article-heading">{!! $k['article_heading'] !!}</h3>
              <div class="article">
                {!! $k['article_summary'] !!}
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
      <div class="slide-nav show-for-large"></div>
    @endif
  </div>
  @if(isset($template_item['link_url']) && !empty($template_item['link_url']))
    <div class="button-block">
      <a href="{{$template_item['link_url']}}" class="link">{{$template_item['link_label']}}</a>
    </div>
  @endif

</section>