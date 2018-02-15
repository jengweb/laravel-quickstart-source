@if(isset_not_empty($pageItem))
    <section class="container text-section">
        <div class="grid-x">
            @if(isset_not_empty($pageItem->image))
                <div class="cell small-12 large-5 image-block-container">
                    <div class="section-image">
                        <div class="image">
                            <img src="{{ \App\CMS\Helpers\CMSHelper::thumbnail($pageItem->image) }}" alt="{{ isset_not_empty($pageItem->image_alt) }}">
                        </div>
                    </div>
                </div>
            @endif
            <div class="cell small-12 large-auto article-block-container">
                <h1 class="heading">{!! isset_not_empty($pageItem->section_heading) !!}</h1>
                @if(isset_not_empty($pageItem->sub_heading))
                    <h2 class="sub-heading">{!! $pageItem->sub_heading !!}</h2>
                @endif
                <div class="article">
                    {!! isset_not_empty($pageItem->article_content) !!}
                </div>
            </div>
        </div>
    </section>
@endif