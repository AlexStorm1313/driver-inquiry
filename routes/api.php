<?php

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

/*
 * Chaufer Inquiry Routes
 */
Route::group(['middleware' => ['auth:api'], 'prefix' => 'chaufer-inquiry'], function () {
    Route::get('get', 'ChauferInquiryController@get')->name('get');
    Route::group(['prefix' => '{id}'], function () {
        Route::delete('delete', 'ChauferInquiryController@delete')->name('delete');
    });
    Route::group(['middleware' => ['client'], 'prefix' => 'chaufer-inquiry'], function () {
        Route::post('create', 'ChauferInquiryController@create')->name('create');
    });
});
