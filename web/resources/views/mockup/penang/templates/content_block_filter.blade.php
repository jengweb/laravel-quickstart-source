<?php
$thumb_class = ' default';
if($template_item['format'] == 'thumbs') {
  $thumb_class = ' thumbs-box';
}
?>
<section class="container content-block-section">
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
      <div class="cell filter-item {{$k['category_id']}}" >
        <div class="article-box{{$thumb_class}}">
          <div class="image-block-container">
            @if($template_item['format'] != 'thumbs')
              <a href="{{$k['link_url']}}" class=""></a>
            @endif
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
            @if($template_item['format'] != 'default')
            <div class="article-heading">
              <h3 class="article_heading">{!! $k['article_heading'] !!}</h3>
            </div>
            @endif
            @if($template_item['format'] == 'thumbs')
              @if(isset($k['sub_content']) && !empty($k['sub_content']))
              <div class="sub-content">
                {!! $k['sub_content'] !!}
              </div>
              @endif
            @endif
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
</section>