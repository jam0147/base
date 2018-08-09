<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Route::get('/', 'EscritorioController@index')->name('admin.escritorio');
    Route::get('login', 			'LoginController@index')->name('admin.login');
});
