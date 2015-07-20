<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use app\User;

Route::get('/', function () {
    return view('welcome');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Front page routes
Route::get('/', 'FrontPageController@index');

//Posts routes
Route::model('post', 'App\Post');
Route::get('/posts', 'PostController@index');
Route::get('posts/create', 'PostController@create');
Route::post('posts/create', 'PostController@store');
Route::get('posts/{post}', 'PostController@show');

//Users Routes
/*
 * Has a binding rule for the wild card {users} in the
 * RouteServiceProvider to take the wild card and query it
 * against the name
 * */
//Route::model('user', 'App\User');
Route::get('user/{user}', 'UserController@show');
Route::get('user/{user}/edit', 'UserController@edit');
Route::post('user/{user}/edit', 'UserController@update');
Route::get('user/{user}/posts', 'UserController@showPosts');


//Comment api routes
Route::group(array('prefix' => 'posts/{post}'), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('comments', 'CommentController',
        array('only' => array('index', 'store', 'destroy')));

});



