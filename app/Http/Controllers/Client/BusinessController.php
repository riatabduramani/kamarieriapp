<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException; 

use Auth;
use App\User;
use App\Business;
use App\Country;
use Illuminate\Http\Request;
use Session;

class BusinessController extends Controller
{

    public function update($id, Request $request) {

    		$business = Business::findOrFail($id);

			$business->name = $request->bname;
	        $business->country_id = $request->country;
	        $business->address = $request->address;
	        $business->zip = $request->zip;
	        $business->city = $request->city;
	        $business->phone = $request->phone;
	        $business->web = $request->web;
	        $business->image = $request->image;
	        $business->nr_tables = $request->nr_tables;
	        $business->currency = $request->currency;

	        $business->save();

          return redirect('client/profile')->with('statusprofileupdate', 'Business updated!');
    	
    }
}