<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'InfoController@home');

Route::get('/clock', 'InfoController@clock');

Route::get('/search', 'SearchController@search');

Route::get('/about', 'InfoController@about');

Route::resource('idol','IdolController',['only' => ['index','show']]);

// Blogparts
Route::get('/blogparts/idol','BlogPartsController@idol');

Route::get('/blogparts','BlogPartsController@docs');
