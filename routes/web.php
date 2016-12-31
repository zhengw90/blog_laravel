<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>'visitors'], function(){
	Route::get('/register', 'RegistrationController@register');
	Route::post('/register', 'RegistrationController@postRegister');
	
	Route::get('/login', 'LoginController@login');
	Route::post('/login',  'LoginController@postLogin');

	Route::get('phpinfo', 'PagesController@getInfo' );
	
});


Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');


Route::post('/logout', 'LoginController@logout');

Route::get('/earnings', 'AdminController@earnings')->middleware('admin');
Route::get('/tasks', 'ManagerController@tasks')->middleware('managers');


// basic routing
	Route::get('test', function () {
		return view('pages.test');
	});
	
// named routing 
	Route::get('/about', 'PagesController@getAbout')->name("about");
	Route::get('info', 'PagesController@getInfo');
	Route::get('contact', [ 
			'as'=> 'contact',
			'user'=> 'PagesController@getContact'
	])->name("contact");

	Route::resource('product', 'ProductController');