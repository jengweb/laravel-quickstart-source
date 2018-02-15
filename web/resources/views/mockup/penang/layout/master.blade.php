<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Holiday Inn & Suites Makati</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
    </head>
    <body data-template="{{$template}}">
        <div class="loader-wrapper">
            <div class="inner">
                <div class="logo-box">
                    <div class="logo"><img src="{{ \App\CMS\Helpers\CMSHelper::getAssetPath('images/h-logo.svg') }}" alt="Holiday Inn Makati"></div>
                    <div class="percentage-box">
                        <div class="percentage">0%</div>
                    </div>
                </div>
            </div>
        </div>
        @include('mockup.hi-makati.includes.header')
        <main id="wrapper" data-scrollbar>
            <!-- Add your site or application content here -->
            @yield('content')

            @include('mockup.hi-makati.includes.booking')
            @include('mockup.hi-makati.includes.footer')
        </main>
        @include('mockup.hi-makati.includes.booking')

        @if($template == 'gallery')
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
            if(!targetDiv) {
                wrapper.setAttribute('data-type','no-hero');
            }
        </script>
        {{-- Main script --}}
        <script src="{{ \App\CMS\Helpers\CMSHelper::getAssetPath('js/app.js') }}" async></script>

        {{-- Custom scripts --}}
        @yield('scripts')
    </body>
</html>