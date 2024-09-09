<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartofAccountController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
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

Route::get('/login', [AuthenticateController::class, 'indexlogin'])->name('index-login');


// product
Route::get('/product-admin', [ProductController::class, 'indexProductAdmin'])->name('index-product-admin');
Route::get('/create-product', [ProductController::class, 'createProductAdmin'])->name('create-product-admin');
Route::post('/store-product', [ProductController::class, 'storeProductAdmin'])->name('store-product-admin');
Route::get('/detail-product-admin/{id}', [ProductController::class, 'detailProductAdmin'])->name('detail-product-admin');
Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProductAdmin'])->name('delete-product-admin');

Route::get('/search-products', [ProductController::class, 'searchProducts']);


// category product
Route::get('/category-product', [CategoryController::class, 'indexCategoryProduct'])->name('index-category-product');
Route::post('/create-category-product', [CategoryController::class, 'createCategoryProduct'])->name('create-category-product');
Route::delete('/category-product/{id}', [CategoryController::class, 'deleteCategoryProduct'])->name('delete-category-product');


// order
Route::get('/order-list', function () {
    return view('admin.order.index');
});

Route::get('/order-detail', function () {
    return view('admin.order.detail');
});


// brand
Route::get('/brand-admin', [BrandController::class, 'indexbrand'])->name('index-brand-admin');
Route::get('/create-brand', [BrandController::class, 'createBrand'])->name('create-brand-admin');
Route::post('/store-brand', [BrandController::class, 'storeBrand'])->name('store-brand-admin');
Route::get('/detail-brand/{id}', [BrandController::class, 'detailBrand'])->name('detail-brand-admin');
Route::delete('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete-brand-admin');
Route::get('/search-brands', [BrandController::class, 'searchBrands']);


// ARTICLE
Route::get('/article-admin', [ArticleController::class, 'indexArticleAdmin'])->name('index-article');
Route::get('/create-article-admin', [ArticleController::class, 'createArticle'])->name('create-article');
Route::post('/create-article-admin', [ArticleController::class, 'storeArticle'])->name('store-article');
Route::get('/edit-article-admin', [ArticleController::class, 'editArticle'])->name('edit-article');
Route::post('/edit-article-admin', [ArticleController::class, 'updateArticle'])->name('update-article');
Route::delete('/article-admin/{id}', [ArticleController::class, 'deleteArticle'])->name('delete-article');


// category article
Route::get('/category-article', [CategoryController::class, 'indexCategoryArticle'])->name('index-category-article');
Route::post('/create-category-article', [CategoryController::class, 'createCategoryArticle'])->name('create-category-article');
Route::delete('/category-article/{id}', [CategoryController::class, 'deleteCategoryArticle'])->name('delete-category-article');



// user detail
Route::get('/user', function () {
    return view('admin.user.index');
});

Route::get('/user-detail', function () {
    return view('admin.user.detail');
});


// shipping fee
Route::get('/shipping-fee', function () {
    return view('admin.shippingfee.index');
});
Route::get('/create-shipping-fee', function () {
    return view('admin.shippingfee.create');
});


// PROMO
Route::get('/promo', [PromoController::class, 'indexPromo'])->name('index-promo');
Route::get('/create-promo', [PromoController::class, 'createPromo'])->name('create-promo');
Route::post('/create-promo', [PromoController::class, 'storePromo'])->name('store-promo');

Route::get('/promo-voucher', [PromoController::class, 'createPromoVoucher'])->name('create-promo-voucher');
Route::post('/create-promo-voucher', [PromoController::class, 'storePromoVoucher'])->name('store-promo-voucher');

Route::get('/promo-ongkir', [PromoController::class, 'createPromoOngkir'])->name('create-promo-ongkir');
Route::post('/create-promo-ongkir', [PromoController::class, 'storePromoOngkir'])->name('store-promo-ongkir');


// AFFILIATE
Route::get('/affiliate-admin', function () {
    return view('admin.affiliate.index');
});


// ACCOUNTING
// COA
Route::get('/coa', [ChartofAccountController::class, 'indexChartofAccount'])->name('index-chartofaccount');
Route::get('/create-coa', [ChartofAccountController::class, 'createChartofAccount'])->name('create-chartofaccount');
Route::post('/create-coa', [ChartofAccountController::class, 'storeChartofAccount'])->name('store-chartofaccount');
Route::get('/edit-coa', [ChartofAccountController::class, 'editChartofAccount'])->name('edit-chartofaccount');
Route::post('/edit-coa', [ChartofAccountController::class, 'updateChartofAccount'])->name('update-chartofaccount');
Route::delete('/coa/{id}', [ChartofAccountController::class, 'deleteChartofAccount'])->name('delete-chartofaccount');

Route::get('/category-coa', [ChartofAccountController::class, 'indexCategoryChartofAccount'])->name('index-category-chartofaccount');

// INVOICE
Route::get('/invoice', [InvoiceController::class, 'indexInvoice'])->name('index-invoice');

Route::get('/create-invoice', [InvoiceController::class, 'createInvoice'])->name('create-invoice');
Route::post('/create-invoice', [InvoiceController::class, 'storeInvoice'])->name('store-invoice');

Route::get('/edit-invoice', [InvoiceController::class, 'editInvoice'])->name('edit-invoice');
Route::post('/edit-invoice', [InvoiceController::class, 'updateInvoice'])->name('update-invoice');

Route::delete('/invoice/{id}', [InvoiceController::class, 'deleteInvoice'])->name('delete-invoice');


// TRANSACTION



