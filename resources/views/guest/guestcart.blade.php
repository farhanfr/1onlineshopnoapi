@extends('layouts.mainguestdashboard')
@section('title', 'Keranjang Belanja')

@section('content')

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama Barang</th>
			<th scope="col">Qty</th>
			<th scope="col">Sub Harga</th>
			<th scope="col">Harga</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		@php 
		$no=1;
		$grandtotal=0;			
		@endphp
		@foreach($GetCart as $gc)
		<tr>
			<th scope="row">{{ $no++ }}</th>
			<td>{{ $gc->item_name }}</td>
			<td>{{ $gc->qty }}</td>
			<td>{{ $gc->item_price }}</td>
			<td>{{ $gc->item_price * $gc->qty }}</td>
			@php($grandtotal += $gc->item_price * $gc->qty) {{-- Calculate Price to grandtotal --}}
			<td><button class="btn btn-danger">Hapus</button></td>
		</tr>
		@endforeach

		<tr>		
			<td colspan="4"><b>Grandtotal</b></td>
			<td>Rp. {{ $grandtotal }}</td>
		</tr>
	</tbody>
</table>
<a href="{{ url('/checkout') }}" class="btn btn-success" onclick="return confirm('Saat anda melakukan checkout keranjang belanja akan terhapus, dan tidak bisa kembali lagi. Yakin checkout?')">CHECKOUT</a>

@endsection