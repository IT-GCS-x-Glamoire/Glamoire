<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');
Route::post('/check-email-subscribe', [FormController::class, 'checkEmailSubscribe'])->name('check.email.subscribe');
Route::post('/check-email-voucher', [FormController::class, 'checkEmailVoucher'])->name('check.email.voucher');
Route::post('/check-handphone', [AuthController::class, 'checkHandphone'])->name('check.handphone');

// ACCOUNT
Route::get('/{user}_account', [UserController::class, 'account'])->name('account');
Route::put('/edit_account', [UserController::class, 'updateProfile'])->name('edit.account');
Route::post('/addshippingaddress', [UserController::class, 'actionAddShippingAddress'])->name('add.shipping.address');
Route::put('/edit_shipping_address', [UserController::class, 'updateShippingAddress'])->name('edit.shipping.address');
Route::post('/delete_shipping_address', [UserController::class, 'deleteShippingAddress'])->name('delete.shipping.address');
Route::post('/set_main_address', [UserController::class, 'setMainAddress'])->name('main.shipping.address');
Route::post('/use_address', [UserController::class, 'useAddress'])->name('use.shipping.address');
Route::get('/get-active-tab', [UserController::class, 'getActiveTab'])->name('get.active.tab');
Route::post('/set-active-tab', [UserController::class, 'setActiveTab'])->name('set.active.tab');

Route::get('/get-total-cart', [UserController::class, 'getTotalCart'])->name('get.total.cart');

// FORM 
Route::post('/subscribe', [UserController::class, 'subscribe'])->name('subscribe');
Route::post('/send-question', [FormController::class, 'sendQuestion'])->name('send.question');
Route::post('/partnership', [FormController::class, 'files'])->name('partnership');

Route::get('/', [ProductController::class, 'index']);

Route::get('/shop', function () {
    return view('user.component.shop');
});

Route::get('/contact', function () {
    return view('user.component.contact');
});

Route::get('/about', function () {
    return view('user.component.about');
});

// DETAIL PRODUK
Route::get('/{id}_product', [ProductController::class, 'detail'])->name('detail.product');

// ADD TO CHART
Route::post('/chart', [UserController::class, 'addToChart'])->name('add.to.chart');

// ADD & REMOVE WISHLIST
Route::post('/whislist', [UserController::class, 'addToWhislist'])->name('add.to.whislist');
Route::post('/remove_wishlist', [UserController::class,'removeFromWishlist'])->name('remove.from.wishlist');

Route::get('/home', function () {
    return view('user.component.home');
});

Route::get('/help', function () {
    return view('user.component.help');
});

Route::get('/promo', function () {
    return view('user.component.promo');
});

Route::get('/detail-promo', function () {
    return view('user.component.detail-promo');
});

Route::get('/newsletter', function () {
    return view('user.component.newsletter');
});

Route::get('/blog', function () {
    return view('user.component.blog');
});

Route::get('/brand', function () {
    return view('user.component.brand');
});

Route::prefix('/cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);
});

Route::prefix('/checkout')->group(function () {
    Route::get('/', [CartController::class, 'checkout']);
});

Route::get('/partner', function () {
    return view('user.component.partner');
});

Route::get('/privacy', function () {
    return view('user.component.privacy');
});

Route::get('/terms', function () {
    return view('user.component.terms');
});
