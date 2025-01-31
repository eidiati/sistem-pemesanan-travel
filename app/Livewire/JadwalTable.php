<?php

namespace App\Livewire;

use App\Models\Rute;
use App\Models\Driver;
use App\Models\Jadwal;
use App\Models\Pesanan;
use Livewire\Component;
use App\Models\Kendaraan;
use Livewire\WithPagination;

class JadwalTable extends Component
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
        'proses' => 'Sedang Diproses',
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];

    public $search = '';
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        $jadwal = Jadwal::query()
        ->where('status', '!=', 'selesai')
        ->where(function ($query) {
            $query->where('tanggal', 'LIKE', "%{$this->search}%")
            ->orWhere('jam', 'LIKE', "%{$this->search}%")
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
        ->orderBy('tanggal', 'asc')
        ->orderBy('jam', 'asc')
        ->paginate(10);

        return view('livewire.jadwal-table',[
            // $jadwal = Jadwal::all(),
            $rute = Rute::all(),
            $kendaraan = Kendaraan::all(),
            $driver = Driver::all(),
            $aktif = Jadwal::where('status', '!=', 'selesai')->get(),
        ], compact('rute', 'kendaraan', 'driver', 'jadwal', 'aktif'));
    }

    public function changeEdit($jadwalId) {    
        $jadwal = Jadwal::findOrFail($jadwalId);
        
        
        
        $this->selectJadwalId = $jadwalId;
        $this->tanggal = $jadwal->tanggal;
        $this->jam = $jadwal->jam;
        $this->asal_id = $jadwal->asal_id;
        $this->tujuan_id = $jadwal->tujuan_id;
        $this->kendaraan_id = $jadwal->kendaraan_id;
        $this->driver_id = $jadwal->kendaraan->driver_id;
        $this->kuota = $jadwal->kuota;
        $this->harga = $jadwal->harga;
        $this->status = $jadwal->status;
        

        // dd($this->selectRuteId, $this->namaRute, $this->descRute);
        // dd($this->tanggal, $this->jam, $this->asal_id, $this->driver, $this->status, $this->hireDate, $this->status);
    }

    public function editJadwal() {
        if($this->selectJadwalId == 0) {
            return;
        }
        $jadwal = Jadwal::findOrFail($this->selectJadwalId);

        //Update data jadwal
        $jadwal->tanggal = $this->tanggal;
        $jadwal->jam = $this->jam;
        $jadwal->asal_id = $this->asal_id;
        $jadwal->tujuan_id = $this->tujuan_id;
        // $jadwal->kendaraan->driver_id = $this->driver_id;
        $jadwal->kendaraan_id = $this->kendaraan_id;
        $jadwal->kuota = $this->kuota;
        $jadwal->status = $this->status;

        if($jadwal->status == 'proses') {
            $pesanan = Pesanan::where('jadwal_id', $jadwal->id)->get();
            foreach($pesanan as $p) {
                $p->status_pesanan = 'penjemputan';
                $p->save();
            }
        }
        //Simpan data jadwal
        $jadwal->save();

        return redirect('/admin/jadwal')->with('success', 'Jadwal berhasil diperbarui');
    

    

        // return redirect('/rute/edit/'.$this->selectRuteId);
        //kembali ke halaman driver
    }

    public function changeDelete($jadwalId) {
        $this->selectJadwalId = $jadwalId;
    }

    public function deleteJadwal() {
        if($this->selectJadwalId == 0) {
            return;
        }

        $jadwal = Jadwal::findOrFail($this->selectJadwalId);
        $jadwal->delete();
        $this->selectJadwalId = 0;
        return redirect('/admin/jadwal')->with('success', 'Jadwal berhasil dihapus');
    }

    public function updateStatus($jadwalId) {
        $this->selectJadwalId = $jadwalId;
       
    }

    public function changeStatus1() {
        if($this->selectJadwalId == 0) {
            return;
        }

        $jadwal = Jadwal::findOrFail($this->selectJadwalId);
        $jadwal->status = 'proses';
        
        $pesananList = Pesanan::where('jadwal_id', $this->selectJadwalId)->get();
        foreach ($pesananList as $pesanan) {
            $pesanan->status_pesanan = 'proses';
            $pesanan->save();
            // dump($pesanan->status_pesanan);
        }

        
        $jadwal->save();

        // dump($this->selectJadwalId);
        // dump($pesanan->status_pesanan);
        return redirect('/admin/jadwal')->with('success', 'Status berhasil diperbarui');
    }

    public function changeStatus2() {
        if($this->selectJadwalId == 0) {
            return;
        }

        $jadwal = Jadwal::findOrFail($this->selectJadwalId);
        $jadwal->status = 'selesai';
        $jadwal->save();

        return redirect('/admin/jadwal')->with('success', 'Status berhasil diperbarui');
    }
}



