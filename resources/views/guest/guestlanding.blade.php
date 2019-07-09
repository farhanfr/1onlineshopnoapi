@extends('layouts.mainguestdashboard')
@section('title','Landing Dashboard')

@section('content')
	<h3>Selamat Datang {{ Session::get('guest_name') }}, silahkan belanja di E-Tech yang murah dan berkualitas</h3>
	<a href="{{ url('/') }}" class="btn btn-primary">Kembali berbelanja</a>
@endsection