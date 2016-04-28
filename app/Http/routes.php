<?php

Route::auth();

Route::get('/', 'MainController@index');
Route::get('/about', 'MainController@about');
Route::get('/portofolio', 'MainController@portofolio');

//resource restfull
Route::resource('product', 'ProductController');

//validate toko
Route::group(['prefix' => 'admin'], function()
{
  Route::get('/', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
  Route::group(['prefix' => 'toko', 'middleware' => 'auth'], function()
  {
    Route::resource('/', 'TokoController');
    Route::post('validasi_create', 'TokoController@validasi_create');
    Route::post('validasi_edit', 'TokoController@validasi_edit');
    Route::post('validasi_delete', 'TokoController@validasi_delete');
  });
  Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::resource('/', 'MasterController');
    Route::post('do_create', 'MasterController@do_create');
    Route::post('do_edit/{id}', 'MasterController@do_edit');
    Route::post('do_delete', 'MasterController@do_delete');
    Route::post('get_data_table', 'MasterController@get_data_table');
    Route::group(['prefix' => 'create'], function(){
      Route::get('/', 'MasterController@create');
      Route::post('valitade', 'MasterController@ajax_validate');
    });
    Route::post('modal_detail', 'MasterController@modal_detail');
    Route::post('modal_edit', 'MasterController@modal_edit');
  });
});


//validate product
Route::post('product/validasi_create', 'ProductController@validasi_create');
Route::post('product/validasi_edit/{id}', 'ProductController@validasi_edit');


//Auth Route
// Route::get('/login','MainController@LoginUser');


Route::get('/home', 'HomeController@index');
