@extends('admin.layouts.plain')

@section('content')
<h1>Forgot Password?</h1>
<p class="account-subtitle">Enter your email to get a new password</p>
<!-- Form -->
<form action="{{route('password.request')}}" method="post">
	@csrf
    <input type="hidden" name="token" value="{{request()->token}}">
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email"     autocomplete="off">
	</div>
    <div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Enter new password">
	</div>
    <div class="form-group">
		<input class="form-control" name="password_confirmation" type="password" placeholder="Repeat new password">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Reset Password</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Remember your password? <a href="{{route('login')}}">Login</a></div>
@endsection