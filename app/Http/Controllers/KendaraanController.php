<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Driver;  

class KendaraanController extends Controller
{
    public $search;
    protected $queryString = ['search'];

    public function index() {
        $kendaraan = Kendaraan::all();
        $drivers = Driver::all();
        // $drivers = Driver::with('user')->get();
        return view('admin.kendaraan', [
            'title' => 'Kendaraan',
            
        ], compact("kendaraan", "drivers"));
    }

    public function create(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'plat_nomor' => 'required',
            'driver_id' => 'required',
            // 'status' => 'required',
        ]);

        // dd($request->all());
        // dd('Registrasi berhasil');
        
        // Buat user baru
        Kendaraan::create([
            'merk' => $validatedData['merk'],
            'model' => $validatedData['model'],
            'plat_nomor' => $validatedData['plat_nomor'],
            'driver_id' => $validatedData['driver_id'],
            'status' => 'tersedia',
        ]);

        return redirect('/admin/kendaraan')->with('success', 'Kendaraan berhasil ditambah');

    }

    public function mount($search = null)
    {
        $this->search = $search ?? '';
    }
}


