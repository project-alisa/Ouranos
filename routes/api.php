<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'],function (){
    Route::pattern('apiVersion1','v[1]');
    Route::group(['namespace' => 'Api\v1', 'prefix' => '{apiVersion1}'],function (){
        Route::get('status','BasicApiController@status');
    });

    Route::fallback('Api\v1\BasicApiController@routeFallback');
});

