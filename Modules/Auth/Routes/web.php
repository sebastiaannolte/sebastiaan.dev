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
Route::get('/admin/login', 'AuthController@login');
// Route::post('logout', 'Auth\LoginController@logout')->middleware('auth');
Route::prefix('admin')->group(function () {
    Route::get('profile', 'AuthController@profile')->middleware('auth');
    Route::put('profile/{id}', 'AuthController@update')->middleware('auth');
    Route::get('password/change', 'AuthController@showChangePassword')->middleware('auth');
    Route::put('/password/change/{id}', 'AuthController@changePassword')->middleware('auth');


    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    // Auth::routes();
});
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
