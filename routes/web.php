<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middlewarw' => 'web'],function(){
   /*Route::get('/', function () {
    return view('welcome');
    });*/
    Auth::routes();
    //Route::get('/home', 'HomeController@index');
    Route::resource('/cart','CartController');
    Route::get('/','Front@index');
    Route::get('/cart/{cart}/add','CartController@create');
    Route::post('/cart/{cart}/add','CartController@store');
    Route::get('/cart/{cart}/edit','CartController@edit');
    Route::post('cart/{cart}/update','CartController@update');
	Route::get('/cart/{cart}/delete','CartController@destroy');
    Route::get('/home','HomeController@index');
    Route::get('/checkout',[
		'uses' => 'Checkout@Checkout',
		'as'   => 'checkout'
		]);
	//Route::get('checkout','PaypalController@checkout');
	Route::get('done',function(){
		return 'Done';
	});
	Route::get('cancel',function(){
		return 'Cancel';
	});
	//Route::get('all','PaypalController@all');
	Route::get('all','Checkout@all');
	
	Route::resource('/order','OrderController');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware'=>'admin'],function(){
    Route::resource('/admin','AdminController');
    Route::resource('/adminuser','AdminUser');
    Route::get('/adminuser/{adminuser}/delete','AdminUser@destroy');
    Route::get('/adminuser/{adminuser}/show','AdminUser@show');
    Route::resource('/adminproduct','ProductController');
    Route::get('/images/{$image}',function($name){
			return public_path('images/'.$name); 
		});
    Route::get('/adminproduct/{adminproduct}/edit','ProductController@edit');
    Route::post('/adminproduct/{adminproduct}/update','ProductController@update');
    Route::get('/adminproduct/{adminproduct}/delete','ProductController@destroy');
    Route::resource('/admincategory','CatController');
    Route::get('admincategory/{admincategory}/delete','CatController@destroy');
});