<?php

namespace App\Http\Controllers;
use Davibennun\LaravelPushNotification\Facades\PushNotification;

use Illuminate\Http\Request;

class NotificationTest extends Controller
{
    public function index()
	  {
	    // Change it when device launching sometimes
	    $deviceToken = "eMBFFfDZMkc:APA91bE-aKLsZSmSL6F7pdwqf9ktv6QXy22OjQtdr4QfeKE8X--27ooiaxFgzY6zvOrhQiD8qUAVf3ZV0xYwZWuW9S_gK7TIe1vYtl-stau13bAvQw32ljVFMpNx2Y2EVMznO0ZZKSWY";

	    $return = PushNotification::app('ResApp')
	      ->to($deviceToken)
	      ->send('Your order has been SEEN');

	    //dd($return);
	    //return $return;
	  }
}
