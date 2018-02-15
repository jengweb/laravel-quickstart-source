<section class="container content-detail-booking-section">
  <div class="grid-x">
    <div class="cell small-12 large-auto article-block-container">
      <div class="heading-box">
        <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
      </div>
      <div class="article">
        {!! $template_item['article_content'] !!}
      </div>
      @if(isset($template_item['info_item']) && count($template_item['info_item']) > 0)
        <div class="info-block-container">
          <ul>
            @foreach($template_item['info_item'] as $i => $k)
              @if($k['item'] == 'reservation')
                <li><a data-fancybox data-src="#reservation" href="{{ isset($k['link_url']) && !empty($k['link_url']) ? $k['link_url'] : '#reservation'}}" class="{{$k['item']}}">{!! $k['info'] !!}</a></li>
              @elseif(isset($k['link_url']) && !empty($k['link_url']) && $k['item'] !== 'reservation')
                <li><a href="{{$k['link_url']}}" class="{{$k['item']}}">{!! $k['info'] !!}</a></li>
              @else
                <li class="{{$k['item']}}">{!! $k['info'] !!}</li>
              @endif
            @endforeach
          </ul>
        </div>
      @endif
      @if(isset($template_item['amenities']) && !empty($template_item['amenities']))
        @include('mockup.hi-makati.templates.amenities')
      @endif
    </div>
    <div class="cell small-12 large-3 side-block-container">
      <div id="offers_booking" class="booking-form">
        <div class="heading">Get this offer</div>
        <form>
          <div class="form-group">
            <div class="icon-calendar form-control-vert">
              <label for="offer_checkin" class="ui-hidden">Check in</label>
              <input id="offer_checkin" type="text" class="form-control datepicker checkin" placeholder="Check in" readonly>
            </div>
            <div class="icon-calendar form-control-vert">
              <label for="offer_checkout" class="ui-hidden">Check out</label>
              <input id="offer_checkout" type="text" class="form-control datepicker checkout" placeholder="Check out" readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="form-control-vert">
              <label for="offer_adult" class="ui-hidden">Adult</label>
              <select name="offer_adult" id="offer_adult">
                <option value="1">1 Adult</option>
              </select>
            </div>
            <div class="form-control-vert">
              <label for="offer_children" class="ui-hidden">children</label>
              <select name="offer_children" id="offer_children">
                <option value="1">0 Children</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="offer_room" class="ui-hidden">Room</label>
            <select name="offer_room" id="offer_room">
              <option value="1">1 Room</option>
            </select>
          </div>
          <div class="form-group">
            <a href="#" class="btn btn-default">Book now</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>