@if(isset_not_empty($pageItem))
    <?php
    $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('event_form');
    $formData = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('event_form');
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    $offsetIdx = 0;
    ?>
    <div id="reservation" style="display: none;">
        <div class="reservation-form">
            <h3 class="heading">{{$pageItem->heading}}</h3>
            <div class="article-content">
                {!! $pageItem->article_content !!}
            </div>
            <form class="grid-x main-form" action="{{ isset_not_empty($form->action) }}"
                  id="event-form"
                  method="{{ isset_not_empty($form->method) }}">
                @honeypot
                @cmstoken
                @cmsappname
                @foreach($form->properties as $key=>$value)
                    @if($value->show_input == true)
                        <?php switch($value->type){
                        case 'text':
                        case 'email':
                        case 'date':
                        $offset = $offsetIdx % 2 == 1 ? 'large-offset-1' : '';
                        ?>
                        <div class="cell small-12 large-5 form-group {{ $offset }}">
                            <label for="{{ isset_not_empty($value->name) }}">
                                {{ isset_not_empty($value->label) }} {{ $value->required == true ? '*' : '' }}
                            </label>
                            <input type="text"
                                   class="form-control {{ $value->type == 'date' ? 'datepicker' : '' }}"
                                   type="{{ $value->type }}"
                                   name="{{ isset_not_empty($value->name) }}"
                                   id="{{ isset_not_empty($value->name) }}"
                                   placeholder="{{ isset_not_empty($value->placeholder) }}"
                                   value="{{ isset_not_empty($value->default_value) }}">
                        </div>
                        <?php $offsetIdx++;
                            break;
                        case 'dropdown':
                        $offset = $offsetIdx % 2 == 1 ? 'large-offset-1' : '';
                        $dropdownList = explode(PHP_EOL, $value->default_value);
                        ?>
                            <div class="cell small-12 large-5 form-group {{ $offset }}">
                                <label for="{{ isset_not_empty($value->name) }}">
                                    {{ isset_not_empty($value->label) }} {{ $value->required == true ? '*' : '' }}
                                </label>
                                <select name="{{ isset_not_empty($value->name) }}" id="{{ isset_not_empty($value->name) }}" class="form-control">
                                    @if(count($dropdownList) > 0)
                                        @foreach($dropdownList as $k=>$ra)
                                            <option value="{{ $ra }}">{{ $ra }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        <?php $offsetIdx++;
                            break;
                        case 'textarea':?>
                        <div class="cell small-12 large-11 form-group">
                            <label for="{{ isset_not_empty($value->name) }}">
                                {{ isset_not_empty($value->label) }} {{ $value->required == true ? '*' : '' }}
                            </label>
                            <textarea class="form-control"
                                      name="{{ isset_not_empty($value->name) }}"
                                      id="{{ isset_not_empty($value->name) }}"
                                      placeholder="{{ isset_not_empty($value->placeholder) }}"></textarea>
                        </div>
                        <?php break;
                        case 'radio':
                        $radioList = explode(PHP_EOL, $value->default_value);
                        ?>
                        <div class="cell small-12 large-11 form-group">
                            <label for="title">
                                {{ isset_not_empty($value->label) }} {{ $value->required == true ? '*' : '' }}
                            </label>
                            @if(count($radioList) > 0)
                                @foreach($radioList as $k=>$ra)
                                    <div class="radio-style">
                                        <input type="radio" id="{{ $ra }}"
                                               value="{{ $ra }}"
                                               name="{{ isset_not_empty($value->name) }}" {{ $k==0 ? 'checked' : '' }}>
                                        <label for="{{ $ra }}">{{ $ra }}</label>
                                        <div class="check"></div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <?php break;
                        default :
                            '';
                            break;
                        }
                        ?>
                    @elseif($value->show_input == false)
                        <input type="hidden" value="{{ isset_not_empty($value->default_value) }}"
                               name="{{ $value->name }}" id="{{ $value->name }}"/>
                    @endif

                @endforeach
                <div class="cell small-12 large-11 remark">
                    {{ isset_not_empty($translate->fill_is_required) }}
                </div>
                <div class="cell small-12 large-11 button-block">
                    <button class="btn btn-default" type="submit">
                        {{ isset_not_empty($formData->submit_button_label) }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif