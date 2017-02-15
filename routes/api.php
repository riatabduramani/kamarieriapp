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

$api->version('v1', function ($api) {

	    /* Business ->get business using QRCode */
	    /* http://api.myapp.dev/business/{id} */
	    $api->get('business/{id}', 'App\Http\Controllers\Api\V1\BusinessController@show');

	    /* Menu ->get menu using user-id*/
	    $api->get('menu/{id}', 'App\Http\Controllers\Api\V1\BusinessController@category');

	    /* Product ->get product using category-id*/
	    /* http://api.myapp.dev/products/{id} */
	    $api->get('products/{id}', 'App\Http\Controllers\Api\V1\BusinessController@product');

	    /* Ingredient ->get ingredient using product-id*/
	    /* http://api.myapp.dev/ingredient/{id} */
	    $api->get('ingredients/{id}', 'App\Http\Controllers\Api\V1\BusinessController@ingredient');

});

