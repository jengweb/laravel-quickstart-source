<div class="container booking-section">
  <div class="booking-toggle toggle" data-toggle="booking"><span>Book now</span></div>
  <div class="grid-x booking-panel">
    <div class="shrink cell show-for-large temperature-wrapper">
      <table id="temperature">
        <tr>
          <td class="temp-number">
            <span id="fahrenheit"></span><sup>o</sup>F /
            <span id="celsius"></span><sup>o</sup>C
            <div id="weather_text"></div>
          </td>
          <td rowspan="2">
            <div id="weather_icon">
              <div class="icon"></div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="large-auto cell booking-form-wrapper">
      <form class="grid-x booking-form">
        <div class="cell small-12 large-4 column form-group">
          <div class="input-group">
            <div class="input-group-field icon-calendar">
              <label for="checkIn" class="ui-hidden">Check In</label>
              <input id="checkIn" class="form-control datepicker checkin" type="text" placeholder="Check in" readonly="readonly">
            </div>
            <div class="input-group-field icon-calendar">
              <label for="checkOut" class="ui-hidden">Check Out</label>
              <input id="checkOut" class="form-control datepicker checkout" type="text" placeholder="Check out" readonly="readonly">
            </div>

          </div>
        </div>
        <div class="cell column small-12 large-4 form-group">
          <div class="input-group">
            <label for="adult" class="ui-hidden">adult</label>
            <select name="" id="adult" class="input-group-field">
              <option value="1">1 Adults</option>
            </select>
            <label for="children" class="ui-hidden">children</label>
            <select name="" id="children" class="input-group-field">
              <option value="0">0 children</option>
            </select>
          </div>
        </div>
        <div class="cell column small-12 large-4 form-group">
          <div class="input-group">
            <label for="rooms" class="ui-hidden">rooms</label>
            <select name="" id="rooms" class="input-group-field">
              <option value="1">1 Room</option>
            </select>
            <div class="input-group-button">
              <a href="#" class="btn btn-default">Check availability</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>