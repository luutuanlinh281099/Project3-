<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('send-mail', 'CheckoutController@testSendMail');

// BACKEND
//  đăng nhập vào hệ thống admin
Route::get('/adminlogin', [
    'as' => 'admin.login',
    'uses' => 'AdminController@getLoginAdmin',
]);
Route::post('/adminlogin', [
    'as' => 'admin.post-login',
    'uses' => 'AdminController@postLoginAdmin',
]);
Route::get('/adminlogout', [
    'as' => 'admin.logout',
    'uses' => 'AdminController@logout',
]);
Route::get('/adminhome', [
    'as' => 'admin.home',
    'uses' => 'AdminController@adminhome',
]);
Route::post('/adminsearch', [
    'as' => 'admin.search',
    'uses' => 'AdminController@search',
]);

// Danh mục
Route::prefix('category')->group(function () {
    Route::get('/index', [
        'as' => 'category.index',
        'uses' => 'AdminCategoryController@index',
        'middleware' => 'can:category',
    ]);
    Route::get('/create', [
        'as' => 'category.create',
        'uses' => 'AdminCategoryController@create',
        'middleware' => 'can:category',
    ]);
    Route::post('/store', [
        'as' => 'category.store',
        'uses' => 'AdminCategoryController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'category.edit',
        'uses' => 'AdminCategoryController@edit',
        'middleware' => 'can:category',
    ]);
    Route::post('/update/{id}', [
        'as' => 'category.update',
        'uses' => 'AdminCategoryController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'category.delete',
        'uses' => 'AdminCategoryController@delete',
    ]);
});

// Thương hiệu
Route::prefix('brand')->group(function () {
    Route::get('/index', [
        'as' => 'brand.index',
        'uses' => 'AdminBrandController@index',
        'middleware' => 'can:brand',
    ]);
    Route::get('/create', [
        'as' => 'brand.create',
        'uses' => 'AdminBrandController@create',
        'middleware' => 'can:brand',
    ]);
    Route::post('/store', [
        'as' => 'brand.store',
        'uses' => 'AdminBrandController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'brand.edit',
        'uses' => 'AdminBrandController@edit',
        'middleware' => 'can:brand',
    ]);
    Route::post('/update/{id}', [
        'as' => 'brand.update',
        'uses' => 'AdminBrandController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'brand.delete',
        'uses' => 'AdminBrandController@delete',
    ]);
});

// Menu
Route::prefix('menu')->group(function () {
    Route::get('/index', [
        'as' => 'menu.index',
        'uses' => 'AdminMenuController@index',
        'middleware' => 'can:menu',
    ]);
    Route::get('/create', [
        'as' => 'menu.create',
        'uses' => 'AdminMenuController@create',
        'middleware' => 'can:menu',
    ]);
    Route::post('/store', [
        'as' => 'menu.store',
        'uses' => 'AdminMenuController@store',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'menu.edit',
        'uses' => 'AdminMenuController@edit',
        'middleware' => 'can:menu',
    ]);
    Route::post('/update/{id}', [
        'as' => 'menu.update',
        'uses' => 'AdminMenuController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'menu.delete',
        'uses' => 'AdminMenuController@delete',
    ]);
});

// Slider
Route::prefix('slider')->group(function () {
    Route::get('/index', [
        'as' => 'slider.index',
        'uses' => 'AdminSliderController@index',
        'middleware' => 'can:slider',
    ]);
    Route::get('/create', [
        'as' => 'slider.create',
        'uses' => 'AdminSliderController@create',
        'middleware' => 'can:slider',
    ]);
    Route::post('/store', [
        'as' => 'slider.store',
        'uses' => 'AdminSliderController@store',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'slider.edit',
        'uses' => 'AdminSliderController@edit',
        'middleware' => 'can:slider',
    ]);
    Route::post('/update/{id}', [
        'as' => 'slider.update',
        'uses' => 'AdminSliderController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'slider.delete',
        'uses' => 'AdminSliderController@delete',
    ]);
});

// Sản phẩm
Route::prefix('product')->group(function () {
    Route::get('/index', [
        'as' => 'product.index',
        'uses' => 'AdminProductController@index',
        'middleware' => 'can:product',
    ]);
    Route::get('/create', [
        'as' => 'product.create',
        'uses' => 'AdminProductController@create',
        'middleware' => 'can:product',
    ]);
    Route::post('/store', [
        'as' => 'product.store',
        'uses' => 'AdminProductController@store',
    ]);
    Route::post('/search', [
        'as' => 'product.search',
        'uses' => 'AdminProductController@search',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'product.edit',
        'uses' => 'AdminProductController@edit',
        'middleware' => 'can:product',
    ]);
    Route::post('/update/{id}', [
        'as' => 'product.update',
        'uses' => 'AdminProductController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'product.delete',
        'uses' => 'AdminProductController@delete',
    ]);
});

