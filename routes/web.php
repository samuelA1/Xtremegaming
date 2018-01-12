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

Route::get('/','AdminPostsController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/post/{id}', 'AdminPostsController@post');

Route::resource('/admin/users', 'AdminUsersController');
Route::resource('/admin/posts', 'AdminPostsController');
Route::resource('/admin/comments', 'PostCommentsController');
