@has($pageItem)
<?php

$title = App\CMS\Helpers\CMSHelper::getItemOption($pageItem, 'title');
$description = App\CMS\Helpers\CMSHelper::getItemOption($pageItem, 'description');
?>
<section class="container content-detail-section">
    @if(isset_not_empty($title))
        <h1>@text($title)</h1>
    @endif
    @if(isset_not_empty($description))
        <div class="article">
            {!! $description !!}
        </div>
    @endif
</section>
@endhas