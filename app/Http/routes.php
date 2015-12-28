<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::resource('post', 'PostsController');
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['prefix' => 'dashboard'], function() {
    	Route::get('/', function() {
    		return view('dashboard.index');
    	});
    	Route::get('/posts', function() {
    		return view('dashboard.post_manager');
    	});
    });

    Route::get('post/create', 'PostsController@create');
});

Route::group(['middleware' => 'api',
			  'prefix' => 'api',
			  'namespace' => 'Api'
			  ], function() {
	Route::get('posts', 'PostsController@index');
	Route::delete('posts/{post}', 'PostsController@destroy');
});


