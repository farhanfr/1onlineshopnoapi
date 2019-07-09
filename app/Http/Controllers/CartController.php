<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartModel;
use App\BillModel;
use Session;
use DB;

class CartController extends Controller
{
    public function add_cart(Request $request)
    {
        $RandomNumber=mt_rand();
        
    	$AddCart=CartModel::create([
    		'id_item'=>$request->id_item,
    		'id_guest'=>$request->id_guest,
    		'qty'=>$request->qty
    	]);

        if ($AddCart) {
           $AddBill=BillModel::create([
            'id_item'=>$request->id_item,
            'id_guest'=>$request->id_guest,
            'id_proofpayment'=>0,
            'bill_appears'=>0,
            'bill_status'=>0,
            'code_payment'=>0,
            'qty'=>$request->qty,
            'date_checkout'=>date('Y-m-d'),
            'payment_method'=>'none',
            'no_checkout'=>0
        ]);
           if ($AddBill) {
            return redirect('/detailitem/'.$AddCart->id_item)
            ->with('notif','Berhasil menambah item di cart');
        }
        else{
            return redirect('/detailitem/'.$AddCart->id_item)
            ->with('notif','Gagal menambah item di cart');  
        }
    }
    else{
        return redirect('/detailitem/'.$AddCart->id_item)
        ->with('notif','Gagal menambah item di cart');
    }

    }

    public function get_cart()
    {
        $GetCart=DB::table('cart')->where('id_guest',Session::get('id_guest'))
        ->join('item','item.id_item','=','cart.id_item')->get();
        return view('guest.guestcart',compact('GetCart'));
    }

    public function checkout(Request $request)
    {
        $rand=mt_rand();//Random Number
        $UpdateBillAppears=BillModel::where('bill_appears',0);
        if ($UpdateBillAppears->update(array('bill_appears'=>1,'no_checkout'=>$rand))) {
            $GetBillData=BillModel::where('id_guest',Session::get('id_guest'))->get();    
            foreach ($GetBillData as $gbd) {
                $GetNoCheckout=$gbd->no_checkout;
            }
            $Checkout=CartModel::where('id_guest',Session::get('id_guest'));
            $Checkout->delete();
        if ($Checkout) {
            return redirect('/checkouttemp/'.$GetNoCheckout)->with('notif','Berhasil checkout');// BUGGGGG
        }
        else{
            return redirect('/guestcart')->with('notif','gagalrhasil checkout');
        }
        }
        
    }

}
