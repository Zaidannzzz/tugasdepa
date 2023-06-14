<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        //
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        // if (Auth::guard('admin')->attempt($credentials)) {
        //     // Admin login successful
        //     return redirect()->intended(route('admin.dashboard'));
        // }

        // // Admin login failed
        // return back()->withErrors([
        //     'email' => 'Invalid credentials',
        // ]);
        return redirect()->intended(route('admin.dashboard'));
    }

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        // Validate the registration form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new admin record in the database
        $admin = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // // Log in the newly registered admin
        // Auth::guard('admin')->login($admin);

        // Redirect the admin to the admin dashboard
        return redirect()->route('admin.dashboard');
    }
}
