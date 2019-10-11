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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clock', function () {
    $feed = simplexml_load_file(config('ouranos.mastodonFeedUrl'));
    return view('clock',compact('feed'));
});

//Auth::routes(['register' => false , 'reset' => false , 'verify' => false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('idol','IdolController',['only' => ['index','show']]);
