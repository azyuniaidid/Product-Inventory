<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show the login page
    public function showLogin() {
        return view('login');
    }

    // Handle the login attempt
    public function login(Request $request) {
    if($request->username == 'admin' && $request->password == 'password123') {
       return redirect('/dashboard'); // This goes to your new dashboard
    }
    return back()->with('error', 'Wrong username or password');
}
}