<section class="container content-detail-section content-detail-text-section">
  <div class="grid-x" data-equalizer data-equalize-on="large">
    <div class="cell small-12 large-auto article-block-container" data-equalizer-watch>
      <div class="heading-box">
        <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
      </div>
      @if(isset($template_item['section_image_url']) && !empty($template_item['section_image_url']))
      <div class="section-image">
        <div class="image">
          <img class="lazyload" src="{{$template_item['section_image_url']}}" alt="{{$template_item['alt']}}">
        </div>
      </div>
      @endif
      <div class="article">
        @if(isset($template_item['article_heading']) && !empty($template_item['article_heading']))
        <h2 class="article-heading">{!! $template_item['article_heading'] !!}</h2>
        @endif
        @if(isset($template_item['sub_heading']) && !empty($template_item['sub_heading']))
          <h3 class="sub-heading">{!! $template_item['sub_heading'] !!}</h3>
        @endif
          <div class="article-content">
            {!! $template_item['article_content'] !!}
          </div>
      </div>
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
    @if(isset($template_item['link_url']) && !empty($template_item['link_url']))
    <div class="cell small-12 button-block">
      <a href="{{$template_item['link_url']}}" class="link">{{$template_item['link_label']}}</a>
    </div>
      @endif
  </div>
</section>