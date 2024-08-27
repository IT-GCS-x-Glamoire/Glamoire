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

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});


// product
Route::get('/product-admin', function () {
    return view('admin.product.index');
});

Route::get('/create-product', function () {
    return view('admin.product.create');
});


// order
Route::get('/order-list', function () {
    return view('admin.order.index');
});

Route::get('/order-detail', function () {
    return view('admin.order.detail');
});


// brand
Route::get('/brand-admin', function () {
    return view('admin.brand.index');
});

Route::get('/category-product', function () {
    return view('admin.category.index');
});

Route::get('/article-admin', function () {
    return view('admin.article.index');
});

Route::get('/user', function () {
    return view('admin.user.index');
});

Route::get('/shipping-fee', function () {
    return view('admin.shippingfee.index');
});

Route::get('/promo', function () {
    return view('admin.promo.index');
});

Route::get('/affiliate-admin', function () {
    return view('admin.affiliate.index');
});

