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

    Route::get ('/generateqrcodes', 'PdfController@qrcodes');

    Route::resource('/menu', 'Client\\MenuController');
	Route::resource('/categories', 'Client\\CategoriesController');
	Route::resource('/products', 'Client\\ProductsController');
	Route::resource('/ingredients', 'Client\\IngredientsController');
	Route::resource('/profile', 'Client\\ProfileController');
	Route::resource('/business', 'Client\\BusinessController');
	Route::resource('/history', 'Client\\OrderHistoryController');
	
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:super-admin']], function() {
	Route::resource('/users','Admin\\UserController');
	Route::resource('/roles','Admin\\RoleController');
});

Route::resource('/notify','NotificationTest');

/*
Route::group(['middleware' => ['auth', 'role:super-admin']], function() {

	Route::get('roles',['as'=>'roles.index','uses'=>'Admin\\RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'Admin\\RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'Admin\\RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'Admin\\RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'Admin\\RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'Admin\\RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'Admin\\RoleController@destroy','middleware' => ['permission:role-delete']]);

});
*/