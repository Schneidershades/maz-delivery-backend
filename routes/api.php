<?php

use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

	Route::group(['namespace' => 'Api\OTP'], function(){
		Route::resource('phone', 'NewPhoneNumberController');
		Route::resource('verify-otp', 'VerifyOtpController');
	});

	Route::group(['prefix' => 'user', 'namespace' => 'Api\User'], function(){
		Route::post('register', 'UserController@register');
    	Route::post('login', 'UserController@login');
    	Route::post('logout', 'UserController@logout');
        Route::get('profile', 'UserController@show');
        Route::put('update', 'UserController@update');
	});

	Route::group(['namespace' => 'Api\Service'], function(){
		Route::resource('errand', 'ErrandController');
		Route::resource('inventory', 'InventoryController');
		Route::resource('local-dispatch', 'LocalDispatchController');
		Route::resource('mobile-transaction', 'MobileTransactionController');
		Route::resource('request-van', 'RequestVanController');
	});

	Route::group(['namespace' => 'Api\Address', 'middleware' => 'auth:api'], function(){
		Route::resource('addresses', 'AddressController');
	});

	Route::group(['namespace' => 'Api\Bank'], function(){
		Route::resource('banks', 'BankController');
		Route::resource('bank-details', 'BankController');
	});

	Route::group(['namespace' => 'Api\Category'], function(){
		Route::resource('categories', 'CategoryController');
	});

	Route::group(['prefix' => 'location', 'namespace' => 'Api\Location'], function(){
		Route::resource('countries', 'CountryController');
		Route::resource('state', 'StateController');
		Route::resource('city', 'CityController');
	});

	Route::group(['namespace' => 'Api\Order', 'middleware' => 'auth:api'], function(){
		Route::resource('orders', 'OrderController');
	});

	Route::group(['namespace' => 'Api\Rydecoin'], function(){
		Route::resource('rydecoin-package', 'RydecoinPackageController');
	});

	Route::group(['namespace' => 'Api\Rate'], function(){
		Route::resource('service-rate', 'ServiceRateController');
	});

	Route::group(['namespace' => 'Api\Vehicle'], function(){
		Route::resource('vehicles', 'VehicleController');
	});
});	