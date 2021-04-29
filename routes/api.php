<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', [
        'as' => 'users',
        'uses' => 'UserController@index',
    ]);

    Route::get('/{userId}', [
        'as' => 'users.show',
        'uses' => 'UserController@show',
    ]);

    Route::post('/', [
        'as' => 'users.create',
        'uses' => 'UserController@create'
    ]);

    Route::put('/{userId}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ]);

    Route::delete('/{userId}', [
        'as' => 'users.remove',
        'uses' => 'UserController@remove',
    ]);
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('', [
        'as' => 'articles',
        'uses' => 'ArticleController@index',
    ]);

    Route::get('/{articleId}', [
        'as' => 'articles.show',
        'uses' => 'ArticleController@show',
    ]);

    Route::post('/', [
        'as' => 'articles.create',
        'uses' => 'ArticleController@create',
    ]);

    Route::put('/{articleId}', [
        'as' => 'articles.update',
        'uses' => 'ArticleController@update',
    ]);

    Route::delete('/{articleId}', [
        'as' => 'articles.remove',
        'uses' => 'ArticleController@remove',
    ]);
});
