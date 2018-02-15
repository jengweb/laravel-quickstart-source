<?php

if (config('cms.mockup.mode') == false || strtolower(config('cms.mockup.mode')) == 'false') {
    Route::group(['middleware' => ['cms']], function () {
        Route::get('sitemap.xml', 'CMSController@getSiteMapXML');
        Route::get('{name?}', 'CMSController@index');
    });
} else {
    Route::group(['middleware' => ['cms-mockup']], function () {
        Route::get('{name?}', 'MockUpController@index');
    });
}
