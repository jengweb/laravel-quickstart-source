<section id="sticky" class="container contact-section" data-sticky>
  {{--<div class="grid-x">--}}
    <div class="form-contact-wrapper" data-sticky-content>
      <h1 class="heading">{!! $template_item['section_heading'] !!}</h1>
      <div class="article" >
        <h2 class="sub-heading">{!! $template_item['sub_heading'] !!}</h2>
        {!! $template_item['article_content'] !!}
      </div>
      <div class="form-contact">
        <h3>Send us a message</h3>
        <form class="main-form ">
          <div class="form-group">
            <label for="name" class="ui-hidden">Name</label>
            <input type="text" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="phone" class="ui-hidden">Phone</label>
            <input type="tel" class="form-control" placeholder="Phone">
          </div>
          <div class="form-group">
            <label for="name" class="ui-hidden">email</label>
            <input type="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="name" class="ui-hidden">message</label>
            <textarea class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <a href="#" class="btn btn-default">Send</a>
          </div>
        </form>
      </div>
    </div>
    <div class="map-block-container" data-sticky-sidebar>
      <div class="map-wrapper">
        <div id="map"></div>
      </div>
    </div>
  {{--</div>--}}
</section>