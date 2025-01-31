<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Jadwal;
use App\Models\Pesanan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public $search;
    protected $queryString = ['search'];
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'proses' => 'Sedang Diproses',
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];

    public function index() {
        $jadwal = Jadwal::all();
        return view('admin.jadwal', [
            'title' => 'Jadwal',
            
        ], compact('jadwal'));
    }

    public function user() {
        $jadwal = Jadwal::all();
        return view('user.jadwal', [
            'title' => 'Jadwal',
            
        ], compact('jadwal'));
    }


    public function create(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jam' => 'required',
            'harga' => 'required',
            'asal_id' => 'required',
            'tujuan_id' => 'required',
            // 'driver_id' => 'required',
            'kendaraan_id' => 'required',
            'kuota' => 'required',
            // 'status' => 'required',
        ]);

        // dd($request->all());
        // dd('Registrasi berhasil');
        $harga = preg_replace('/[^\d]/', '', $request->harga);
        // Buat user baru
        Jadwal::create([
            'tanggal' => $validatedData['tanggal'],
            'jam' => $validatedData['jam'],
            'harga' => $harga,
            'asal_id' => $validatedData['asal_id'],
            'tujuan_id' => $validatedData['tujuan_id'],
            // 'driver_id' => $validatedData['driver_id'],
            'kendaraan_id' => $validatedData['kendaraan_id'],
            'kuota' => $validatedData['kuota'],
            'status' => 'dijadwalkan',
        ]);

        return redirect('/admin/jadwal')->with('success', 'Jadwal berhasil ditambah');

    }

    public function riwayatDriver() {
        $userId = Auth::id();
        $driver = Driver::where('user_id', $userId)->firstOrFail();
        $kendaraan = $driver->kendaraan;
        $jadwal = Jadwal::where('kendaraan_id', $kendaraan->pluck('id'))->paginate(5);
        $statuses = $this->statuses;
        // dd($jadwal);
        return view('user.riwayatdriver', [
            'title' => 'Riwayat',
            
        ], compact('jadwal', 'statuses'));
    }

    

    public function riwayat() {
        $jadwal = Jadwal::all();
        $selesai = Jadwal::where('status', 'selesai')->get();
        // dd($selesai);
        $statuses = $this->statuses;
        // dd($jadwal); 
        return view('admin.riwayatjadwal', [
            'title' => 'Riwayat Jadwal',
            
        ], compact('jadwal', 'statuses', 'selesai'));
    }

    public function detail($id) {
        // $jadwal = Jadwal::all();
        // $id = 
        $jadwal = Jadwal::where('status', '!=', 'selesai')->get();
        $jadwalId = $id;
        $kendaraan = Kendaraan::all();
        $pesan = Pesanan::where('jadwal_id', $id)->paginate(5);
        $statuses = $this->statuses;
        return view('admin.dataperjadwal', [
            'title' => 'Detail',
        ], compact('pesan', 'statuses', 'jadwalId'));
    }

    public function mount($search = null)
    {
        $this->search = $search ?? '';
    }
    
}
