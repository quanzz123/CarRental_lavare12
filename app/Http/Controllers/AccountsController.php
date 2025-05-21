<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\TblCustomer;

class AccountsController extends Controller
{
   
    public function showRegister() {
        return view('auth.register');
    }
    public function register(Request $request) {
        $request->validate([
            'FullName' => 'required',
            'Name' => 'required',
            'Email' => 'required|email',
            'Password' => 'required',
        ]);
        $user = TblCustomer::create([
            'FullName' => $request->FullName,
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
        ]);
        Auth::login($user);
        return redirect('/home');
    }

    public function showLogin() {
        return view('auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Map form field names to database column names
        if (Auth::attempt([
            'Email' => $request->email,  // Map form 'email' to database 'Email'
            'password' => $request->password  // 'password' is special and handled by getAuthPassword()
        ], $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
    public function profile() {
        if (Auth::check()) {
            return view('pages.profile');
        }
        return redirect()->route('login');
    }
}
