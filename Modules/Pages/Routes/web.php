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
Route::prefix('admin')->group(function () {
    // Admin homespage
    // Route::get('/', 'PagesController@admin')->middleware('auth');
    // // Admin pages
    Route::get('pages', 'PagesController@pages')->middleware('auth');

    // Route::get('/page/{id}/edit', 'PagesController@edit')->middleware('auth');
    // Route::put('/page/{id}', 'PagesController@update')->middleware('auth');
    Route::resource('page', 'PagesController');
});
