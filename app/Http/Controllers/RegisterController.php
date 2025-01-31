<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('user.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'gender' => 'required',
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password' => 'required|min:5|max:255|confirmed',
            

        ]);
        
        // dd('register berhasil!!!');
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login!');

        return redirect('/login')->with('success', 'Pendaftaran Akun Berhasil, Silahkan Masuk dengan akun yang telah didaftarkan!');
    }
}
