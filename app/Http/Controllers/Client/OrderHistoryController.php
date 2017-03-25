<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException; 
use Auth;
use User;
use Gate;
use App\OrderHistory;
use DB;
use Illuminate\Http\Request;
use Session;

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

        $history = OrderHistory::select('customer_nr','order_nr', 'client_id', 'table_nr', 'created_at')->distinct()->get();
        //$sum = OrderHistory::select('customer_nr','order_nr', 'client_id', 'table_nr', 'created_at')->distinct()->sum('price');

        $sum = $history->sum(function($histori) {
            return $histori->price;
        });

        //$sum = DB::table('order_history')->where('order_nr', array($history->order_nr))->sum('price');
        
        return view('client.history.index', compact('history','sum'));
    }

    public function show($id) {

        $history = DB::table('order_history')->where('order_nr', $id)->get();
        $sum = DB::table('order_history')->where('order_nr', $id)->sum('price');

        $historydata = OrderHistory::select('customer_nr','order_nr', 'client_id', 'table_nr', 'created_at')->distinct()->where('order_nr', $id)->get();

        return view('client.history.show', compact('history','sum', 'historydata'));
    }

}
