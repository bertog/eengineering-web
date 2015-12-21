<?php

//Authentication Route
get('/login', 'Auth\AuthController@getLogin');
post('/login', 'Auth\AuthController@postLogin');
get('/logout', 'Auth\AuthController@getLogout');

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'dashboard',
              'middleware' => 'auth'], function() {
   get('/', function() {
       return view('dashboard');
   });
});

Route::group(['prefix' => 'blog'], function() {
    get('/', 'PostsController@index');
});

