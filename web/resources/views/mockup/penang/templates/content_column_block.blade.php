<section class="container content-column-block-section">
  <div class="clearfix" data-equrizer data-equire-on="large">
    @foreach($template_item['object_data'] as $i => $k)
    <div class="article-box" data-equrizer-watch>
      <div class="grid-x">
        <div class="cell small-12 medium-auto image-block-container">
          <div class="article-image">
            <div class="image">
              <img class="lazyload" src="{{$k['image_url']}}" alt="{{$k['alt']}}">
            </div>
          </div>
        </div>
        <div class="cell small-12 medium-8 article-block-container">
          <h2 class="heading">{!! $k['article_heading'] !!}</h2>
          <div class="article-summary">
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
</section>