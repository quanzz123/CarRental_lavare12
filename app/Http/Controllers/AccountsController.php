<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\TblCustomer;

class AccountsController extends Controller
{
   
    public function showRegister() {
        return view('pages.register');
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
        return view('pages.login');
    }
    public function login(Request $request) {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required',
        ]);
        $credentials = $request->only('Email', 'Password');
        $user = TblCustomer::where('Email', $credentials['Email'])->first();
        if ($user && Hash::check($credentials['Password'], $user->Password)) {
            Auth::login($user);
            return redirect()->intended('/home'); 
        }
        return back()->withErrors([
            'Email' => 'The provided credentials do not match our records.',
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