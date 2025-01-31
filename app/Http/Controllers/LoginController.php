<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        // if(!Session()->get('login')) {
        //     return redirect('login')->with('alert', 'Anda belum login');
        // } else {
        //     return view('user.login', [
        //         'title' => 'Login'
        //     ]);
        // }
        return view('user.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // if ($user->id_role == 1) {
        //     return redirect('/admin');
        // }
        // if ($user->id_role == 2) {
        //     return redirect('/driver');
        // }
        // if ($user->id_role == 3) {
        //     return redirect('/user');
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->id_role == 1) {
                return redirect('/admin/dashboard');
            } else if(Auth::user()->id_role == 2) {
                return redirect('/driver/dashboard');
            } else if(Auth::user()->id_role == 3) {
                return redirect('/home');
            } else if(Auth::user()->id_role == 4) {
                return redirect('/owner/dashboard');
            }
            // return redirect('/admin/dashboard');
        }

        return back()->with('loginError', 'Login Gagal, Pastikan Email dan Password Anda Benar!');

    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();    
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
