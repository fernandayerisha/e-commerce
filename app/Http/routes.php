<?php

Route::get('/', 'LatihanController@index');
Route::get('/about', 'LatihanController@about');
Route::get('/portofolio', 'LatihanController@portofolio');

Route::resource('product', 'ProductController');
Route::resource('user', 'MasterController');

Route::post('user/edit/ajax_validate', 'MasterController@ajax_validate');
// Route::group(['prefix' => 'edit'], function(){
//   Route::get('/', 'MasterController@edit');
//   Route::post('ajax_validate', 'MasterController@ajax_validate');
// });

Route::group(['prefix' => 'create'], function(){
  Route::get('/', 'MasterController@create');
  Route::post('ajax_validate', 'MasterController@ajax_validate');
});
