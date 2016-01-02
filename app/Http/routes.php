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
    Route::get('/', function () {
        return view('home');
    });
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['prefix' => 'dashboard'], function() {
    	Route::get('/', function() {
    		return view('dashboard.index');
    	});
    	Route::get('/posts', function() {
    		return view('dashboard.post_manager');
    	});
        Route::get('/posts/archive', function() {
            return view('dashboard.post_archive');
        });
		Route::get('/brands', 'BrandsController@manager');
        Route::get('/brands/upload', 'BrandsController@upload');
    });

    Route::get('post/create', 'PostsController@create');
});

Route::group(['middleware' => 'api',
			  'prefix' => 'api',
			  'namespace' => 'Api'
			  ], function() {
	Route::get('posts', 'PostsController@index');
    Route::get('posts/archive', 'PostsController@archive');
	Route::delete('posts/{post}', 'PostsController@destroy');
	Route::put('posts/{id}/restore', 'PostsController@restore');

    Route::post('brands/upload', 'BrandsController@upload');
    Route::get('brands', 'BrandsController@index');
    Route::get('brands/visible', 'BrandsController@visible');
    Route::put('brands/{brand}', 'BrandsController@update');
});


