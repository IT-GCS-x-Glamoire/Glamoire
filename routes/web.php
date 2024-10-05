<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartofAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PromoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscribeController;

Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
Route::post('/register', [AuthController::class, 'register'])->name('register.user');
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


// ADMIN PAGE
Route::get('/error-403', function () {
    return view('error-403');
})->name('error-403');


Route::get('/login', [AuthenticateController::class, 'indexlogin'])->name('index-login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthenticateController::class, 'forgotPassword'])->name('index-forgotpassword');

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('dashboard');

Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::get('/dashboard/get-sales-data', [DashboardController::class, 'getSalesData']);

    // product
    Route::get('/product-admin', [ProductController::class, 'indexProductAdmin'])->name('index-product-admin');
    Route::get('/create-product', [ProductController::class, 'createProductAdmin'])->name('create-product-admin');
    Route::post('/store-product', [ProductController::class, 'storeProductAdmin'])->name('store-product-admin');
    Route::get('/edit-product-admin/{id}', [ProductController::class, 'editProductAdmin'])->name('edit-product-admin');
    Route::put('/update/product/{id}', [ProductController::class, 'updateProductAdmin'])->name('update-product-admin');
    Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProductAdmin'])->name('delete-product-admin');
    Route::get('/detail-product-admin/{id}', [ProductController::class, 'detailProductAdmin'])->name('detail-product-admin');

    // product-variant
    Route::get('/product-admin-variant', [ProductController::class, 'indexProductVariantAdmin'])->name('index-product-variant-admin');
    Route::get('/create-product-variant', [ProductController::class, 'createProductVariantAdmin'])->name('create-product-variant-admin');
    Route::post('/store-product-variant', [ProductController::class, 'storeProductVariantAdmin'])->name('store-product-variant-admin');
    Route::get('/edit-product-variant/{id}', [ProductController::class, 'editProductVariantAdmin'])->name('edit-product-variant-admin');
    Route::put('/update/product-variant/{id}', [ProductController::class, 'updateProductVariantAdmin'])->name('update-product-variant-admin');

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
    Route::put('/update/brand/{id}', [BrandController::class, 'updateBrandAdmin'])->name('update-brand-admin');
    Route::delete('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete-brand-admin');
    Route::get('/search-brands', [BrandController::class, 'searchBrands']);

    // ARTICLE
    Route::get('/article-admin', [ArticleController::class, 'indexArticleAdmin'])->name('index-article');
    Route::get('/create-article-admin', [ArticleController::class, 'createArticle'])->name('create-article');
    Route::post('/create-article-admin', [ArticleController::class, 'storeArticle'])->name('store-article');
    Route::get('/edit-article-admin', [ArticleController::class, 'editArticle'])->name('edit-article');
    Route::post('/edit-article-admin', [ArticleController::class, 'updateArticle'])->name('update-article');
    Route::get('/review-article-admin/{id}', [ArticleController::class, 'reviewArticle'])->name('review-article');
    Route::delete('/article-admin/{id}', [ArticleController::class, 'deleteArticle'])->name('delete-article');

    // category article
    Route::get('/category-article', [CategoryController::class, 'indexCategoryArticle'])->name('index-category-article');
    Route::post('/create-category-article', [CategoryController::class, 'createCategoryArticle'])->name('create-category-article');
    Route::delete('/category-article/{id}', [CategoryController::class, 'deleteCategoryArticle'])->name('delete-category-article');

    // PROMO
    Route::get('/promo', [PromoController::class, 'indexPromo'])->name('index-promo');
    Route::get('/create-promo', [PromoController::class, 'createPromo'])->name('create-promo');
    Route::post('/create-promo', [PromoController::class, 'storePromo'])->name('store-promo');

    Route::get('/promo-voucher', [PromoController::class, 'indexPromoVoucher'])->name('index-promo-voucher');
    Route::get('/create-promo-voucher', [PromoController::class, 'createPromoVoucher'])->name('create-promo-voucher');
    Route::post('/create-promo-voucher', [PromoController::class, 'storePromoVoucher'])->name('store-promo-voucher');
    
    Route::get('/promo-ongkir', [PromoController::class, 'indexPromoOngkir'])->name('index-promo-ongkir');
    Route::get('/create-promo-ongkir', [PromoController::class, 'createPromoOngkir'])->name('create-promo-ongkir');
    Route::post('/create-promo-ongkir', [PromoController::class, 'storePromoOngkir'])->name('store-promo-ongkir');
    
    Route::get('/promo-diskon', [PromoController::class, 'indexPromoDiskon'])->name('index-promo-diskon');
    Route::get('/create-promo-diskon', [PromoController::class, 'createPromoDiskon'])->name('create-promo-diskon');
    Route::post('/create-promo-diskon', [PromoController::class, 'storePromoDiskon'])->name('store-promo-diskon');
    
    Route::get('/detail-promo/{id}', [PromoController::class, 'detailPromo'])->name('detail-promo');
    Route::put('/update/promo/{id}', [PromoController::class, 'updatePromo'])->name('update-promo');
    
    Route::delete('/delete-promo/{id}', [PromoController::class, 'deletePromo'])->name('delete-promo');

    // AFFILIATE
    Route::get('/affiliate-admin', [AffiliateController::class, 'indexAffiliateAdmin'])->name('index-affiliate-admin');
    Route::get('/detail-affiliate-admin/{id}', [AffiliateController::class, 'detailAffiliateAdmin'])->name('detail-affiliate-admin');

    Route::get('/chat-admin', function () {
        return view('admin.chat.index');
    });

    // user detail
    Route::get('/user-admin', [UserController::class, 'indexUserAdmin'])->name('index-user-admin');
    Route::get('/user-admin-detail', [UserController::class, 'detailUserAdmin'])->name('detail-user-admin');

    // shipping fee
    Route::get('/shipping-fee', function () {
        return view('admin.shippingfee.index');
    });

    Route::get('/create-shipping-fee', function () {
        return view('admin.shippingfee.create');
    });
    
    Route::get('/contact-us-admin', [ContactusController::class, 'indexContactusAdmin'])->name('index-contactus-admin');
    Route::get('/contact-us-admin/{id}', [ContactusController::class, 'showContactusAdmin'])->name('show-contactus-admin');

    Route::get('/subscribe-admin', [SubscribeController::class, 'indexSubscribeAdmin'])->name('index-subscribe-admin');


});


Route::middleware(['auth', 'role:accounting,superadmin'])->group(function () {
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
});
