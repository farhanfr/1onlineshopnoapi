<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillModel;
use Session;
use DB;


class BillController extends Controller
{
    public function get_bill($no_checkout)
    {	
    	$GetBill=DB::table('bill')
        ->where('no_checkout',$no_checkout)
        ->join('guest','guest.id_guest','=','bill.id_guest')
        ->join('item','item.id_item','=','bill.id_item')
        ->get();
    	foreach ($GetBill as $gb) {
    		$GetName=$gb->guest_name;
    		$GetAddress=$gb->guest_address;
    		$GetDateCheckout=$gb->date_checkout;
            $GetPaymentMethod=$gb->payment_method;
            $GetNoCheckout=$gb->no_checkout;
            $GetBillStatus=$gb->bill_status;
            $GetCodePayment=$gb->code_payment;
    	}
    	return view('guest.bill',compact('GetBill','GetName','GetAddress',
        'GetDateCheckout','GetPaymentMethod','GetNoCheckout','GetBillStatus','GetCodePayment'));
    }
}

