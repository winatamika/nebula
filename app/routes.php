<?php

Route::resource('sessions', 'SessionsController');
 
// Authenticated Group
Route::group(array('before' => 'auth'), function() {

	Route::get('admin', ['as' => 'admin', function()
	{
		return View::make('admin');
	}]);
 
	// logout
	Route::get('logout', array(
		'as' => 'logout',
		'uses' => 'SessionsController@destroy'
	));

	// ACCOUNT LIST
	Route::get('account', array(
		'as' => 'account',
		'uses' => 'SessionsController@accountList'
	));

	// ACCOUNT CREATE
	Route::get('account/create', array(
		'as' => 'create',
		'uses' => 'SessionsController@create'
	));

	// ACCOUNT EDIT
	Route::get('account/edit/{id}', array(
		'as' => 'account-edit',
		'uses' => 'SessionsController@edit'
	));
	
	// CSRF protection group
	Route::group(array('before' => 'csrf'), function() {

		// ACCOUNT CREATE
		Route::post('account/create', array(
			'as' => 'create-post',
			'uses' => 'SessionsController@createPost'
		));

		// ACCOUNT EDIT
		Route::post('account/edit', array(
			'as' => 'account-edit-post',
			'uses' => 'SessionsController@editPost'
		));

		// ACCOUNT DEL
		Route::post('account/del', array(
			'as' => 'account-del',
			'uses' => 'SessionsController@del'
		));

		// CHANGE PASS
		Route::post('account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'SessionsController@changepass'
		));

		// Payment EDIT
		Route::post('payment-gateway/edit', array(
			'as' => 'payment-edit-post',
			'uses' => 'PaymentController@update'
		));

		// config
		Route::post('configure', array(
			'as' => 'configure-save',
			'uses' => 'ConfigureController@update'
		));

		// Profile
		Route::post('profile', array(
			'as' => 'profile-save',
			'uses' => 'ProfileController@update'
		));

		// customer
		Route::post('customer/edit', array(
			'as' => 'customer-edit-post',
			'uses' => 'CustomerController@update'
		));

		// emailcontent
		Route::post('email/edit', array(
			'as' => 'email-edit-post',
			'uses' => 'EmailController@update'
		));

		// newsletter
		Route::post('newsletter', array(
			'as' => 'newsletter-send',
			'uses' => 'NewsletterController@update'
		));

		// themes
		Route::post('themes', array(
			'as' => 'theme-change',
			'uses' => 'ThemesController@update'
		));

				// earlybird
		Route::post('earlybird/create', array(
			'as' => 'earlybird-post',
			'uses' => 'EarlybirdController@store'
		));
		Route::post('earlybird/edit', array(
			'as' => 'earlybird-update',
			'uses' => 'EarlybirdController@update'
		));
		Route::post('earlybird/del', array(
			'as' => 'earlybird-del',
			'uses' => 'EarlybirdController@destroy'
		));

		// Last minute
		Route::post('lastminute/create', array(
			'as' => 'lastminute-post',
			'uses' => 'LastminuteController@store'
		));
		Route::post('lastminute/edit', array(
			'as' => 'lastminute-update',
			'uses' => 'LastminuteController@update'
		));
		Route::post('lastminute/del', array(
			'as' => 'lastminute-del',
			'uses' => 'LastminuteController@destroy'
		));

		// Promo
		Route::post('promo/create', array(
			'as' => 'promo-post',
			'uses' => 'PromoController@store'
		));
		Route::post('promo/edit', array(
			'as' => 'promo-update',
			'uses' => 'PromoController@update'
		));
		Route::post('promo/del', array(
			'as' => 'promo-del',
			'uses' => 'PromoController@destroy'
		));


	});

	// CHANGE PASS
	Route::get('account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'SessionsController@change'
	));

	// Payment 
	Route::get('payment-gateway', array(
		'as' => 'payment-gateway',
		'uses' => 'PaymentController@show'
	));
	
	// Payment EDIT
	Route::get('payment-gateway/edit/{id}', array(
		'as' => 'payment-edit',
		'uses' => 'PaymentController@edit'
	));

	// config
	Route::get('configure', array(
		'as' => 'configure',
		'uses' => 'ConfigureController@show'
	));

	// Profile
	Route::get('profile', array(
		'as' => 'profile',
		'uses' => 'ProfileController@show'
	));

	// customer
	Route::get('customer', array(
		'as' => 'customer',
		'uses' => 'CustomerController@show'
	));

	// customer
	Route::get('customer/edit/{id}', array(
		'as' => 'customer-edit',
		'uses' => 'CustomerController@edit'
	));

	Route::get('customer/view-booking/{id}', array(
		'as' => 'customer-view-booking',
		'uses' => 'CustomerController@showbooking'
	));

	Route::get('customer/detail-booking/{id}', array(
		'as' => 'customer-detail-booking',
		'uses' => 'CustomerController@showdetailbooking'
	));

	Route::get('customer/delete-booking/{id}', array(
		'as' => 'customer-delete-booking',
		'uses' => 'CustomerController@deletebooking'
	));

	Route::get('customer/cancel-booking/{id}', array(
		'as' => 'customer-cancel-booking',
		'uses' => 'CustomerController@cancelbooking'
	));

	// newsletter
	Route::get('newsletter', array(
		'as' => 'newsletter',
		'uses' => 'NewsletterController@show'
	));

	// emailcontent
	Route::get('email', array(
		'as' => 'email',
		'uses' => 'EmailController@show'
	));

	// emailcontent
	Route::get('email/edit/{id}', array(
		'as' => 'email-edit',
		'uses' => 'EmailController@edit'
	));

	// calendar
	Route::get('calendar', array(
		'as' => 'calendar',
		'uses' => 'CalendarController@show'
	));

	// themes
	Route::get('themes', array(
		'as' => 'themes',
		'uses' => 'ThemesController@show'
	));

		// Early Bird
	Route::get('earlybird', array(
		'as' => 'earlybird',
		'uses' => 'EarlybirdController@show'
	));
	Route::get('earlybird/create', array(
		'as' => 'earlybird-create',
		'uses' => 'EarlybirdController@create'
	));
	Route::get('earlybird/edit/{id}', array(
		'as' => 'earlybird-edit',
		'uses' => 'EarlybirdController@edit'
	));

	// Last Minute
	Route::get('lastminute', array(
		'as' => 'lastminute',
		'uses' => 'LastminuteController@show'
	));
	Route::get('lastminute/create', array(
		'as' => 'lastminute-create',
		'uses' => 'LastminuteController@create'
	));
	Route::get('lastminute/edit/{id}', array(
		'as' => 'lastminute-edit',
		'uses' => 'LastminuteController@edit'
	));

	// Promo
	Route::get('promo', array(
		'as' => 'promo',
		'uses' => 'PromoController@show'
	));
	Route::get('promo/create', array(
		'as' => 'promo-create',
		'uses' => 'PromoController@create'
	));
	Route::get('promo/edit/{id}', array(
		'as' => 'promo-edit',
		'uses' => 'PromoController@edit'
	));

	// mika 
	Route::get('priceplan',array(
		'as' => 'priceplan',
		'uses' => 'PriceplanController@index'
	));
	Route::get('processprice',array(
		'uses' => 'PriceplanController@show'
	));

	Route::get('booking-list', array(
		'as' => 'booking-list',
		'uses' => 'HomeController@index'		
		));

	Route::resource('priceplan','PriceplanController');
		
	Route::resource('rooms','RoomController');
	

}); // Authenticated Group

