<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestModel;
use Hash;
use Session;

class LoginController extends Controller
{
    public function login_guest(Request $request)
    {
    	$guestusername=$request['guest_username'];
    	$guestpassword=$request['guest_password'];

    	$data=GuestModel::where('guest_username',$guestusername)->first();

    	if ($data == true) {
    		if (Hash::check($guestpassword, $data->guest_password)) {
    			Session::put('id_guest',$data->id_guest);
    			Session::put('guest_name',$data->guest_name);
    			return redirect('/guestdashboard');
    		}
    		else{
    			return redirect('/logintemp')->with('notif','Username atau password salah');
    		}
    	}
    	else{
    		return redirect('/logintemp')->with('notif','Username atau password salah');
    	}

    }
}
