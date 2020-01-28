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

// Route::resource('admin/project', 'ProjectsController');
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('projects', 'ProjectsController@projects')->middleware('auth');
    Route::resource('project', 'ProjectsController');
});

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectsController@index');
});
