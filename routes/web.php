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

Route::get('/home', 'AdminPostsController@welcome')->name('home');

Auth::routes();

Route::get('/home', 'AdminPostsController@welcome')->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/search','SearchController@index');

Route::get('/searched','SearchController@search');





Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin',  'AdminUsersController@admin');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('/admin/reply', 'CommentRepliesController');
    Route::get('/admin/user/profile', 'AdminUsersController@profile');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/post/{id}', 'AdminPostsController@post');
    Route::resource('/profile', 'UserProfileController');


});


