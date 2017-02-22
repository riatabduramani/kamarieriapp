<?php

namespace App\Http\Controllers\Api\V1;
use App\Business;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use View;
use Response;

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

      $ingredient = DB::select("SELECT ingredients.id, ingredients.name, ingredients.price 
           						FROM ingredients, product_ingredient, products 
								WHERE product_ingredient.product_id = $id 
								AND ingredients.id = product_ingredient.ingredient_id
								AND products.id = product_ingredient.product_id
								");
        if($ingredient) {
            return $ingredient;
        } else {
            return abort(404);
        }

    }

    public function receiveOrders(Request $request) {
        $data = json_encode($request->all());

         //$data = json_encode(['Example 1','Example 2','Example 3',]);
        $fileName = time() . '_datafile.json';
      $upload = File::put(public_path('upload/json/'.$fileName),$data);
      return $upload;
        
        //return $input;
    }

}