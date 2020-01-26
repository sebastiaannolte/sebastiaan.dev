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
Route::get('/posts/delete/{id}', 'BlogController@destroy')->middleware('auth');
Route::get('/', 'BlogController@index');
Route::get('/{year}/{month}/{day}/{permalink}', 'BlogController@post');
Route::get('/post/edit/{id}', 'BlogController@edit')->middleware('auth');
Route::post('/post/update/{id}', 'BlogController@update')->middleware('auth');
Route::prefix('admin')->group(function () {
    Route::get('/posts', 'BlogController@posts')->middleware('auth');
    Route::get('/posts/new', 'BlogController@new')->middleware('auth');
    Route::post('/posts/store', 'BlogController@store')->middleware('auth');
    // Route::delete('/posts/delete/{id}', 'BlogController@destroy')->middleware('auth');
    // Route::get('/post/edit/{id}', 'BlogController@edit')->middleware('auth');
});
