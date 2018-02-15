<section class="container text-section">
  <div class="grid-x">
    @if(isset($template_item['section_image_url']) && !empty($template_item['section_image_url']))
    <div class="cell small-12 large-5 image-block-container">
      <div class="section-image">
        <div class="image">
          <img src="{{$template_item['section_image_url']}}" alt="{{$template_item['alt']}}">
        </div>
      </div>
    </div>
    @endif
    <div class="cell small-12 large-auto article-block-container">
      <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
      @if(isset($template_item['sub_heading']) && !empty($template_item['sub_heading']))
        <h2 class="sub-heading">{!! $template_item['sub_heading'] !!}</h2>
      @endif
      <div class="article">
        {!! $template_item['article_content'] !!}
      </div>
    </div>
  </div>
</section>