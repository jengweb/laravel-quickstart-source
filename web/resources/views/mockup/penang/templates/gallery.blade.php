<section class="container gallery-section">
  @if(isset($template_item['section_heading']) && !empty($template_item['section_heading']))
    <h1 class="section-header">{!! $template_item['section_heading'] !!}</h1>
  @endif
  <div class="filter-list">
    <select name="" id="mb_filters" class="hide-for-large">
      <option value="*" data-filter="*">All</option>
      @foreach($template_item['category'] as $i => $k)
        <option value="{{$k['category_id']}}" data-filter="{{$k['category_id']}}">{{$k['category_label']}}</option>
      @endforeach
    </select>

    <ul id="desktop_filters" class="show-for-large">
      <li class="active"><a href="#" data-filter="*">View All</a></li>
      @foreach($template_item['category'] as $i => $k)
        <li><a href="#" data-filter="{{$k['category_id']}}">{{$k['category_label']}}</a></li>
      @endforeach
    </ul>
  </div>
  <div id="masonry" class="grid-x small-up-1 medium-up-2 large-up-3 content-block-filter" data-item="6">
    @foreach($template_item['object_data'] as $i => $k)
      @if(isset($k['video_file']) && !empty($k['video_file']))
      <div class="cell filter-item {{$k['category_id']}}" data-type="video">
          <div class="image-block-container">
            <div class="article-image">
              <div class="video-box">
                @if(isset($k['video_file']) && !empty($k['video_file']))
                  <iframe src="{{$k['video_file']}}" frameborder="0"></iframe>
                @endif
              </div>
              <div class="image">
                <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload">
              </div>
            </div>
            <div class="hover-block show-for-large">See image +</div>
          </div>
      </div>
      @else
        <div class="cell filter-item {{$k['category_id']}}" data-type="image">
          <div class="image-block-container">
            <div class="article-image">
              <div class="image">
                <img src="{{$k['image_url']}}" alt="{{$k['alt']}}" class="lazyload" data-title="{{$k['title']}}">
              </div>
            </div>
            <div class="hover-block show-for-large">See image +</div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
  <div class="button-block load-more hiding">
    <a href="#" class="link">Load More</a>
  </div>
</section>