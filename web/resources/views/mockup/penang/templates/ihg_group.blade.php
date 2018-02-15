<section class="container ihg-group-section">
  <div id="ihg_group_slider" class="slider-box">
    @foreach($template_item['object_data'] as $i => $k)
    <div class="slide-item">
      <div class="grid-x article-box {{$k['bg_color']}}">
        <div class="cell small-6 image-block-container">
          <div class="article-image">
            <div class="image">
              <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
            </div>
          </div>
        </div>
        <div class="cell small-6">
          <div class="article-block-container">
            <h2 class="heading">{!! $k['heading'] !!}</h2>
            <div class="button-block">
              <a href="{{$k['link_url']}}" class="link">{{$k['link_label']}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endforeach
  </div>
  <div class="slide-dots hide-for-large"></div>
</section>