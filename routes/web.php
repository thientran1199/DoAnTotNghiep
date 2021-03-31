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

Route::get('/welcome', function () {
    return view('welcome');
});

/*frontend --> /*/
Route::get('','PageController@getIndex');
/*liên hệ */
Route::get('contact','PageController@getContact');
/*tài khoản*/
Route::get('login','AccountController@getLoginCustomer');
Route::post('login','AccountController@postLoginCustomer');
Route::get('logout','AccountController@getLogoutCustomer');
/*đặt hàng*/
Route::get('order','OrderController@getAdd')->middleware('CheckLoginCustomer');
Route::post('order','OrderController@postAdd')->middleware('CheckLoginCustomer');
/*quản lý bên khách*/
Route::group(['prefix'=>'customer','middleware'=>'CheckLoginCustomer'],function(){
	Route::get('profile','CustomerController@getProfile');
	Route::post('profile','CustomerController@postProfile');
	Route::get('change-password','CustomerController@getChangePassword');
	Route::post('change-password','CustomerController@postChangePassword');
	Route::group(['prefix'=>'shipping-address'],function(){
		Route::get('list','CustomerShippingAddressController@getList');
		Route::get('add','CustomerShippingAddressController@getAdd');
		Route::post('add','CustomerShippingAddressController@postAdd');
		Route::get('edit/{id}','CustomerShippingAddressController@getEdit');
		Route::post('edit/{id}','CustomerShippingAddressController@postEdit');
		Route::get('delete/{id}','CustomerShippingAddressController@getDelete');
	});
	Route::group(['prefix'=>'order-history'],function(){
		Route::get('list','OrderController@getOrderHistory');
		Route::get('detail/{id}','OrderController@getDetailOrder');
		Route::post('detail/{id}','ReviewController@postReview');#đánh giá dùng modal nên url ko thay đổi dù id review dùng hidden
		Route::get('cancel/{id}','OrderController@getCancelOrder');#hủy đơn hàng nếu chưa giao
	});

});
/*signup*/
Route::get('signup','CustomerController@getSignup');
Route::post('signup','CustomerController@postSignup');

/*product nè*/
Route::get('product','ProductController@getListProduct');//danh sách sản phẩm theo danh mục thêm ?category=id hay các biến get khác
Route::get('product/detail/{id}','ProductController@getDetailProduct');
//Route::post('product/search','ProductController@postSearchProduct');

/*cart*/
/*mini-cart*/
Route::get('product/detail/addCartItem/{id}','CartController@addCartItem');
Route::get('product/detail/deleteCartItem/{id}','CartController@deleteCartItem');
Route::get('product/detail/updateCartItem/{id}/{quantity}','CartController@updateCartItem');
Route::get('addCartItem/{id}','CartController@addCartItem');
Route::get('deleteCartItem/{id}','CartController@deleteCartItem');
Route::get('updateCartItem/{id}/{quantity}','CartController@updateCartItem');
/*end mini-cart*/
Route::get('cart','CartController@getCartList');
Route::get('deleteCartList/{id}','CartController@deleteCartList');
Route::get('destroyCartList','CartController@destroyCartList');
Route::get('updateCartList/{id}/{quantity}','CartController@updateCartList');


/*backend --> /admin-page/ */
Route::get('admin-page/login', 'AccountController@getLoginAdmin');
Route::post('admin-page/login','AccountController@postLoginAdmin');
Route::get('admin-page/logout','AccountController@getLogoutAdmin');

Route::group(['prefix'=>'admin-page','middleware'=>'CheckLoginAdmin'],function(){
	Route::get('', 'PageController@getAdminPage');
	/*danh mục*/
    Route::group(['prefix'=>'category'],function(){
		Route::get('list', 'CategoryController@getList');
		Route::get('add', 'CategoryController@getAdd');
		Route::post('add', 'CategoryController@postAdd');
		Route::get('edit/{id}', 'CategoryController@getEdit');
		Route::post('edit/{id}', 'CategoryController@postEdit');
		Route::get('delete/{id}', 'CategoryController@getDelete');
	});
	/*sản phẩm*/
	Route::group(['prefix'=>'product'],function(){
		Route::get('list', 'ProductController@getList');
		Route::get('add', 'ProductController@getAdd');
		Route::post('add', 'ProductController@postAdd');
		Route::get('edit/{id}', 'ProductController@getEdit');
		Route::post('edit/{id}', 'ProductController@postEdit');
		Route::get('delete/{id}', 'ProductController@getDelete');
	});
	#slide
	Route::group(['prefix'=>'slide'],function(){
		Route::get('list', 'SlideController@getList');
		Route::get('add', 'SlideController@getAdd');
		Route::post('add', 'SlideController@postAdd');
		Route::get('edit/{id}', 'SlideController@getEdit');
		Route::post('edit/{id}', 'SlideController@postEdit');
		Route::get('delete/{id}', 'SlideController@getDelete');
	});
	#order
	Route::group(['prefix'=>'order'],function(){
		Route::get('list', 'OrderController@getList');
		Route::get('detail/{id}', 'OrderController@getDetail');
		Route::post('detail/{id}', 'OrderController@postStatus');
	});
	#review
	Route::group(['prefix'=>'review'],function(){
		Route::get('list', 'ReviewController@getList');
	});
	#customer
	Route::group(['prefix'=>'customer'],function(){
		Route::get('list', 'CustomerController@getList');
		Route::get('detail/{id}', 'CustomerController@getDetail');
		Route::post('detail/{id}', 'CustomerController@postType');
		Route::get('delete/{id}', 'CustomerController@getDelete');
	});
	#admin
	Route::group(['prefix'=>'admin'],function(){
		Route::get('list', 'AdminController@getList');
		Route::get('add', 'AdminController@getAdd');
		Route::post('add', 'AdminController@postAdd');
		Route::get('edit/{id}', 'AdminController@getEdit');
		Route::post('edit/{id}', 'AdminController@postEdit');
		Route::get('delete/{id}', 'AdminController@getDelete');
	});
});
