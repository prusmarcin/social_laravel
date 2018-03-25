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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/search', 'SearchController@users');

Route::resource('/users', 'UsersController', ['except' => ['index', 'create', 'store', 'destroy']]);//except wyjawszy z routingu te metody ktore sa zbedne

Route::get('/user-avatar/{id}/{size}', 'ImagesController@user_avatar');

//Route::resource('/friends', 'FriendsController', ['except' => ['create', 'edit', 'show']]);//except wyjawszy z routingu te metody ktore sa zbedne
//te ponizej sa bardziej czytelne
Route::get('/users/{user}/friends', 'FriendsController@index');
Route::post('/friends/{friend}', 'FriendsController@add');
Route::patch('/friends/{friend}', 'FriendsController@accept');
Route::delete('/friends/{friend}', 'FriendsController@destroy');

Route::resource('/posts', 'PostsController', ['except' => ['index', 'create']]);//except wyjawszy z routingu te metody ktore sa zbedne

Route::get('/wall', 'WallsController@index');

Route::resource('/comments', 'CommentsController', ['except' => ['index', 'create']]);//except wyjawszy z routingu te metody ktore sa zbedne

Route::post('/likes', 'LikesController@add');
Route::delete('/likes', 'LikesController@destroy');

Route::get('/notifications', 'NotificationsController@index');
Route::patch('/notifications/{notification}', 'NotificationsController@update');