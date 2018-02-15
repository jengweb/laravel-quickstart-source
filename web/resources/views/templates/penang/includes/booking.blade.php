<?php $currentLanguage = \App\CMS\Helpers\CMSHelper::getCurrentLanguageCode();?>
<div class="container booking-section">
    <div class="booking-toggle toggle" data-toggle="booking"><span>{{ isset_not_empty($translate->book_now_label,'Book now') }}</span></div>
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
            <form class="grid-x booking-form" id="booking-bar">
                <div class="cell small-12 large-4 column form-group">
                    <div class="input-group">
                        <div class="input-group-field icon-calendar">
                            <label for="checkIn" class="ui-hidden">{{ isset_not_empty($translate->check_in_label) }}</label>
                            <input id="checkIn" class="form-control datepicker checkin" type="text"
                                   placeholder="{{ isset_not_empty($translate->check_in_label) }}" readonly="readonly">
                        </div>
                        <div class="input-group-field icon-calendar">
                            <label for="checkOut" class="ui-hidden">{{ isset_not_empty($translate->check_out_label) }}</label>
                            <input id="checkOut" class="form-control datepicker checkout" type="text"
                                   placeholder="{{ isset_not_empty($translate->check_out_label) }}" readonly="readonly">
                        </div>

                    </div>
                </div>
                <div class="cell column small-12 large-4 form-group">
                    <div class="input-group">
                        <label for="adult" class="ui-hidden">{{ isset_not_empty($translate->adult_label) }}</label>
                        <select name="" id="adult" class="input-group-field">
                            @for($i=0;$i<isset_not_empty($site->max_adults,5);$i++){
                            <option value="{{ $i+1 }}">{{ $i+1 }} {{ isset_not_empty($translate->adult_label) }}{{ $i>1? $currentLanguage=='en'?'s':'':'' }}</option>
                            @endfor
                        </select>
                        <label for="children" class="ui-hidden">{{ isset_not_empty($translate->children_label) }}</label>
                        <select name="" id="children" class="input-group-field">
                            @for($i=0;$i<=isset_not_empty($site->max_childrens,5);$i++){
                            <option value="{{ $i }}">{{ $i }} {{ isset_not_empty($translate->children_label) }}{{ $i>1? $currentLanguage=='en'?'s':'':'' }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="cell column small-12 large-4 form-group">
                    <div class="input-group">
                        <label for="rooms" class="ui-hidden">{{ isset_not_empty($translate->rooms_label) }}</label>
                        <select name="" id="rooms" class="input-group-field">
                            @for($i=0;$i<isset_not_empty($site->max_rooms,5);$i++){
                            <option value="{{ $i+1 }}">{{ $i+1 }} {{ isset_not_empty($translate->rooms_label) }}{{ $i>1? $currentLanguage=='en'?'s':'':'' }}</option>
                            @endfor
                        </select>
                        <div class="input-group-button">
                            <a href="#" id="booking-button" data-form="booking-bar" class="btn btn-default booking-button">{{ isset_not_empty($translate->check_availability_label) }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>