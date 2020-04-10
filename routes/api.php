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

    Route::fallback(function (){
        return response()->json(['error' => [
            'status' => 404,
            'error' => 'Not Found',
            'message' => 'There is nothing here.'
        ]],404);
    });
});