// Settings
Route::prefix('setting')->group(function () {
    Route::get('/index', [
        'as' => 'setting.index',
        'uses' => 'AdminSettingController@index',
        'middleware' => 'can:setting',
    ]);
    Route::get('/create', [
        'as' => 'setting.create',
        'uses' => 'AdminSettingController@create',
        'middleware' => 'can:setting',
    ]);
    Route::post('/store', [
        'as' => 'setting.store',
        'uses' => 'AdminSettingController@store',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'setting.edit',
        'uses' => 'AdminSettingController@edit',
        'middleware' => 'can:setting',
    ]);
    Route::post('/update/{id}', [
        'as' => 'setting.update',
        'uses' => 'AdminSettingController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'setting.delete',
        'uses' => 'AdminSettingController@delete',
    ]);
});

// Thành viên
Route::prefix('user')->group(function () {
    Route::get('/index', [
        'as' => 'user.index',
        'uses' => 'AdminUserController@index',
        'middleware' => 'can:user',
    ]);
    Route::get('/create', [
        'as' => 'user.create',
        'uses' => 'AdminUserController@create',
        'middleware' => 'can:user',
    ]);
    Route::post('/store', [
        'as' => 'user.store',
        'uses' => 'AdminUserController@store',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'user.edit',
        'uses' => 'AdminUserController@edit',
        'middleware' => 'can:user',
    ]);
    Route::post('/update/{id}', [
        'as' => 'user.update',
        'uses' => 'AdminUserController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'user.delete',
        'uses' => 'AdminUserController@delete',
    ]);
});

// Vai trò
Route::prefix('role')->group(function () {
    Route::get('/index', [
        'as' => 'role.index',
        'uses' => 'AdminRoleController@index',
        'middleware' => 'can:role',
    ]);
    Route::get('/create', [
        'as' => 'role.create',
        'uses' => 'AdminRoleController@create',
        'middleware' => 'can:role',
    ]);
    Route::post('/store', [
        'as' => 'role.store',
        'uses' => 'AdminRoleController@store',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'role.edit',
        'uses' => 'AdminRoleController@edit',
        'middleware' => 'can:role',
    ]);
    Route::post('/update/{id}', [
        'as' => 'role.update',
        'uses' => 'AdminRoleController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'role.delete',
        'uses' => 'AdminRoleController@delete',
    ]);
});

//  Đơn hàng
Route::prefix('order')->group(function () {
    Route::get('/index', [
        'as' => 'order.index',
        'uses' => 'AdminOrderController@index',
        'middleware' => 'can:order',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'order.edit',
        'uses' => 'AdminOrderController@edit',
        'middleware' => 'can:order',
    ]);
    Route::post('/update/{id}', [
        'as' => 'order.update',
        'uses' => 'AdminOrderController@update',
    ]);
    Route::get('/detail/{id}', [
        'as' => 'order.detail',
        'uses' => 'AdminOrderController@detail',
        'middleware' => 'can:order',
    ]);
    Route::post('/search', [
        'as' => 'order.search',
        'uses' => 'AdminOrderController@search',
    ]);
    Route::get('/unconfimred', [
        'as' => 'order.unconfimred',
        'uses' => 'AdminOrderController@unconfimred',
    ]);
    Route::get('/shipping', [
        'as' => 'order.shipping',
        'uses' => 'AdminOrderController@shipping',
    ]);
    Route::get('/delivered', [
        'as' => 'order.delivered',
        'uses' => 'AdminOrderController@delivered',
    ]);
});

//  vận chuyển
Route::prefix('ship')->group(function () {
    Route::get('/index', [
        'as' => 'ship.index',
        'uses' => 'AdminShipController@index',
        'middleware' => 'can:ship',
    ]);
    Route::get('/create', [
        'as' => 'ship.create',
        'uses' => 'AdminShipController@create',
        'middleware' => 'can:ship',
    ]);
    Route::post('/store', [
        'as' => 'ship.store',
        'uses' => 'AdminShipController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'ship.edit',
        'uses' => 'AdminShipController@edit',
        'middleware' => 'can:ship',
    ]);
    Route::post('/update/{id}', [
        'as' => 'ship.update',
        'uses' => 'AdminShipController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'ship.delete',
        'uses' => 'AdminShipController@delete',
    ]);
});

