<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'nohp' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255',

        ]);

    }
}
