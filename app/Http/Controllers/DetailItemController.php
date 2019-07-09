<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemModel;
use DB;

class DetailItemController extends Controller
{
    public function get_detail_item($id_item)
    {
    	$GetDetailItem=DB::table('item')->where('id_item',$id_item)->join('category','category.id_category','=','item.id_category')->get();
    	return view('landingpage.detailitem',compact('GetDetailItem'));
    }
}
