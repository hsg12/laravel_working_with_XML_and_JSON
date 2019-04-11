<?php

Route::get('/', 'IndexController@index')->name('main');

Route::get('/json', 'JsonDataController@index')->name('json');
Route::post('/json/add', 'JsonDataController@add')->name('json.add');

Route::get('/xml', 'XMLDataController@index')->name('xml');
Route::post('/xml/add', 'XMLDataController@add')->name('xml.add');