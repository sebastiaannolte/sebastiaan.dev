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
// Index
Route::get('/', 'BlogController@index');
// Post
Route::get('/{year}/{month}/{day}/{permalink}', 'BlogController@post');

Route::prefix('admin')->group(function () {
    //Admin
    Route::put('/post/{id}', 'BlogController@update')->middleware('auth');
    Route::get('/posts', 'BlogController@posts')->middleware('auth');
    Route::get('/post/edit/{id}', 'BlogController@posts')->middleware('auth');
    Route::get('/post/new', 'BlogController@new')->middleware('auth');
    Route::post('/post', 'BlogController@store')->middleware('auth');
    Route::delete('/post/{id}', 'BlogController@destroy')->middleware('auth');
});
