<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException; 
use Auth;
use User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Session;

use App\Orders;
use App\OrdersHistory;

class OrderHistoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $history = Orders::with('sumCount')->where('business_id', $user_id)->paginate(25);

        return view('client.history.index', compact('history'));
    }

    public function show($id) {

        $orders = Orders::findOrFail($id);

        $history = DB::table('orders')
        ->join('order_history', function ($join) use($id) {
            $join->on('orders.id', '=', 'order_history.order_id')
                 ->where('order_history.order_id', '=', $id);

        })->select('order_history.*')->get();

        $sum = DB::table('order_history')->where('order_id',$id)->sum('price');

        return view('client.history.show', compact('orders','history','sum'));
    }

}
