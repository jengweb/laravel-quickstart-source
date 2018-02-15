<div id="reservation" style="display: none;">
  <div class="reservation-form">
    <h3 class="heading">{{$template_item['heading']}}</h3>
    <div class="article-content">
      {!! $template_item['article_content'] !!}
    </div>
    <form class="grid-x main-form">
      <div class="cell small-12 large-11 form-group">
        <label for="title">Title *</label>
        <div class="radio-style">
          <input type="radio" id="mr" name="title" checked="checked">
          <label for="mr">Mr.</label>
          <div class="check"></div>
        </div>
        <div class="radio-style">
          <input type="radio" id="ms" name="title">
          <label for="ms">Ms.</label>
          <div class="check"></div>
        </div>
        <div class="radio-style">
          <input type="radio" id="mrs" name="title">
          <label for="mrs">Mrs.</label>
          <div class="check"></div>
        </div>
      </div>
      <div class="cell small-12 large-5 form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control">
      </div>
      <div class="cell small-12 large-5 large-offset-1 form-group">
        <label for="surname">Surname *</label>
        <input type="text" class="form-control">
      </div>
      <div class="cell small-12 large-5 form-group">
        <label for="email">Email *</label>
        <input type="email" class="form-control">
      </div>
      <div class="cell small-12 large-5 large-offset-1 form-group">
        <label for="telephone">Telephone *</label>
        <input type="tel" class="form-control">
      </div>
      <div class="cell small-12 large-5 form-group">
        <label for="ihgRewardsClubNumber">IHG Rewards Club Number</label>
        <input type="text" class="form-control">
      </div>
      <div class="cell small-12 large-5 large-offset-1 form-group">
        <label for="ihgBusinessClubNumber">IHG Business Club Number</label>
        <input type="text" class="form-control">
      </div>
      <div class="cell small-12 large-5 form-group">
        <label for="functionRoom">Function Room *</label>
        <select name="functionRoom" id="functionRoom" class="form-control">
          <option value="1">item 1</option>
          <option value="2">item 1</option>
          <option value="3">item 1</option>
        </select>
      </div>
      <div class="cell small-12 large-5 large-offset-1 form-group">
        <label for="dateOfReservation">Date of Reservation *</label>
        <input type="text" id="dateOfReservation" class="form-control datepicker">
      </div>
      <div class="cell small-12 large-5 form-group">
        <label for="startingAt ">Starting at</label>
        <select name="startingAt" id="startingAt" class="form-control">
          <option value="1">item 1</option>
          <option value="2">item 1</option>
          <option value="3">item 1</option>
        </select>
      </div>
      <div class="cell small-12 large-5 large-offset-1 form-group">
        <label for="finishAt">Finishing at</label>
        <select name="finishAt" id="finishAt" class="form-control">
          <option value="1">item 1</option>
          <option value="2">item 1</option>
          <option value="3">item 1</option>
        </select>
      </div>
      <div class="cell small-12 large-5 form-group">
        <label for="eventInformation ">Event / Celebration Information</label>
        <select name="eventInformation" id="eventInfo" class="form-control">
          <option value="1">item 1</option>
          <option value="2">item 1</option>
          <option value="3">item 1</option>
        </select>
      </div>
      <div class="cell small-12 large-5 large-offset-1 form-group">
        <label for="numberOfAttendees ">Number of Attendees </label>
        <input type="number" class="form-control">
      </div>
      <div class="cell small-12 large-11 form-group">
        <label for="specialRequest">Special Request</label>
        <textarea class="form-control"></textarea>
      </div>
      <div class="cell small-12 large-11 remark">* Fill is required</div>
      <div class="cell small-12 large-11 button-block">
        <button class="btn btn-default" type="submit">Send Enquiry</button>
      </div>
    </form>
  </div>
</div>