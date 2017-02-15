<?php

namespace App\Http\Controllers\Api\V1;
use App\Business;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RestfulController extends Controller
{

    public function show($id)
    {
    	return Business::where('user_id', $id)->with('User')->get();
    }

    public function category($id) {

    	return  DB::table('categories')
                    ->where('user_id', '=', $id)
                    ->get();

    }

    public function product($id) {

    	return  DB::table('products')
                    ->where('category_id', '=', $id)
                    ->get();
    }

    public function ingredient($id) {

           return DB::select("SELECT ingredients.id, ingredients.name, ingredients.price 
           						FROM ingredients, product_ingredient, products 
								WHERE product_ingredient.product_id = $id 
								AND ingredients.id = product_ingredient.ingredient_id
								AND products.id = product_ingredient.product_id
								");
    }

}