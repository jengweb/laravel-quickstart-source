<?php
$mainLanguage = \App\CMS\Helpers\CMSHelper::getSiteMainLanguage();
$currentLanguage = \App\CMS\Helpers\CMSHelper::getCurrentLanguage();
$pathInfo = trim(Request::getPathInfo(), '/');
$cookieBar = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('cookie_bar');
$slug = \App\CMS\Helpers\APIHelper::removeLanguageCodeFromUrl($currentLanguage->code, $pathInfo);
//    dd($mainLanguage->code .'---'. $currentLanguage->code);
?>
<header id="header">
    <div class="cookie-notification-bar">
        {{ isset_not_empty($cookieBar->cookie_bar_text) }}
        <a href="{{ isset_not_empty($cookieBar->cookie_bar_link_url) }}" class="cookies"
           target="{{ isset_not_empty($cookieBar->cookie_bar_link_target) }}">
            {{ isset_not_empty($cookieBar->cookie_bar_link_label) }}
        </a>
        <button class="link-cookie btn-default"> {{ isset_not_empty($cookieBar->cookie_button) }}</button>
    </div>
    <div class="secondary-header"></div>
    <div class="grid-x main-header">
        <div class="shrink cell logo-wrapper">
            <div class="logo" data-type="{{ isset_not_empty($site->site_logo_type) }}">
                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl('homepage') }}">
                    <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail(isset_not_empty($site->site_logo)) }}"
                         alt="Logo">
                </a>
            </div>
        </div>
        <div class="auto cell navigation-wrapper">
            <div class="nav-toggle toggle" data-toggle="navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div id="language_bar"
                 class="language-bar {{ isset_not_empty($site->show_flag_language) == true ? 'show-icon' : ''}}">
                <div class="language-text">
                    @if(isset_not_empty($siteLanguage))
                        <?php $firstLanguage = current($siteLanguage); ?>
                        @if(isset_not_empty($site->show_flag_language) == true)
                            <span data-icon class="flag-icon flag-icon-{{ isset_not_empty($item->code) }}"></span>
                        @endif
                        <span class="language-name"></span>
                    @endif
                </div>
                <ul id="language" class="language-item">
                    @if(isset_not_empty($siteLanguage))

                        @foreach($siteLanguage as $item)
                            <?php
                            $linkUrl = url(($mainLanguage->code != $item->code) ? $item->code . ($currentPage->friendly_url != 'homepage' ? '/' . $slug : '') : ($currentPage->friendly_url != 'homepage' ? '/' . $slug : ''));
                            ?>
                            <li data-value="{{ $linkUrl }}" data-url="{{$linkUrl}}" class="language-menu {{ $item->code === $currentLanguage->code ? ' active' : '' }}">
                                @if(isset_not_empty($site->show_flag_language) == true)
                                    <span data-icon class="flag-icon flag-icon-{{ $item->code }}"></span>
                                @endif
                                <span class="name">{{ isset_not_empty($item->name) }}</span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div id="navigation" class="nav-panel-wrapper">
                <div class="nav-panel">
                    <div class="booking-toggle">
                        <button class="btn btn-default">
                            {{ isset_not_empty($translate->book_now_label,'Book now') }}
                        </button>
                    </div>
                    <div class="main-nav">
                        <ul>
                            @if(isset_not_empty($mainMenu->items))
                                @foreach($mainMenu->items as $i => $value)
                                    <?php
                                    $child_class = '';
                                    if (isset_not_empty($value->sub_menus)) {
                                        $child_class = ' class=has-child';
                                    }
                                    ?>
                                    <li{{$child_class}}>
                                        <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}">{!! isset_not_empty($value->link_label) !!}</a>
                                        @if(isset_not_empty($value->sub_menus))
                                            <div
                                                class="grid-x sub-menu{{ $mainMenu->show_image == true ?' show-image':''}}">
                                                <ul class="shrink cell sub-menu-list">
                                                    @foreach($value->sub_menus as $idx => $item)
                                                        <li data-id="{{ $i.'-'.$idx }}"
                                                            data-image="{{ \App\CMS\Helpers\CMSHelper::thumbnail($item->image) }}">
                                                            <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($item->link_url) }}">{!! isset_not_empty($item->link_label) !!}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @if($mainMenu->show_image == true)
                                                    <?php $firstImage = current($value->sub_menus);?>
                                                    <div class="auto cell image-menu-list">
                                                        <div class="image">
                                                            <img class="lazyload"
                                                                 src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($firstImage->image) }}"
                                                                 alt="{{ isset_not_empty($firstImage->image_alt) }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    @if(isset_not_empty($headerMenu->items))
                        <div class="secondary-nav">
                            <ul>
                                @foreach($headerMenu->items as $idx => $value)
                                    <li>
                                        <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                           target="{{ isset_not_empty($value->link_target,'_self') }}">{{ isset_not_empty($value->link_label) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>