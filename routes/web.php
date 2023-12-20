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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/shop', 'HomeController@shop')->name('shop.index');
Route::get('/product/{product}', 'HomeController@product')->name('home.product');
Route::get('/category/{category}', 'HomeController@category')->name('home.category');

Route::get('/register', 'CustomerController@register')->name('home.register');
Route::post('/register', 'CustomerController@check_register');
Route::get('/login', 'CustomerController@login')->name('home.login');
Route::post('/login', 'CustomerController@check_login');
Route::get('/logout', 'CustomerController@logout')->name('home.logout');

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@post_contact')->name('contact');

Route::get('/admin/register', 'AdminController@register')->name('admin.register');
Route::post('/admin/register', 'AdminController@check_register');
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@check_login');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/', "AdminController@dashboard")->name('admin.dashboard');
    Route::get('/file', "AdminController@file")->name('admin.file');

    Route::resources([
        'category'=> 'CategoryController',
        'product'=> 'ProductController',
        'account'=> 'AccountController',
        'blog'=> 'BlogController',
        'banner'=> 'BannerController',
        'order'=> 'OrderController'
    ]);
});

Route::group(['prefix'=>'cart'], function(){
    Route::get('/view-cart', "CartController@view")->name('cart.view');
    Route::get('/add/{product}', "CartController@addToCart")->name('cart.add');
    Route::get('/delete/{id}', "CartController@deleteCart")->name('cart.delete');
    Route::get('/update/{id}', "CartController@updateCart")->name('cart.update');
    Route::get('/clear', "CartController@clearCart")->name('cart.clear');
});

Route::group(['prefix'=>'checkout'], function(){
    Route::get('/', "CheckoutController@form_checkout")->name('checkout');
    Route::post('/', "CheckoutController@submit_form")->name('checkout');
    Route::get('/checkout-success', "CheckoutController@success")->name('checkout.success');
});

