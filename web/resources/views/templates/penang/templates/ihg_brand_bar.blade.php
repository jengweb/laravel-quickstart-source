<?php
$brandBarMenu = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('brand_bar_menu');
?>
<div class="ihg-brand-bar">
    <div class="container">
        <div class="ihg-brand">
            @if(isset_not_empty($ihgBrand->ihg_brand_logo))
                <a href="{{ isset_not_empty($ihgBrand->ihg_brand_link_url) }}"
                   target="{{ isset_not_empty($ihgBrand->ihg_brand_link_target,'_self') }}">
                    <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($ihgBrand->ihg_brand_logo) }}"
                         alt="{{ isset_not_empty($ihgBrand->ihg_logo_alt) }}" class="main">
                    @if(isset_not_empty($ihgBrand->ihg_brand_hover_logo))
                        <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($ihgBrand->ihg_brand_hover_logo) }}"
                             alt="{{ isset_not_empty($ihgBrand->ihg_reward_alt) }}" class="hover">
                    @endif
                </a>
            @endif
        </div>
        <div class="group-bar clearfix">
            <div class="brand">
                <div class="grid-x item-wrapper">
                    @if(isset_not_empty($ihgBrand->hotels_brand))
                        @foreach($ihgBrand->hotels_brand as $i => $value)
                            <div class="cell item-container">
                                <div class="item">
                                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                       target="{{ isset_not_empty($value->link_target,'_self') }}">
                                        @if(isset_not_empty($value->image))
                                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                 alt="{{ isset_not_empty($value->image_alt) }}" class="main">
                                        @endif
                                        @if(isset_not_empty($value->hover_image))
                                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->hover_image) }}"
                                                 alt="{{ isset_not_empty($value->image_alt) }}" class="hover">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="rewards">
                @if(isset_not_empty($ihgBrand->ihg_reward_logo))
                    <a href="{{ isset_not_empty($ihgBrand->ihg_reward_link_url) }}"
                       target="{{ isset_not_empty($ihgBrand->ihg_reward_link_target,'_self') }}">
                        <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($ihgBrand->ihg_reward_logo) }}"
                             alt="{{ isset_not_empty($ihgBrand->ihg_reward_alt) }}" class="main">
                        @if(isset_not_empty($ihgBrand->ihg_reward_hover_logo))
                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($ihgBrand->ihg_reward_hover_logo) }}"
                                 alt="{{ isset_not_empty($ihgBrand->ihg_reward_alt) }}" class="hover">
                        @endif
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="grid-x">
        @if(isset_not_empty($brandBarMenu->items))
            <div class="cell small-12 large-5 navigation-wrapper">
                <ul>
                    @foreach($brandBarMenu->items as $key=>$value)
                        <li><a href="{{ isset_not_empty($value->link_url) }}" target="{{ isset_not_empty($value->link_target) }}" style="color: #707372;">{{ isset_not_empty($value->link_label) }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="cell small-12 large-7 brand-bar-text">
            {!! isset_not_empty($ihgBrand->brand_text) !!}
        </div>
    </div>

</div>