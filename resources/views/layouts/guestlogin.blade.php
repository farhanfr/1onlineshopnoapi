<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v4 by Colorlib</title>
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('form/opensans-font.css') }}">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/form/style.css') }}"/>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>INFOMATION</h2>
				<p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>
				<p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.</p>
				<div class="form-left-last">
					<input type="submit" name="account" class="account" value="Have An Account">
				</div>
			</div>
			<form class="form-detail" action="{{ url('loginguest') }}" method="post" id="myform">
				@csrf
				<h2>Masuk Akun E-Tech</h2>
				@if(Session::get('notif'))
				<div class="alert alert-danger">{{ Session::get('notif') }}</div>
				@endif
				@error('error')
				<div class="alert alert-danger">{{ $errors->first('error') }}</div>
				@enderror
				<div class="form-row">
					<label for="password">Username</label>
					<input type="text" name="guest_username" id="password" class="input-text" required>
				</div>

				<div class="form-row">
					<label for="comfirm-password">Password</label>
					<input type="password" name="guest_password" id="comfirm_password" class="input-text" required>
				</div>
				
				<div class="form-row">
					<input type="submit" name="register" class="register" value="Masuk">
				</div>
			</form>
		</div>
	</div>
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
