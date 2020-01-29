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

/* Homepage */
// Route::get('/', 'HomeController@index');
// /* About */
// Route::get('/about', 'PageController@about');
// /* Archive */
// Route::get('/archive', 'ArchiveController@index');
// /* Posts */
// Route::get('/posts', 'PostController@index')->middleware('auth');
// // Route::get('/{year}/{month}/{day}/{permalink}', 'BlogPostController@visitPage');
// /* Projects */
// Route::get('/projects', 'ProjectController@index');
// /* Admin Blog */
// // Route::get('/post/new', 'BlogPostController@new')->middleware('auth');
// // Route::post('/post/create', 'BlogPostController@create')->middleware('auth');
// // Route::post('post/save/{id}', 'BlogPostController@save')->middleware('auth');
// // Route::get('/post/delete/{id}', 'BlogPostController@delete')->middleware('auth');
// // Route::get('/post/edit/{id}', 'BlogPostController@edit');

// /* Admin Projects */
// Route::get('/project/new', 'ProjectController@new')->middleware('auth');
// Route::post('/project/create', 'ProjectController@create')->middleware('auth');
// Route::post('project/save/{id}', 'ProjectController@save')->middleware('auth');
// Route::get('/project/delete/{id}', 'ProjectController@delete')->middleware('auth');
// Route::get('/project/edit/{id}', 'ProjectController@edit')->middleware('auth');
// Route::get('/project/projects', 'ProjectController@adminIndex')->middleware('auth');

// Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');
// Route::get('/admin', 'PageController@admin')->middleware('auth');
// // Route::get('/pages', 'PageController@pages')->middleware('auth');
// // Route::get('/page/edit/{id}', 'PageController@edit')->middleware('auth');
// // Route::post('/page/save/{id}', 'PageController@save')->middleware('auth');

// Route::get('/profile', 'AdminController@profile')->middleware('auth');
// Route::post('/profile/save/{id}', 'AdminController@saveProfile')->middleware('auth');
// Route::get('/password/change', 'AdminController@showChangePassword')->middleware('auth');
// Route::post('/password/change/{id}', 'AdminController@changePassword')->middleware('auth');



Auth::routes();
