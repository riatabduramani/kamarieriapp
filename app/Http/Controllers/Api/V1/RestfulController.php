<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use View;
use Response;
use DB;

use App\Business;
use App\Category;
use App\Orders;
use App\OrdersHistory;
use App\Ingredient;
use App\Product;


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

        $order = new Orders();
        $order->business_id = $request->business;
        $order->table_nr = $request->table;
        $order->customer_nr = $request->customer;
        $order->device = $request->device;
        $order->comment = $request->comment;

        $order->save();

        $insertedid = $order->id;

        $products = $request->products;

        foreach ($products as $product => $val) {
            $history = new OrdersHistory();
            $history->order_id = $insertedid;
            $history->product_name = $val['product'];
            $history->price = $val['price'];
            $history->ingredients = $val['ingredients'];
            $history->save();
        }

        return 'true';        
    }

    public function unseen($id) {

       $orders = DB::table('orders')
        ->join('order_history', function ($join) use($id) {
            $join->on('orders.id', '=', 'order_history.order_id')
                 ->where('orders.business_id', '=', $id)
                 ->where('orders.seen', '=', false);

        })
        ->select('order_history.*','orders.table_nr','orders.comment')->get();

        return $orders;
    }

    public function seen($id) {
        $ids = explode(",", $id);
        
        foreach ($ids as $key => $value) {
            $orders = DB::table('orders')
            ->where('id', $value)
            ->update(['seen' => 1]);
        }
        
        
        return 'true';
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