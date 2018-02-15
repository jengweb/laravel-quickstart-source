@if(isset_not_empty($pageItem))
    <section class="container content-detail-booking-section">
        <div class="grid-x">
            <div class="cell small-12 large-auto article-block-container">
                <div class="heading-box">
                    <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1>
                </div>
                <div class="article">
                    {!! isset_not_empty($pageItem->article_content) !!}
                </div>
                @if(isset_not_empty($pageItem->information_item))
                    <div class="info-block-container">
                        <ul>
                            @foreach($pageItem->information_item as $i => $value)
                                @if(isset_not_empty($value->icon) == 'reservation')
                                    <li><a data-fancybox data-src="#reservation"
                                           href="{{ isset_not_empty($value->link_url,'#reservation') }}"
                                           class="{{ isset_not_empty($value->icon) }}">{!! isset_not_empty($value->info) !!}</a></li>
                                @elseif(isset_not_empty($value->link_url) && $value->icon !== 'reservation')
                                    <li><a href="{{\App\CMS\Helpers\CMSHelper::pageUrl($value->link_url)}}" class="{{ isset_not_empty($value->icon) }}">{!! isset_not_empty($value->info) !!}</a></li>
                                @else
                                    <li class="{{ isset_not_empty($value->icon) }}">{!! isset_not_empty($value->info) !!}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('templates.amenities'))
            </div>
            <div class="cell small-12 large-3 side-block-container">
                <div id="offers_booking" class="booking-form">
                    <div class="heading">{{ isset_not_empty($translate->booking_label) }}</div>
                    <form id="booking-side">
                        <div class="form-group">
                            <div class="icon-calendar form-control-vert">
                                <label for="offer_checkin" class="ui-hidden">{{ isset_not_empty($translate->check_in_label) }}</label>
                                <input id="offer_checkin" type="text" class="form-control datepicker checkin"
                                       placeholder="{{ isset_not_empty($translate->check_in_label) }}" readonly>
                            </div>
                            <div class="icon-calendar form-control-vert">
                                <label for="offer_checkout" class="ui-hidden">{{ isset_not_empty($translate->check_out_label) }}</label>
                                <input id="offer_checkout" type="text" class="form-control datepicker checkout"
                                       placeholder="{{ isset_not_empty($translate->check_out_label) }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control-vert">
                                <label for="offer_adult" class="ui-hidden">{{ isset_not_empty($translate->adult_label) }}</label>
                                <select name="offer_adult" id="offer_adult">
                                    @for($i=0;$i<isset_not_empty($site->max_adults,5);$i++){
                                    <option value="{{ $i+1 }}">{{ $i+1 }} {{ isset_not_empty($translate->adult_label) }}{{ $i>1? $currentLanguage=='en'?'s':'':'' }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-control-vert">
                                <label for="offer_children" class="ui-hidden">{{ isset_not_empty($translate->children_label) }}</label>
                                <select name="offer_children" id="offer_children">
                                    @for($i=0;$i<=isset_not_empty($site->max_childrens,5);$i++){
                                    <option value="{{ $i }}">{{ $i }} {{ isset_not_empty($translate->children_label) }}{{ $i>1? $currentLanguage=='en'?'s':'':'' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="offer_room" class="ui-hidden">{{ isset_not_empty($translate->rooms_label) }}</label>
                            <select name="offer_room" id="offer_room">
                                @for($i=0;$i<isset_not_empty($site->max_rooms,5);$i++){
                                <option value="{{ $i+1 }}">{{ $i+1 }} {{ isset_not_empty($translate->rooms_label) }}{{ $i>1? $currentLanguage=='en'?'s':'':'' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="#" id="offer-booking" data-form="booking-side" class="btn btn-default">{{ isset_not_empty($translate->check_availability_label) }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif