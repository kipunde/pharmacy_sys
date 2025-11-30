@extends('admin.layouts.plain')

@section('content')
<h1>Canaan Dental Clinic</h1>
<p class="account-subtitle">Login Panel</p>

@if (session('login_error'))
    <x-alerts.danger :error="session('login_error')" />
@endif

<!-- Form -->
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group" style="position:relative;">
        <input class="form-control" name="email" type="text" placeholder="Email">
    </div>
    <div class="form-group" style="position:relative;">
        <input class="form-control" id="password" name="password" type="password" placeholder="Password">
        <span class="toggle-password" onclick="togglePassword('password')" 
              style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
            👁
        </span>
    </div>
    <div class="form-group">
        <button class="btn btn-success btn-block" type="submit">Login</button>
    </div>
</form>
<!-- /Form -->

<div class="text-center forgotpass"><a href="{{ route('password.request') }}">Forgot Password?</a></div>

<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>
@endsection
