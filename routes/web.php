<?php

Route::get('/', 'GalleryController@index');
Route::resource('gallery', 'GalleryController');
Route::resource('photo', 'PhotoController');
Route::get('/gallery/show/{id}', 'GalleryController@show');
Route::get('/photo/create/{id}', 'PhotoController@create');