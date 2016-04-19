<?php

Route::get('/', 'LatihanController@index');
Route::get('/about', 'LatihanController@about');
Route::get('/portofolio', 'LatihanController@portofolio');

Route::post('product/validasi_create', 'ProductController@validasi_create');
Route::post('product/validasi_edit', 'ProductController@validasi_edit');

Route::resource('product', 'ProductController');
Route::resource('user', 'MasterController');

Route::post('user/do_create', 'MasterController@do_create');
Route::post('user/do_delete', 'MasterController@do_delete');
Route::post('user/get_data_table', 'MasterController@get_data_table');
// Route::post('user/do_delete', 'MasterController@destroy');

Route::group(['prefix' => 'create'], function(){
  Route::get('/', 'MasterController@create');
  Route::post('valitade', 'MasterController@ajax_validate');

});
