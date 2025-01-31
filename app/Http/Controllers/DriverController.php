<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;


class DriverController extends Controller
{
    public function index() {
        // $driver = Driver::with('user')->get();
        return view('admin.driver', [
            'title' => 'Driver',
            
        ]);
    }
    
    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'gender' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'no_sim' => 'required',
            'hire_date' => 'required|date',
        ]);

        $validatedData['password'] = bcrypt('123456');
        // dd($request->all());
        // dd('Registrasi berhasil');
        
        // Buat user baru
            $user = User::create([
                'name' => $validatedData['name'],
                'no_hp' => $validatedData['no_hp'],
                'gender' => $validatedData['gender'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'id_role' => 2, // ID role untuk driver
            ]);

            // Buat driver baru
            Driver::create([
                'no_sim' => $validatedData['no_sim'],
                'user_id' => $user->id,
                'status_driver' => 'Aktif',
                'hire_date' => $validatedData['hire_date'],
                $timestamp = now()->format('Y-m-d H:i:s'),
            ]);

            return redirect('/admin/driver')->with('success', 'Driver berhasil ditambah');

    }



}
