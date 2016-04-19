<?php

Route::get('/', 'LatihanController@index');
Route::get('/about', 'LatihanController@about');
Route::get('/portofolio', 'LatihanController@portofolio');

Route::resource('product', 'ProductController');
Route::resource('user', 'MasterController');

Route::post('user/do_create', 'MasterController@do_create');
Route::post('user/do_delete', 'MasterController@do_delete');
// Route::post('user/do_delete', 'MasterController@destroy');

Route::post('user/edit/ajax_validate', 'MasterController@ajax_validate');
// Route::group(['prefix' => 'edit'], function(){
//   Route::get('/', 'MasterController@edit');
//   Route::post('ajax_validate', 'MasterController@ajax_validate');
// });

Route::group(['prefix' => 'create'], function(){
  Route::get('/', 'MasterController@create');
  Route::post('valitade', 'MasterController@ajax_validate');

});
