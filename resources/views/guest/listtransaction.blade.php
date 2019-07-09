@extends('layouts.mainguestdashboard')
@section('title','List Transaksi')


@section('content')
	
	<table class="table" id="datatables">
		<thead>
			<th>Nama Barang</th>
			<th>Tanggal Check-out</th>
			<th>Status Pembayaran</th>
			<th>Tipe Pembayaran</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			@php $grandtotal=0; @endphp
			@foreach($GetListTransaction as $glt)	
			<tr>
				{{-- @php $grandtotal += $glt[0]->item_price * $glt[0]->qty @endphp --}}
				<td>null</td>
				<td>{{ $glt[0]->date_checkout }}</td>
				<td>@if($glt[0]->bill_status == 0) <span class="text-danger">Belum Terbayar</span> @elseif($glt[0]->bill_status == 1) <span class="text-warning">Pending</span> @endif</td>
				<td>{{ $glt[0]->payment_method }}</td>
				<td><a href="{{ url('checkouttemp/'.$glt[0]->no_checkout) }}" class="btn btn-info">Lihat Detail</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection
