<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


$api = app('Dingo\Api\Routing\Router');

//Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {

$api->version('v1', ['middleware' => 'api.auth'],  function ($api) {
//$api->version('v1', function ($api) {
	    /* Business ->get business using QRCode */
	    /* http://api.myapp.dev/business/{id} */
	    $api->get('business/{id}', 'App\Http\Controllers\Api\V1\RestfulController@show');

	    /* Menu ->get menu using user-id*/
	    $api->get('menu/{id}', 'App\Http\Controllers\Api\V1\RestfulController@menu');

	    /* Product ->get product using category-id*/
	    /* http://api.myapp.dev/products/{id} */
	    $api->get('products/{id}', 'App\Http\Controllers\Api\V1\RestfulController@product');

	    /* Ingredient ->get ingredient using product-id*/
	    /* http://api.myapp.dev/ingredient/{id} */
	    $api->get('ingredients/{id}', 'App\Http\Controllers\Api\V1\RestfulController@ingredient');

	    $api->post('/receiveorders', 'App\Http\Controllers\Api\V1\RestfulController@receiveOrders');

	    $api->post('/appusers', 'App\Http\Controllers\Api\V1\RestfulController@registerAppUsers');

	    $api->post('/requestbill', 'App\Http\Controllers\Api\V1\RestfulController@getBill');
	    
	    $api->post('/callwaiter', 'App\Http\Controllers\Api\V1\RestfulController@callWaiter');

	    $api->get('/unseen/{id}', 'App\Http\Controllers\Api\V1\RestfulController@unseen');
	    $api->post('/seen/{id}', 'App\Http\Controllers\Api\V1\RestfulController@seen');
	    $api->post('/seencalls/{id}', 'App\Http\Controllers\Api\V1\RestfulController@seenCalls');

	    $api->post('/storecurrencies', 'App\Http\Controllers\Api\V1\RestfulController@storeCurrencies');

});

