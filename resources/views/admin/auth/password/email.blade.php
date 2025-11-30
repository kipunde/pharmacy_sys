@extends('admin.layouts.plain')

@section('content')
<h1>Forgot Password?</h1>
<p class="account-subtitle">Enter your email to get new password</p>

<!-- Form -->
<form action="{{ route('password.request') }}" method="post">
    @csrf

    <div class="form-group">
        <input class="form-control" name="email" type="email" placeholder="Email" autocomplete="off">
    </div>

    <!-- Password Field with Toggle -->
    <div class="form-group position-relative">
        <input class="form-control" id="password" name="password" type="password" placeholder="Enter new password" autocomplete="off">
        <span class="toggle-password" onclick="togglePassword('password')" style="position:absolute; right:10px; top:10px; cursor:pointer;">
            👁
        </span>
    </div>

    <!-- Confirm Password Field with Toggle -->
    <div class="form-group position-relative">
        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat new password" autocomplete="off">
        <span class="toggle-password" onclick="togglePassword('password_confirmation')" style="position:absolute; right:10px; top:10px; cursor:pointer;">
            👁
        </span>
    </div>

    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
    </div>
</form>
<!-- /Form -->

<div class="text-center dont-have">
    Remember your password? <a href="{{ route('login') }}">Login</a>
</div>

<!-- JS to Toggle Password -->
<script>
function togglePassword(fieldId) {
    const input = document.getElementById(fieldId);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>
@endsection
