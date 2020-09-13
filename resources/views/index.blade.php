<!DOCTYPE html>
<html>
<head>
	<title>Login - Simply Accounting</title>
    <link id="login-css" rel="stylesheet" href="{{ URL::asset('admin/assets/css/login.css') }}" />
    <link href="{{ URL::asset('admin/assets/img/logo.png') }}" rel="shortcut icon" />
</head>
<body>
	<div class="login-box">
		<img src="{{ URL::asset('admin/assets/img/avatar.png') }}" class="avatar">
		<h1>Simply Accounting</h1>
		<form action="/postLogin" method="POST">
			@if (session('message'))
				<div style="color: red" role="alert">
					{{ session('message') }}
				</div>
			@endif
            @csrf
			<input type="email" name="email" id="email" placeholder="Enter E-mail">
			
			@if ($errors->has('email'))
			<span class="help-block" style="color: red; font-size: 14px;">{{ $errors->first('email') }}</span>
			@endif
			
			<input type="password" name="password" id="password" placeholder="Enter Password">

			@if ($errors->has('password'))
			<span class="help-block" style="color: red; font-size: 14px;">{{ $errors->first('password') }}</span>
			@endif

            <button type="submit">Login</button>
		</form>
		<a href="#">Forget Password?</a>
	</div>
</body>
</html>