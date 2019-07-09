<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestModel;
use Validator;
use Hash;

class RegisterController extends Controller
{
	public function add_guest(Request $request)
	{
		$input=[
			'guest_phonenumber'=>$request['guest_phonenumber'],
			'guest_username'=>$request['guest_username']
		];

		$rule=[
			'guest_phonenumber'=>'max:12|min:12',
			'guest_username'=>'unique:guest'
		];

		$msg=[
			'guest_phonenumber.max'=>'Nomor maksimal 12 angka',
			'guest_phonenumber.min'=>'Nomor minimal 12 angka',
			'guest_username.unique'=>'Username sudah digunakan'
		];

		$validator=Validator::make($input,$rule,$msg);
		if ($validator->fails()) {
			return redirect('/registertemp')->withErrors($validator);
		}

			$AddGuest=new GuestModel();
			$AddGuest->guest_name=$request['guest_name'];
			$AddGuest->guest_gender=$request['guest_gender'];
			$AddGuest->guest_address=$request['guest_address'];
			$AddGuest->guest_phonenumber=$request['guest_phonenumber'];
			$AddGuest->guest_username=$request['guest_username'];
			$AddGuest->guest_password=Hash::make($request['guest_password']);
			if ($AddGuest->save()) {
				return redirect('/registertemp')->with('notif','berhasil membuat akun E-Tech, silahkan login');
			}
			else{
				return redirect('/registertemp')->with('notif','gagal membuat akun E-Tech');	
			}	
		



	}
}
