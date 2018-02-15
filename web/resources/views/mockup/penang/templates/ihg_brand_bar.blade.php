<div class="ihg-brand-bar">
  <div class="container">
    <div class="ihg-brand">
      <a href="{{$ihg_brand[0]['link_url']}}">
        <img src="{{$ihg_brand[0]['image_url']}}" alt="" class="main">
        <img src="{{$ihg_brand[0]['hover_image_url']}}" alt="" class="hover">
      </a>
    </div>
    <div class="group-bar clearfix">
      <div class="brand">
        <div class="grid-x item-wrapper">
          @foreach($ihg_brand as $i => $k)
            @if($i > 0 && $i < 13)
              <div class="cell item-container">
                <div class="item">
                  <a href="{{$k['link_url']}}">
                    <img src="{{$k['image_url']}}" alt="" class="main">
                    <img src="{{$k['hover_image_url']}}" alt="" class="hover">
                  </a>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
      <div class="rewards">
        <a href="{{$ihg_brand[13]['link_url']}}">
          <img src="{{$ihg_brand[13]['image_url']}}" alt="" class="main">
          <img src="{{$ihg_brand[13]['hover_image_url']}}" alt="" class="hover">
        </a>
      </div>
    </div>
  </div>
  <div class="brand-bar-text">*IHG® Rewards Club not applicable to Kimpton™ Hotels and Restaurants; to be included at a future date.</div>
</div>