// SEARCH 
Route::get('/', array(
	'as' => 'index',
	'uses' => 'SearchController@index'
));

// SEARCH 
Route::post('booking-search', array(
	'as' => 'booking-search',
	'uses' => 'SearchController@search'
));

Route::post('booking-detail',array(
	'as' => 'booking-detail',
	'uses' => 'DetailsController@index'
));

Route::post('booking-detail',array(
	'as' => 'booking-detail',
	'uses' => 'DetailsController@index'
));

Route::post('booking-save',array(
	'as' => 'booking-save',
	'uses' => 'DetailsController@save'
));

Route::get('autoprice',array(
		'uses' => 'SearchController@getautoprice'
	));

Route::get('getcust',array(
		'uses' => 'DetailsController@getcust'
	));

Route::get('/booking-finish', ['as' => 'booking-finish', function()
{
	return View::make('frontend.finish');
}]);
Route::get('/booking-failed', ['as' => 'booking-failed', function()
{
	return View::make('frontend.failed');
}]);

Route::post('booking-fetch',function(){
	return "submited";
});



// Unautheticated Group
Route::group(array('before' => 'guest'), function() {

	// CSRF protection group
	Route::group(array('before' => 'csrf'), function() {

		// sign in
		Route::post('login', array(
			'as' => 'store',
			'uses' => 'SessionsController@store'
		));
		
	});

	// sign in
	Route::get('login', array(
		'as' => 'login',
		'uses' => 'SessionsController@index'
	));
	
});