//  tin tức
Route::prefix('new')->group(function () {
    Route::get('/index', [
        'as' => 'new.index',
        'uses' => 'AdminNewController@index',
        'middleware' => 'can:new',
    ]);
    Route::get('/create', [
        'as' => 'new.create',
        'uses' => 'AdminNewController@create',
        'middleware' => 'can:new',
    ]);
    Route::post('/store', [
        'as' => 'new.store',
        'uses' => 'AdminNewController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'new.edit',
        'uses' => 'AdminNewController@edit',
        'middleware' => 'can:new',
    ]);
    Route::post('/update/{id}', [
        'as' => 'new.update',
        'uses' => 'AdminNewController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'new.delete',
        'uses' => 'AdminNewController@delete',
    ]);
});

//  quyền
Route::prefix('permissions')->group(function () {
    Route::get('/create', [
        'as' => 'permission.create',
        'uses' => 'AdminPermissionController@create',
    ]);
    Route::post('/store', [
        'as' => 'permission.store',
        'uses' => 'AdminPermissionController@store',
    ]);
});


//  FRONTEND
Route::get('/pagehome', [
    'as' => 'page.home',
    'uses' => 'HomePageController@index',
]);

Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'CategoryController@product',
]);

Route::get('/brand/{slug}/{id}', [
    'as' => 'brand.product',
    'uses' => 'BrandController@product',
]);

Route::get('/detail/{id}', [
    'as' => 'product.detail',
    'uses' => 'ProductController@detail',
]);

Route::post('/search', [
    'as' => 'page.search',
    'uses' => 'HomePageController@search',
]);

Route::get('/all', [
    'as' => 'product.all',
    'uses' => 'ProductController@allProduct',
]);

Route::get('/show/{id}', [
    'as' => 'order.show',
    'uses' => 'OrderController@show',
]);

Route::prefix('cart')->group(function () {
    Route::get('/index', [
        'as' => 'cart.index',
        'uses' => 'CartController@index',
    ]);
    Route::get('/add/{id}', [
        'as' => 'cart.add',
        'uses' => 'CartController@add',
    ]);
    Route::get('/addfast/{id}', [
        'as' => 'cart.addfast',
        'uses' => 'CartController@addFast',
    ]);
    Route::post('/update', [
        'as' => 'cart.update',
        'uses' => 'CartController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'cart.delete',
        'uses' => 'CartController@delete',
    ]);
});

Route::prefix('customer')->group(function () {
    Route::get('/login', [
        'as' => 'customer.login',
        'uses' => 'CustomerController@getLoginCustomer',
    ]);
    Route::post('/login', [
        'as' => 'customer.post-login',
        'uses' => 'CustomerController@postLoginCustomer'
    ]);
    Route::get('/logout', [
        'as' => 'customer.logout',
        'uses' => 'CustomerController@logout',
    ]);
    Route::get('/signin', [
        'as' => 'customer.home',
        'uses' => 'CustomerController@pagehome',
    ]);
    Route::post('/signup', [
        'as' => 'customer.add',
        'uses' => 'CustomerController@add',
    ]);
    Route::get('/show/{id}', [
        'as' => 'customer.show',
        'uses' => 'CustomerController@show',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'customer.edit',
        'uses' => 'CustomerController@edit',
    ]);
    Route::post('/update/{id}', [
        'as' => 'customer.update',
        'uses' => 'CustomerController@update',
    ]);
    Route::get('/detail/{id}', [
        'as' => 'customer.detail',
        'uses' => 'CustomerController@detail',
    ]);
});

Route::prefix('checkout')->group(function () {
    Route::get('/show', [
        'as' => 'checkout.show',
        'uses' => 'CheckoutController@show',
    ]);
    Route::get('/info', [
        'as' => 'checkout.info',
        'uses' => 'CheckoutController@info',
    ]);
    Route::post('/add', [
        'as' => 'checkout.add',
        'uses' => 'CheckoutController@add',
    ]);

    Route::get('/order/{id}', [
        'as' => 'checkout.order',
        'uses' => 'CheckoutController@order',
    ]);
    Route::get('/mail', [
        'as' => 'checkout.mail',
        'uses' => 'CheckoutController@mail',
    ]);
    Route::get('/thank', [
        'as' => 'checkout.thank',
        'uses' => 'CheckoutController@thank',
    ]);
});

Route::prefix('new')->group(function () {
    Route::get('/all', [
        'as' => 'new.all',
        'uses' => 'NewController@all',
    ]);
    Route::get('/detail/{id}', [
        'as' => 'new.detail',
        'uses' => 'NewController@detail',
    ]);
});
