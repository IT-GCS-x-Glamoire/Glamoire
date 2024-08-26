<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('contact');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/contact', function () {
    return view('contact');
});
