@if(isset_not_empty($pageItem))
    <?php
    $currentPage = \App\CMS\Helpers\CMSHelper::getCurrentPage();
    $offerItem = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('offers');
    $site = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('site');
    $dataList = [];
    $category=array();
    $count=0;
    //หาค่าที่set page ไว้
    if(isset_not_empty($pageItem->offer_category_id)){
        $category=explode(",",$pageItem->offer_category_id);
    }
    if(isset_not_empty($offerItem->items)){
        foreach ($offerItem->items as $value) {
            if(count($category) >=1){
                foreach ($category as $i=>$key){
                    if(isset_not_empty($value->items)){
                        //แสดง เฉพาะPage ที่ add ไว้
                        if(isset_not_empty($value->categoryr_id)){
                        if(strtolower($value->categoryr_id)==strtolower($key)){
                            foreach ($value->items as $value) {
                                array_push($dataList, $value);
                            }
                        }
                        }
                    }
                }
            }else{
                //ถ้าไม่ได้ set จะไปดึงทั้งหมด ของ offer มาแสดง
                if (isset_not_empty($value->items)) {
                    foreach ($value->items as $value) {
                        array_push($dataList, $value);
                    }
                }
            }
        }
        \App\CMS\Helpers\CMSHelper::sortByColumn($dataList, 'publish_date', SORT_ASC);
    }
    ?>
    @if(isset_not_empty($dataList))
        <section class="container content-slider-section{{$pageItem->background == true ? ' background' : '' }}">
            <div class="heading-box">
                <h2 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h2>
                @if(isset_not_empty($pageItem->sub_heading))
                    <h3 class="sub-heading">{!! $pageItem->sub_heading !!}</h3>
                @endif
            </div>
            <div class="slide-block-container">
                <div class="grid-x content-slider">
                    @if(isset_not_empty($dataList))
                        @foreach($dataList as $i => $value)
                            @if($currentPage->template === 'homepage' or (count($category) >=0))
                                @if(($i+1) > intval($site->max_latest_offer))
                                    @break
                                @endif
                            @endif
                            <div class="cell auto slide-item">
                                <div class="grid-x">
                                    <div class="cell small-12 medium-6 image-block-container">
                                        <div class="section-image">
                                            <div class="image">
                                                @if(isset_not_empty($value->image))
                                                    <img
                                                        src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($value->image) }}"
                                                        alt="{{ isset_not_empty($value->image_alt) }}" class="lazyload">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="cell grid-x small-12 medium-6 align-left-middle article-block-container">
                                        <h3 class="article-heading">{!! isset_not_empty($value->article_heading) !!}</h3>
                                        <div class="article">
                                            {!! isset_not_empty($value->article_summary) !!}
                                        </div>
                                        @if(isset_not_empty($value->link_url))
                                            <div class="button-block">
                                                <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($value->link_url) }}"
                                                   target="{{ isset_not_empty($value->link_target,'_blank') }}"
                                                   class="link">{{ isset_not_empty($value->link_label) }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(isset_not_empty($dataList))
                    <div class="slide-dots hide-for-large"></div>
                    <div class="slide-nav show-for-large"></div>
                @endif
            </div>
            @if(isset_not_empty($pageItem->link_url))
                <div class="button-block">
                    <a href="{{ \App\CMS\Helpers\CMSHelper::pageUrl($pageItem->link_url) }}" class="link"
                       target="{{ isset_not_empty($pageItem->link_target,'_blank') }}">{{ isset_not_empty($pageItem->link_label) }}</a>
                </div>
            @endif
        </section>
    @endif
@endif
