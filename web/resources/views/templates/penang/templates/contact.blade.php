@if(isset_not_empty($pageItem))
    <?php
    $contactForm = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('contact_form');
    $contact = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('contact_form');
    $translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
    ?>
    <section id="sticky" class="container contact-section" data-sticky>
        {{--<div class="grid-x">--}}
        <div class="form-contact-wrapper" data-sticky-content>
            <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1>
            <div class="article">
                <h2 class="sub-heading">{!! isset_not_empty($pageItem->sub_heading) !!}</h2>
                {!! isset_not_empty($pageItem->article_content) !!}
            </div>
            <div class="form-contact">
                @if(isset_not_empty($contactForm->properties))
                    <form class="main-form " id="contact-form" action="{{ $contactForm->action }}" method="{{ $contactForm->method }}">
                        <h3>{!! isset_not_empty($pageItem->form_heading) !!}</h3>
                        @honeypot
                        @cmstoken
                        @cmsappname
                        @foreach($contactForm->properties as $key=>$value)
                            <?php switch($value->type){
                                case 'text':
                                case 'email': ?>
                                <div class="form-group">
                                    <label for="name" class="ui-hidden">{{ isset_not_empty($value->label) }}</label>
                                    <input type="{{ $value->type }}" name="{{ isset_not_empty($value->name) }}" id="{{ isset_not_empty($value->name) }}" class="form-control" placeholder="{{ isset_not_empty($value->placeholder) }}">
                                </div>
                            <?php break;
                                case 'textarea':?>
                                <div class="form-group">
                                    <label for="{{ isset_not_empty($value->name) }}" class="ui-hidden">{{ isset_not_empty($value->label) }}</label>
                                    <textarea name="{{ isset_not_empty($value->name) }}" id="{{ isset_not_empty($value->name) }}" class="form-control" placeholder="{{ isset_not_empty($value->placeholder) }}"></textarea>
                                </div>
                            <?php break;
                                default : ''; break;
                            }?>
                        @endforeach
                    <div class="form-group">
                        <button class="btn btn-default">{{ isset_not_empty($contact->submit_button_label) }}</button>
                    </div>
                @endif
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
@endif