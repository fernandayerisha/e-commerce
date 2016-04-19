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

// <<<<<<< HEAD
Route::resource('blog', 'MasterController');
Route::resource('product', 'ProductController');
Route::post('product/validasi_create', 'ProductController@validasi_create');
Route::post('product/validasi_edit', 'ProductController@validasi_edit');

// Route::get('/detail','ProductController@detail');
// =======
Route::resource('user', 'MasterController');
// >>>>>>> e0ade6f375c5cd3ddc81b9deadf60894d75aa49f

// Route::get('/latihan1', function () {
//   return view('latihan1');
// });
