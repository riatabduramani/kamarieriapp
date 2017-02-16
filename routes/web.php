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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
  
    Route::get('/', function () {
		return view('admin.home');
		});
});


	Route::group(['prefix' => 'client', 'middleware' => ['auth', 'role:client']], function() {
		
	    Route::get('/', function () {
		    return view('home');
			});

	    Route::get ('/generateqrcodes', 'PdfController@github');

	    Route::resource('/menu', 'Client\\MenuController');
		Route::resource('/categories', 'Client\\CategoriesController');
		Route::resource('/products', 'Client\\ProductsController');
		Route::resource('/ingredients', 'Client\\IngredientsController');
		Route::resource('/profile', 'Client\\ProfileController');
		Route::resource('/business', 'Client\\BusinessController');	

	});

