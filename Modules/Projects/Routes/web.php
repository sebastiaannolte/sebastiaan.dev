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
Route::get('/project/edit/{id}', 'ProjectsController@edit')->middleware('auth');
Route::post('/project/update/{id}', 'ProjectsController@update')->middleware('auth');
Route::get('/project/delete/{id}', 'ProjectsController@delete')->middleware('auth');

Route::prefix('admin')->group(function () {
    Route::get('/projects', 'ProjectsController@projects')->middleware('auth');
    Route::get('project/new', 'ProjectsController@new')->middleware('auth');
    Route::post('project', 'ProjectsController@store')->middleware('auth');
});

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectsController@index');
});
