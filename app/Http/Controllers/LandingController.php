<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemModel;
use DB;

class LandingController extends Controller
{
	public function get_data()
	{
		$GetData=DB::table('item')
		->join('category','category.id_category','=','item.id_category')
		->get();
		return view('landingpage.home',compact('GetData'));	
	}

    
}
