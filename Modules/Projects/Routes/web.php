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
Route::prefix('admin')->group(function () {
    Route::get('projects', 'ProjectsController@projects')->middleware('auth');

    Route::get('project/new', 'ProjectsController@new')->middleware('auth');
    Route::post('project', 'ProjectsController@store')->middleware('auth');
    Route::get('project/{id}/edit', 'ProjectsController@edit')->middleware('auth')->name('project.edit');;
    // Route::get('project/{id}', 'ProjectsController@edit')->middleware('auth');
    // Route::get('/project/edit/{id}', 'ProjectsController@edit')->name('project.edit');
    Route::put('project/{id}', 'ProjectsController@update')->middleware('auth');
    Route::delete('project/{id}', 'ProjectsController@destroy')->middleware('auth');
});

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectsController@index');
});
