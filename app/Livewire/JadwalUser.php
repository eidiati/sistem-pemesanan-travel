<?php

namespace App\Livewire;

use App\Models\Rute;
use App\Models\Driver;
use App\Models\Jadwal;
use Livewire\Component;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class JadwalUser extends Component
{

    public $selectJadwalId;
    public $tanggal;
    public $jam;
    public $asal_id;
    public $tujuan_id;
    public $driver_id;
    public $kendaraan_id;
    public $kuota;
    public $harga;
    public $status;
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'penjemputan' => 'Dalam Penjemputan',
        'proses' => 'Dalam Proses',
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];
    public $jadwals;
    public $search = '';
    protected $queryString = ['search'];
    public $filterStatus = ['dijadwalkan', 'proses'];
    use WithPagination;

    public function mount()
    {
        $userId = auth()->user()->id;

        $driver = Driver::where('user_id', $userId)->first();

        if($driver)
        {
            $this->kendaraan_id = Kendaraan::where('driver_id', $driver->id)->pluck('id');

        }
        // $jadwals = $this->jadwals;
        return $this->kendaraan_id;    
    }

    public function render()
    {

        return view('livewire.jadwal-user', [
            $jadwal = Jadwal::query()
            ->where('status', '!=', 'selesai')
            ->where(function ($query) {
                $query->where('tanggal', 'LIKE', "%{$this->search}%")
                ->orWhereHas('asal', function ($q) {
                    $q->where('nama_kota', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('tujuan', function ($q) {
                    $q->where('nama_kota', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('kendaraan', function ($q) {
                    $q->where('merk', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('kendaraan', function ($q) {
                    $q->where('model', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('kendaraan.driver.user', function ($q) {
                    $q->where('name', 'LIKE', "%{$this->search}%");
                });
            })
            ->paginate(5),
            // dump($jadwal),
            $rute = Rute::all(),
            $kendaraan = Kendaraan::all(),
        

        ], compact('rute', 'kendaraan', 'jadwal'));

    }
}
