<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
   public function index(){
    if (Auth::user()) {
        // if ($user->level == '1') {
        //     return redirect()->intended('home');
        // }elseif ($user->level == '2') {
        //     return redirect()->intended('Kasir');
        // }
        return redirect()->intended('home');
    }
    return view('login.view_login');
   }

   public function proses(Request $request){
    $request -> validate([
        'username' =>'required',
        'password' =>'required',
    ],
    [
        'username.required' => 'Username Tidak Boleh Kosong',
    ]);

    $kredensial = $request ->only('username','password');

    if (Auth::attempt($kredensial)) {
        $request->session()->regenerate();
        $user = Auth::user();
        // if ($user->level == '1') {
        //     return redirect()->intended('home');
        // }elseif ($user->level == '2') {
        //     return redirect()->intended('Kasir');
        // }
        if ($user) {
            return redirect()->intended('home');
        }
        return redirect()->intended('/');
    }
    return back()->withErrors([
        'username' => 'Coba Periksa Lagi Username dan Password Kamu Ya!',
    ])->onlyInput('username');
   }

   public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}
}
