<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Jadwal;
use App\Models\Pesanan;
use Livewire\Component;
use App\Models\Kendaraan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class DataPenumpang extends Component
{
    public $search = '';
    protected $queryString = ['search'];
    use WithPagination; 
    public $selectId;
    public $userName;
    public $harga;
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'penjemputan' => 'Dalam Penjemputan',
        'proses' => 'Dalam Penjemputan',
        'dijemput' => 'Dalam Pengantaran',
        'istirahat' => 'Sedang Istirahat',
        'pengantaran' => "Dalam Pengantaran",
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];

    public $metodeBayars = [
        'transfer' => "Transfer",
        'cash' => 'Cash/Tunai',
    ];

    public function lunas() {
        if($this->selectId == 0) {
            return;
        }
        $pesanan = Pesanan::findOrFail($this->selectId);
        
        $pesanan->status_bayar = 'Lunas';
        dump($pesanan->status_bayar);
    }

    public function changeStatus($id) {
        $this->selectId = $id;
        $pesanan = Pesanan::findOrFail($this->selectId);
        $this->userName = $pesanan->user->name;;
        $this->harga = $pesanan->harga;

    }

    public function updateStatus1() {
        if($this->selectId == 0) {
            return;
        }
        $pesanan = Pesanan::findOrFail($this->selectId);
        // dump($pesanan);
        $pesanan->status_pesanan = 'dijemput';
        $pesanan->save();

        return redirect('/driver/data-penumpang')->with('success', 'Penumpang telah berhasil dijemput');
    }

    public function updateStatus2()
    {
        if($this->selectId == 0) {
            return;
        }
        $pesanan = Pesanan::findOrFail($this->selectId);

        $pesanan->status_pesanan = 'selesai';
        $pesanan->save();

        return redirect('/driver/data-penumpang')->with('success', 'Penumpang telah selesai diantar');
    }
    
    
    public function render()
    {
        $userId = Auth::id();
        $driver = Driver::where('user_id', $userId)->first();

        if (!$driver) {
            return back()->with('error', 'Driver not found.');
        }

        $kendaraan = Kendaraan::where('driver_id', $driver->id)->first();

        if (!$kendaraan) {
            return back()->with('error', 'Kendaraan not found.');
        }

        $jadwal = Jadwal::where('kendaraan_id', $kendaraan->id)->get();
        if ($jadwal->isEmpty()) { // Cek jika koleksi kosong
            return back()->with('error', 'Jadwal not found.');
        }
        
        // $query = $request->input('query');
        
        // Ambil daftar ID jadwal
        $jadwalId = $jadwal->pluck('id');
        $keyword = request()->input('keyword');
        $data = Pesanan::whereIn('jadwal_id', $jadwalId) // Gunakan whereIn untuk array
            ->where('status_pesanan', '!=', 'selesai')  
            ->when($keyword, function ($query) use ($keyword) {
                $query->WhereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%". $keyword . "%");
                });
            })
            ->paginate(10);

        $statuses = $this->statuses;
        $metodeBayars = $this->metodeBayars;
        $userName = $this->userName;
        $harga = $this->harga;
        return view('livewire.data-penumpang', [

        ], compact('data', 'statuses', 'metodeBayars', 'userName', 'harga'));
    }
}
