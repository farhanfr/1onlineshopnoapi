<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function logout_guest()
    {
    	Session::flush();
    	return redirect('/');
    }
}
