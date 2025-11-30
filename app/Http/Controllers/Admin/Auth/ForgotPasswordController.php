<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        $title = 'forgot password';
        return view('admin.auth.password.email', compact('title'));
    }

    public function requestEmail(Request $request)
    {
        // Validate inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        // Update password
        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('status', 'Password updated successfully!');
    }
}
