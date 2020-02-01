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
Route::get('/{year}/{month}/{day}/{permalink}', 'BlogController@post')->where([
    'year'   => '[0-9]+',
    'month'   => '[0-9]+',
    'day'   => '[0-9]+'
]);


Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    //Admin
    Route::get('/posts', 'BlogController@posts')->name('admin.posts');
    Route::resource('post', 'BlogController');
});
