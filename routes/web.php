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

//========Main Loading============
Route::get('/', 'LandingController@get_data');
Route::get('/guestdashboard',function(){
	return view('guest.guestlanding');
});

//========Auth Login Register============
Route::get('/registertemp',function(){
	return view('layouts.guestregister');
});
Route::get('/logintemp',function(){
	return view('layouts.guestlogin');
});
Route::post('/registerguest', 'RegisterController@add_guest');
Route::post('/loginguest', 'LoginController@login_guest');
Route::get('logoutguest', 'LogoutController@logout_guest');

//========Landing Page============
Route::get('/detailitem/{id_item}', 'DetailItemController@get_detail_item');


//========Guest Dashboard============
//Guest cart
Route::get('/guestcart','CartController@get_cart');
Route::post('/addcart', 'CartController@add_cart');
//Guest Checkout
Route::get('/checkout','CartController@checkout');
Route::get('/checkouttemp/{no_checkout}','BillController@get_bill');
//Guest List Transaction
Route::get('/listtransactiontemp', 'PaymentController@get_list_transaction');
//=====Guest Payment Method=====
//Receipt Payment
Route::get('/receiptpayment/{no_checkout}', 'PaymentController@receipt_payment');
Route::post('/acceptreceiptpayment/{no_checkout}', 'PaymentController@accept_receipt_payment');
Route::get('/changepayment/{no_checkout}','PaymentController@change_payment');
//Outlet Payment
Route::get('/outletpayment/{no_checkout}', 'PaymentController@outlet_payment');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
