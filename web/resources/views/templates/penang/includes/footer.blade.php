<footer>
    <div class="grid-x footer-bar-top {{ isset_not_empty($site->footer_format,'default') }}">
        <div class="cell small-12 medium-4">
            <div class="guest-review-wrapper">
                <h4 class="heading">{{ isset_not_empty($translate->guest_reviews_label,'Guest reviews') }}</h4>
                <div id="IWSfrContainer"></div>
            </div>
        </div>
        <div class="cell small-12 medium-3 large-4">
            <div class="social-wrapper">
                <h4 class="heading">{{ isset_not_empty($translate->get_connected_label,'Get Connected') }}</h4>
                <ul class="social-list">
                    @if(isset_not_empty($socialMedia->items))
                        @foreach($socialMedia->items as $i => $value)
                            <li>
                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                   target="{{ isset_not_empty($value->link_target,'_blank') }}">
                                    <i class="fa fa-{{ isset_not_empty($value->icon_class,'') }}"></i>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="cell small-12 medium-5 large-4">
            <div class="newsletter-wrapper">
                <?php
                $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('newsletter_form');
                $formData = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('newsletter_form');
                ?>
                @if($form)
                    <h4 class="heading">{{ isset_not_empty($translate->newsletter_label,'Newsletter') }} {{ isset_not_empty($translate->signup,'Signup') }}</h4>
                    <form class="main-form" id="newsletter-form" action="{{ isset_not_empty($form->action) }}"
                          method="post">
                        <div class="form-group">
                            @honeypot
                            @cmstoken
                            @cmsappname
                            @foreach($form->properties as $key=>$value)
                                @if($value->show_input == true)
                                    <?php switch($value->type){
                                    case 'email' : ?>
                                    <input type="email" name="{{ $value->name }}" id="{{ $value->name }}"
                                           class="form-control" autocomplete="off"
                                           placeholder="{{ isset_not_empty($value->placeholder) }}">
                                    <?php break;
                                    }
                                    ?>
                                @endif
                            @endforeach
                            <div class="button-block">
                                <button class="link">
                                    {{ isset_not_empty($formData->submit_button_label) }}
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bar-bottom {{ isset_not_empty($site->footer_format,'default') }}">
        @if(isset_not_empty($footerMenu->items))
            <div class="grid-x">
                <div class="cell small-12 large-4 item">
                    <div class="quick-wrapper">
                        @if(isset_not_empty($footerMenu->heading))
                            <h4 class="heading">{!! $footerMenu->heading !!}</h4>
                        @endif
                        <ul>
                            @foreach($footerMenu->items as $i => $value)
                                <li>
                                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                       target="{{ isset_not_empty($value->link_target,'_self') }}">
                                        {{ isset_not_empty($value->link_label) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if(isset_not_empty($footerContact))
                    <div class="cell small-12 large-4 item">
                        <div class="contact-wrapper">
                            @if(isset_not_empty($footerContact->heading))
                                <h4 class="heading">{!! $footerContact->heading !!}</h4>
                            @endif
                            <div class="article">
                                {!! isset_not_empty($footerContact->content) !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <div class="grid-x ihg-info-bar">
            <div class="cell small-12 medium-6 large-5 bp-guarantee-wrapper">
                <div class="image-box">
                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($site->guarantee_link_url) }}"
                       target="{{ isset_not_empty($site->guarantee_link_target,'_self') }}">
                        @if(isset_not_empty($site->guarantee_logo))
                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($site->guarantee_logo)}}"
                                 alt="{{ isset_not_empty($site->guarantee_image_alt) }}">
                        @endif
                    </a>
                </div>
                <div class="info-box">
                    <div class="heading">
                        {{ isset_not_empty($translate->book_online_or_call_label,'Book online or call') }}
                    </div>
                    <a href="tel:{{ isset_not_empty($site->guarantee_phone_number) }}">{{ isset_not_empty($site->guarantee_phone_number) }}</a>
                </div>
            </div>
            @if(isset_not_empty($footerLogo))
                <div class="cell small-12 medium-3 large-4 logo-wrapper">
                    <ul>
                        @foreach($footerLogo->items as $i => $value)
                            <li>
                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                   target="{{ isset_not_empty($value->link_target,'_self') }}">
                                    @if(isset_not_empty($value->image))
                                        <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                             alt="{{ isset_not_empty($value->image_alt) }}">
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(isset_not_empty($site->address))
                <div class="cell small-8 medium-3 large-3 address-wrapper ">
                    <div class="article">
                        {!! $site->address !!}
                    </div>
                </div>
            @else
                @if(isset_not_empty($appLogo))
                    <div class="cell small-8 medium-3 large-3 application-wrapper ">
                        @if(isset_not_empty($appLogo->logo))
                            @foreach($appLogo->logo as $i => $value)
                                <span class="image">
                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                   target="{{ isset_not_empty($value->link_target,'_self') }}">
                                    <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                         alt="{{ isset_not_empty($value->image_alt) }}">
                                </a>
                            </span>
                            @endforeach
                        @endif
                        @if(isset_not_empty($appLogo->article))
                            <div class="article">
                                {!! $appLogo->article !!}
                            </div>
                        @endif
                    </div>
                @endif
            @endif
        </div>
        @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('templates.ihg_brand_bar'))
    </div>
    <div class="copyright">{{ isset_not_empty($site->copyright) }}</div>
</footer>