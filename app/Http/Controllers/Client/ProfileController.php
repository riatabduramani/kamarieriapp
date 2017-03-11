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
use Alert;

class ProfileController extends Controller
{
    public function index() {

        $user_id = Auth::user()->id;
    	$user = User::findOrFail($user_id);

        $countryList = Country::pluck('name', 'id')->all();
        $selected = $user->business->country_id;

        return view('client.profile.show', compact('user', 'countryList', 'selected'));
    }


    public function update(Request $request)
    {

            $password = $request->password;

            if($password) {
                
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                ]);
            
                $request->user()->fill([
                'name' => $request->name,
                'password' => Hash::make($request->password)
                ])->save();

            } else {
                $request->user()->fill([
                    'name' => $request->name
                ])->save();
            }

            return redirect('client/profile')->with('success', 'Profile updated!');

    }

}


			
        
   