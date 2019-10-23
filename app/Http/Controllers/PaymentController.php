<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillModel;
use App\ReceiptPaymentModel;
use Session;
use DB;

class PaymentController extends Controller
{
    public function get_list_transaction()
	{
		$GetListTransaction=DB::table('bill')
		->where('bill.id_guest',Session::get('id_guest'))
		->join('guest','guest.id_guest','=','bill.id_guest')
		->join('item','item.id_item','=','bill.id_item')
		->get()->groupBy('no_checkout');
		return view('guest.listtransaction',compact('GetListTransaction'));
	}

	//Payment Method
	public function receipt_payment($no_checkout)
	{	
		$ReceiptPayment=BillModel::where('no_checkout',$no_checkout);
		if ($ReceiptPayment->update(array('payment_method'=>'ATM'))) {
			return back();
		}
		else{
			return back();
		}
	}

	public function accept_receipt_payment(Request $request, $no_checkout)
	{
		$file= $request->file('img_receipt');
		$fileName   = $file->getClientOriginalName();
		$request->file('img_receipt')->move("images/", $fileName);

		$SaveProofImg=ReceiptPaymentModel::create([
			'img_receipt'=>$fileName,
			'no_checkout'=>$no_checkout
		]);

		if ($SaveProofImg) {
			copy("images/".$fileName, "../../1onlineshopcashierNoApi/public/images/".$fileName);
			$BillStatus=BillModel::where('no_checkout',$no_checkout);
			$BillStatus->update(array('bill_status'=>1,'id_receiptpayment'=>$SaveProofImg->id_receiptpayment));
			return back();
		}
	}

	public function change_payment($no_checkout)
	{
		$BillStatus=BillModel::where('no_checkout',$no_checkout);
		$BillStatus->update(array('bill_status'=>0,'payment_method'=>'none','code_payment'=>0));
		return back();
	}

	public function outlet_payment($no_checkout)
	{
		$length=5;
		$PaymentCode=substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

		$ReceiptPayment=BillModel::where('no_checkout',$no_checkout);
		if ($ReceiptPayment->update(array('payment_method'=>'outlet','code_payment'=>$PaymentCode))) {
			return back();
		}
		else{
			return back();
		}
	}
}

