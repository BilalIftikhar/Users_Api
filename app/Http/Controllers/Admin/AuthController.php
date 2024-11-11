<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',  // 'confirmed' rule will check for password_confirmation
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        return redirect()->route('admin.dashboard'); 

    }
    public function Login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            // Login successful, redirect to the admin dashboard
            return redirect()->route('admin.dashboard'); 
        }

        // Login failed, redirect back with an error
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
