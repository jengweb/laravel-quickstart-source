@has($pageItem)
<?php

$title = App\CMS\Helpers\CMSHelper::getItemOption($pageItem, 'title');
$description = App\CMS\Helpers\CMSHelper::getItemOption($pageItem, 'description');

$children = App\CMS\Helpers\CMSHelper::getCurrentChildrenPages();
$children_page = collect($children)->map(function ($item) {
    $page_data = App\CMS\Helpers\CMSHelper::getPageDataByFriendlyUrl($item->friendly_url);
    if ($item->template === 'blog_detail') {
        $data = $page_data->_page_data;
        if (isset_not_empty($data->blog_feature)) {
            $feature = $data->blog_feature;
            $item->_title = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'title', $item->name);
            $item->_description = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'description');
            $item->_image_url = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'image_url');
            $item->_image_alt = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'image_alt');
            $item->_link_url = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'link_url', $item->friendly_url);
            $item->_link_target = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'link_target');
            $item->_link_label = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'link_label');
            $item->_published_on = App\CMS\Helpers\CMSHelper::getItemOption($feature, 'published_on', date('Y/m/d'));
        }
    }
    return $item;
});
$children_page = $children_page->sortByDesc('_published_on');

?>
@if(isset_not_empty($title) || isset_not_empty($description))
    <section class="container content-block-section">
        @if(isset_not_empty($title))
            <h1>@text($title)</h1>
        @endif
        @if(isset_not_empty($description))
            <div class="article">
                {!! $description !!}
            </div>
        @endif
    </section>
@endif
@if($children_page->isNotEmpty())
    <section class="container content-list-block-section image-text">
        @foreach($children_page as $child => $item)
            @if(isset_not_empty($item->_image_url) || isset_not_empty($item->_title) || isset_not_empty($item->_description))
                <div class="grid-x list-wrapper">
                    <div class="cell small-12  large-3 image-block-container">
                        <a class="section-image heading-form" href="@text($item->_link_url)"
                           target="@text($item->_link_target)">
                            @if(isset_not_empty($item->_image_url))
                                <span class="image ">
                                <img src="{{App\CMS\Helpers\CMSHelper::thumbnail($item->_image_url)}}"
                                     alt="@text($item->_image_alt)">
                            </span>
                            @endif
                        </a>
                    </div>
                    <div class="cell small-12 large-auto article-block-container">
                        @if(isset_not_empty($item->_title))
                            <h2 class="heading">@text($item->_title)</h2>
                        @endif
                        @if(isset_not_empty($item->_description))
                            <div class="article">
                                {!! $item->_description !!}
                            </div>
                        @endif
                        @if(isset_not_empty($item->_link_label) && isset_not_empty($item->_link_url))
                            <div class="button-block">
                                <a href="{{App\CMS\Helpers\CMSHelper::url($item->_link_url)}}"
                                   target="@text($item->_link_target)" class="link">@text($item->_link_label)</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </section>
@endif
@endhas