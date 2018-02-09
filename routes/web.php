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

//Route::get('/', 'SiteController@index') {
//    return view('home');
//});
Route::get('/home', 'SiteController@index');

Auth::routes();
  Route::get('/', 'SiteController@index');
  Route::get('/about', 'SiteController@about');
  Route::get('/account', 'SiteController@account');
  Route::get('/orders', 'SiteController@orders');
  Route::get('/cart', 'SiteController@cart');
  Route::get('/cart/remove/{id}', 'SiteController@cart_remove');
  Route::get('checkout', 'SiteController@checkout')->middleware('auth');
  Route::get('/category/{category}', 'SiteController@category');
  Route::get('/logout' , 'Auth\LoginController@logout');

  Route::post('/register_new', 'SiteController@register_new');

  Route::get('/details/{id}/{slug}', 'SiteController@details');
  Route::post('/details/{id}/{slug}/add', 'SiteController@shopcart_add');
  
  Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
  });

Route::group(['prefix' => 'admin'], function(){
	Route::resource('users', 'UserController');
	Route::resource('categories', 'CategoryController');
	Route::resource('brands', 'BrandController');
	Route::resource('products', 'ProductController');
	Route::resource('tags', 'TagController');
	Route::resource('coupons', 'CouponController');
	Route::resource('orders', 'OrderController');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'cache cleared';
});