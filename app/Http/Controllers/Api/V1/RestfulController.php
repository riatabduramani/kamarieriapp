<?php

namespace App\Http\Controllers\Api\V1;
use App\Business;
use App\Category;
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

    public function menu($id) {

        /*
        $menu = DB::select(DB::raw("SELECT * 
                            FROM categories, products
                            WHERE categories.id = products.category_id AND categories.user_id = $id;"));
                            */
        //return $menu;

        $tableIds = DB::select( DB::raw("SELECT name, id FROM categories WHERE user_id = $id"));
        $jsonResult = array();

        for($i = 0; $i < count($tableIds); $i++)
        {
            $jsonResult[$i]["category"] = $tableIds[$i]->name;
            $id = $tableIds[$i]->id;

            $jsonResult[$i]["products"] = DB::select( DB::raw("SELECT * FROM products WHERE category_id = $id"));
        }

        return Response::json(array(
                    'menu'    =>  $jsonResult),
                    200
            );
        
        
        //return $category;
        /*
        return  DB::table('categories')
                    ->where('user_id', '=', $id)
                    ->get();
                    */

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
        return $data;
         /*
        $fileName = time() . '_datafile.json';
        File::put(public_path('upload/json/'.$fileName),$data);
      return $data;
      */
        
    }

    public function getBill(Request $request) {
        $data = json_encode($request->all());
        return $data;
    }

    public function callWaiter(Request $request) {
        $data = json_encode($request->all());
        return $data;
    }

}