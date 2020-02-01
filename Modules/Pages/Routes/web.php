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




Route::get('/about', 'PagesController@about');
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    // Admin homespage
    Route::get('/', 'PagesController@admin')->name('admin.pages');
    // // Admin pages
    Route::get('pages', 'PagesController@pages');
    Route::resource('page', 'PagesController');
});
