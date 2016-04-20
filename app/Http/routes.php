<?php

Route::get('/', 'MainControler@index');
Route::get('/about', 'MainControler@about');
Route::get('/portofolio', 'MainControler@portofolio');

//validate product
Route::post('product/validasi_create', 'ProductController@validasi_create');
Route::post('product/validasi_edit/{id}', 'ProductController@validasi_edit');

//resource restfull
Route::resource('product', 'ProductController');
Route::resource('user', 'MasterController');

//validate user
Route::post('user/do_create', 'MasterController@do_create');
Route::post('user/do_delete', 'MasterController@do_delete');
Route::post('user/get_data_table', 'MasterController@get_data_table');
Route::group(['prefix' => 'create'], function(){
  Route::get('/', 'MasterController@create');
  Route::post('valitade', 'MasterController@ajax_validate');

});
