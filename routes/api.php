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
 * Zauth Routes
 */
Route::group(['prefix' => 'chaufer/inquiry'], function () {
    Route::post('create', 'ChauferInquiryController@create')->name('create');
});