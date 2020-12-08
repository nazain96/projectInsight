<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('sid_review', function () {
//     return view('sid_review');
// });

Route::get('/', 'PendingEventController@index' )->name('index');

Route::post('store', 'PendingEventController@store' )->name('store');

Route::get('sid-mapping', 'SidMappingController@index' )->name('sidmapping');

Route::get('sid-review/{sid}', 'SidMappingController@sidReview' )->name('sidReview');

Route::post('state-update/{sid}', 'SidMappingController@stateUpdate' )->name('stateUpdate');