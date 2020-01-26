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

Route::get('/page/edit/{id}', 'PagesController@edit')->middleware('auth');
Route::post('/page/update/{id}', 'PagesController@update')->middleware('auth');


Route::get('/about', 'PagesController@about');
Route::prefix('admin')->group(function () {
    Route::get('pages', 'PagesController@pages')->middleware('auth');
    Route::get('/', 'PagesController@admin')->middleware('auth');
});
