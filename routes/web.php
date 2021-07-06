<?php

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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
//admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/dashboard','AdminController@dashboard');
Route::get('/create-admin', 'AdminController@create');
Route::post('/create-admin', 'AdminController@store');
Route::get('/logout-admin', 'AdminController@logout');
Route::get('/list-user','AdminController@list_user');
//Home
Route::get('/index','HomeController@index');
Route::get('/category/{id}','HomeController@category');
Route::post('/search','HomeController@search');
//Category
Route::get('category','CategoryController@create');
Route::post('/addCategory','CategoryController@store')->name('add-category');
Route::get('/all-category','CategoryController@index');
Route::get('/edit-category/{id}','CategoryController@edit');
Route::post('/update-category/{id}','CategoryController@update');
Route::get('/delete-category/{id}','CategoryController@delete');
//Products
Route::get('/product','ProductController@create');
Route::post('/addProduct','ProductController@store')->name('add-product');
Route::get('/all-product','ProductController@index');
Route::get('/list-product/{id}','ProductController@list');
Route::get('/edit-product/{id}','ProductController@edit');
Route::post('/update-product/{id}','ProductController@update');
Route::get('/delete-product/{id}','ProductController@delete');
//Slide
Route::get('slide','SlideController@create');
Route::post('/add-slide','SlideController@store');
Route::get('/all-slide','SlideController@index');
Route::get('/delete-slide/{id}','SlideController@delete');
//Cart
Route::post('/cart/{id}', 'CartController@add')->name('cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-cart/{rowId}','CartController@delete_cart');
Route::post('/update-cart/','CartController@update_cart');
Route::post('/add-cart-ajax/','CartController@add_cart_ajax');
Route::get('/cart/','CartController@show_cart_ajax');
Route::get('/delete-cart-ajax/{id}','CartController@delete_cart_ajax');



//Checkout
Route::get('/check-out','CheckoutController@checkout');
Route::post('/save-info-customer','CheckoutController@info_customer');
Route::post('/adress','CheckoutController@adress');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_code}','CheckoutController@order_detail');
Route::post('/update-order-status','CheckoutController@update_status');
Route::get('/delete-order/{order_id}','CheckoutController@delete');
Route::get('/manage-warehouse','CheckoutController@manage_warehouse');


//User
Route::get('/sign-up','CheckoutController@create');
Route::post('/sign-up','CheckoutController@store');
Route::get('/login','CheckoutController@getLogin');
Route::post('/login','CheckoutController@postLogin');

Route::get('logout','CheckoutController@logout');