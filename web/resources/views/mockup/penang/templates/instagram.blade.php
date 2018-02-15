<section class="container instagram-section">
  <div class="grid-x">
    <div class="cell small-12 large-3">
      <div class="article-box">
        <div class="article">
          <h3 class="heading">{!! $template_item['section_heading'] !!}</h3>
          @if(isset($template_item['link_url']) && !empty($template_item['link_url']))
            <div class="button-block">
              <a href="{{$template_item['link_url']}}" class="link">{{$template_item['link_label']}}</a>
            </div>
          @endif
        </div>

      </div>
    </div>
    <div class="columns small-12 large-9">
      <div class="widget-block">
        <div class="widget"></div>
      </div>
    </div>
  </div>
</section>