<?php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ShankController extends Controller
{
    public function index() {

     return view('shank.kamarieriAngularJS');
    }
}
