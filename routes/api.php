<?php

use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

	Route::group(['namespace' => 'Api\OTP'], function(){
		Route::resource('phone', 'NewPhoneNumberController');
		Route::resource('phone-reset-otp', 'NewPhoneNumberResendOtpController');
		Route::resource('forgot-password-phone', 'ForgotPasswordPhoneNumberController');
		Route::resource('forgot-password-phone-resend-otp', 'ForgotPasswordResendOtpController');
		Route::resource('reset-phone', 'ResetPhoneNumberController');
		Route::resource('reset-phone-resend-otp', 'ResetPhoneNumberResendOtpController');
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
		Route::resource('local-diapatch', 'LocalDispatchController');
		Route::resource('mobile-transaction', 'MobileTransactionController');
		Route::resource('request-van', 'RequestVanController');
	});

	Route::group(['namespace' => 'Api\Address'], function(){
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

	Route::group(['namespace' => 'Api\Order'], function(){
		Route::resource('orders', 'OrderController');
	});

	Route::group(['namespace' => 'Api\Rydecoin'], function(){
		Route::resource('rydecoins', 'RydecoinController');
	});

	Route::group(['namespace' => 'Api\Rate'], function(){
		Route::resource('service-rate', 'ServiceRateController');
	});

	Route::group(['namespace' => 'Api\Rate'], function(){
		Route::resource('vehicles', 'VehicleController');
	});
	
	Route::group(['namespace' => 'Api\Address'], function(){
		Route::resource('addresses', 'AddressController');
	});
});	