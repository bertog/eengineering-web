<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/blog', function() {
   return view('blog');
});
