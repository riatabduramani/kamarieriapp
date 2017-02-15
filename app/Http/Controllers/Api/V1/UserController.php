<?php

namespace App\Http\Controllers\Api\V1;
use App\User;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
    	 return User::all();
    }

    public function show($id)
    {
		return User::findorFail($id);
    }
}


