@extends(\App\CMS\Helpers\CMSHelper::getTemplatePath('layouts.master'))

<?php
$isPreview = session(\App\CMS\Constants\CMSConstants::CMS_PAGE_PREVIEW_ACTIVE, false);
$isDev = env('APP_DEBUG', false);
?>
@section('content')
    @if(${\App\CMS\Constants\CMSConstants::RENDER_DATA} = \App\CMS\Helpers\CMSHelper::prepareTemplates())
        @foreach (${\App\CMS\Constants\CMSConstants::RENDER_DATA} as $key => $template)
            @if($isPreview || $isDev)
                @include($template[\App\CMS\Constants\CMSConstants::TEMPLATE_PATH], $template)
            @else
                <?php
                $id = \App\CMS\Helpers\CMSHelper::generateCacheKey(
                    isset_not_empty($template[\App\CMS\Constants\CMSConstants::PAGE_ITEM_KEY]->_variable_name, $key)
                );
                ?>
                @cache($template[\App\CMS\Constants\CMSConstants::TEMPLATE_PATH], $template, 10080, $id)
            @endif
        @endforeach
    @endif
@endsection