<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            return $user->role_id === 3
                ? redirect()->route('admin.dashboard')
                : redirect()->route('employee.tasks');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }


    public function showRegister() {
    return view('auth.register');
}

public function register(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4|confirmed',
        'role_id' => 'required'
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => $request->role_id,
    ]);

    auth()->login($user);

    return $user->role->name === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('employee.tasks');
}

}
