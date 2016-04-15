<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'LatihanController@index');
Route::get('/about', 'LatihanController@about');
Route::get('/portofolio', 'LatihanController@portofolio');

Route::resource('blog', 'MasterController');
Route::resource('product', 'ProductController');

// Route::get('/detail','ProductController@detail');

// Route::get('/latihan1', function () {
//   return view('latihan1');
// });
