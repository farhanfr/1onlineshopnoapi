@extends('layouts.mainguestdashboard')
@section('title', 'Tagihan')

@section('alert')
<div class="alert alert-info">
	<strong>Info !!</strong>
	<p>Call-Center 0822-1237-1625</p>
</div>
@endsection

@section('secondary_layout')

@if($GetBillStatus == 4)
<div style="display: none;">
	@if($GetPaymentMethod == 'ATM')
	<div class="card mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">E-Tech Payment System</h6>
		</div>
		<div class="card-body">
			<h3>Pembayaran dengan ATM (Struk)</h3>
			<form action="{{ url('/acceptreceiptpayment/'.$GetNoCheckout) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<input type="file" name="img_receipt" class="form-control">
				</div>
				<input type="submit" name="submit" class="btn btn-success" value="Upload Bukti" @if($GetBillStatus == '1') disabled @endif > 
				<a href="{{ url('/changepayment/'.$GetNoCheckout) }}" class="btn btn-danger">Ganti Pembayaran</a>
			</form>
		</div>
	</div>

	
	@elseif($GetPaymentMethod == 'outlet')
	<div class="card mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">E-Tech Payment System</h6>
		</div>
		<div class="card-body">
			<h3 class="text-center"><strong>Pembayaran di Gerai E-Tech</strong></h3>
			<h4>Kode Pembayaran : <strong>{{ $GetCodePayment }}</strong></h4>
			<p>*)Catat atau foto kode pembayaran tersebut, kemudian tunjukkan kepada kasir</p>
			<br>
			<a href="{{ url('/changepayment/'.$GetNoCheckout) }}" class="btn btn-danger">Ganti Pembayaran</a>
		</div>
	</div>
	@else
	@endif
</div>
@else

	@if($GetPaymentMethod == 'ATM')
	<div class="card mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">E-Tech Payment System</h6>
	</div>
	<div class="card-body">
		<h3>Pembayaran dengan ATM (Struk)</h3>
		<form action="{{ url('/acceptreceiptpayment/'.$GetNoCheckout) }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<input type="file" name="img_receipt" class="form-control">
			</div>
			<input type="submit" name="submit" class="btn btn-success" value="Upload Bukti" @if($GetBillStatus == '1') disabled @endif > 
			<a href="{{ url('/changepayment/'.$GetNoCheckout) }}" class="btn btn-danger">Ganti Pembayaran</a>
		</form>
	</div>
	</div>
	@elseif($GetPaymentMethod == 'outlet')
	<div class="card mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">E-Tech Payment System</h6>
	</div>
	<div class="card-body">
		<h3 class="text-center"><strong>Pembayaran di Gerai E-Tech</strong></h3>
		<h4>Kode Pembayaran : <strong>{{ $GetCodePayment }}</strong></h4>
		<p>*)Catat atau foto kode pembayaran tersebut, kemudian tunjukkan kepada kasir</p>
		<br>
		<a href="{{ url('/changepayment/'.$GetNoCheckout) }}" class="btn btn-danger">Ganti Pembayaran</a>
	</div>
	</div>
	@else
	@endif
@endif	

@endsection

@section('content')

<h2 class="text-center">E-Tech Checkout</h2>	
<div class="container">
	<h6>Nama : {{ $GetName }}</h6>
	<h6>Alamat : {{ $GetAddress }} </h6>
	<h6>Tgl Checkout : {{ $GetDateCheckout }}</h6>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Barang</th>
				<th scope="col">Qty</th>
				<th scope="col">Harga</th>
			</tr>
		</thead>
		<tbody>		
			@php 
			$no=1;
			$grandtotal=0;			
			@endphp
			@foreach($GetBill as $gb)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $gb->item_name }}</td>
				<td>{{ $gb->qty }}</td>
				<td>{{ $gb->item_price }}</td>
				@php($grandtotal += $gb->item_price * $gb->qty) 
			</tr>
			@endforeach
			<tr>
				<td colspan="3"><b>Grandtotal</b></td>
				<td><strong>Rp. {{ $grandtotal }}</strong></td>
			</tr>
		</tbody>
	</table>
	<hr>
	@if($GetPaymentMethod == 'none')
	<button class="btn btn-success" data-toggle="collapse" data-target="#collapseExample">Pilih Pembayaran</button>
	<div class="collapse" id="collapseExample">
		<div class="card card-body">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#receipt_payment">STRUK ATM</button>
					</div>
					<div class="col-lg-3">
						<button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#outlet_payment">GERAI E-TECH</button>
					</div>
					<div class="col-lg-3">
						<button type="button" class="btn btn-warning btn-lg btn-block">E-BANKING</button>
					</div>
					<div class="col-lg-3">
						<button type="button" class="btn btn-danger btn-lg btn-block">ALFAMART</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	@else
	<button class="btn btn-success" style="display: none;">Pilih Pembayaran</button>
	@endif
</div>

@include('layouts.modal')
@endsection