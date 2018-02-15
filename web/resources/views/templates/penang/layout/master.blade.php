<?php
$site = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('site');
$metadata = \App\CMS\Helpers\CMSHelper::getPageItemByVariableName('metadata');
$translate = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('translation_label');
$headerMenu = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('header_menu');
$mainMenu = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('main_menu');
$socialMedia = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('social_media');
$footerMenu = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('footer_menu');
$footerContact = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('footer_contact');
$footerLogo = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('footer_logo');
$appLogo = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('application_logo');
$ihgBrand = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('ihg_brand_bar');
$currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
$siteLanguage = \App\CMS\Helpers\CMSHelper::getSiteLanguages();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ isset_not_empty($metadata->title,'Holiday Inn & Suites Makati') }}</title>
        <meta name="description" content="{{ isset_not_empty($metadata->description) }}">
        <meta name="keywords" content="{{ isset_not_empty($metadata->keywords) }}">
        <meta name="author" content="{{ isset_not_empty($metadata->author) }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, maximum-scale=1.0">
        @if(isset_not_empty($site->favicon))
            <link rel="shortcut icon" type="image/x-icon" href="{{ $site->favicon }}" />
        @endif
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(isset_not_empty($site->show_web_loader) == true)
            <style type="text/css">
                .loader-wrapper {
                    background-color: #f6f7f7;
                    position: fixed;
                    width: 100%;
                    height: 100%;
                    z-index: 100;
                    top: 0;
                }

                .loader-wrapper .inner {
                    background-color: #fff;
                    position: fixed;
                    widtH: 100%;
                    height: 100%;
                    z-index: 98;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .loader-wrapper .logo-box {
                    max-width: 214px;
                    max-height: 223px;
                    width: 100%;
                    height: 100%;
                    position: relative;
                }

                .loader-wrapper .logo-box .logo {
                    opacity: 0;
                }

                .loader-wrapper .percentage-box {
                    opacity: 0;
                }

                .loader-wrapper .percentage-box {
                    position: absolute;
                    bottom: 0;
                    right: 25%;
                    font-size: 14px;
                    color: #4aaa42;
                }
            </style>
        @endif
        {!! isset_not_empty($site->custom_script_in_header) !!}
    </head>
    <body data-template="{{ isset_not_empty($currentPage->template) }}">
        {!! isset_not_empty($site->custom_script_in_body) !!}
        @if(isset_not_empty($site->show_web_loader) == true)
            <div class="loader-wrapper">
                <div class="inner">
                    <div class="logo-box">
                        <div class="logo"><img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail(isset_not_empty($site->load_logo)) }}"
                                               alt="Holiday Inn Makati"></div>
                        <div class="percentage-box">
                            <div class="percentage">0%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.header'))
        <main id="wrapper" data-scrollbar>
            <!-- Add your site or application content here -->
            @yield('content')
            @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.booking'))
            @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.footer'))
        </main>
        @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.booking'))

        @if(isset_not_empty($currentPage->template) && $currentPage->template == 'gallery')
            <div class="gallery-preview-modal">
                <div class="box-close">
                    <span></span>
                    <span></span>
                </div>
                <div class="box-content-wrapper"></div>
                <div class="box-slider-info">
                    <span class="slider-title"></span>
                </div>
            </div>
        @endif
        <script type="text/javascript">
            var wrapper = document.getElementById("wrapper");
            var targetDiv = wrapper.getElementsByClassName("hero-section")[0]
            if (!targetDiv) {
                wrapper.setAttribute('data-type', 'no-hero');
            }
        </script>
        {{-- Main script --}}
        <script src="{{ \App\CMS\Helpers\CMSHelper::getAssetPath('js/app.js') }}" async></script>
        {{-- Custom scripts --}}

        @yield('scripts')
    </body>
</html>