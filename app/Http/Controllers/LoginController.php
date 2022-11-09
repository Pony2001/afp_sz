<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     public function authenticate(Request $request)
//     {
//         $credentials = $request->validate([
//             'username' => ['required', 'username'],
//             'password' => ['required'],
//         ]);

//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();

//             return redirect()->intended('admin');
//         }

//         return back()->withErrors([
//             'username' => 'Nincs ilyen felhasználónév!',
//         ])->onlyInput('username');
//     }
//     public function login()
//     {
//         return view('login');
//     }
// }
