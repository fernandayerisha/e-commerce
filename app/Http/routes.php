<?php

Route::get('/', 'LatihanController@index');
Route::get('/about', 'LatihanController@about');
Route::get('/portofolio', 'LatihanController@portofolio');

Route::post('product/validasi_create', 'ProductController@validasi_create');
Route::post('product/validasi_edit', 'ProductController@validasi_edit');

Route::resource('product', 'ProductController');
Route::resource('user', 'MasterController');

// Route::group(['prefix' => 'edit'], function(){
//   Route::get('/', 'MasterController@edit');
//   Route::post('ajax_validate', 'MasterController@ajax_validate');
// });

Route::group(['prefix' => 'create'], function(){
  Route::get('/', 'MasterController@create');
  Route::post('ajax_validate', 'MasterController@ajax_validate');
});
