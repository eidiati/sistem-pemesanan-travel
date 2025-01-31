<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use App\Models\Kendaraan;
use Livewire\WithPagination;

class KendaraanTable extends Component
{
    public $kendaraan;
    public $driver;
    // public $drivers=[];
    public $selectKendaraanId;
    public $merk;  
    public $model;
    public $plat_nomor;
    public $status;
    public $statuses = [
        'tersedia' => 'Tersedia',
        'tidak_aktif' => 'Tidak Aktif',
        'perbaikan' => 'Dalam Perbaikan',
        'rusak' => "Rusak",
    ];
    public $search = '';
    protected $queryString = ['search'];
    use WithPagination;


    public function render()
    {
        $kendaraans = Kendaraan::with(['driver.user'])
        ->where(function ($query) {
            $query->where('merk', 'LIKE', "%{$this->search}%")
            ->orWhere('model', 'LIKE', "%{$this->search}%")
            ->orWhere('plat_nomor', 'LIKE', "%{$this->search}%")
            ->orWhere('status', 'LIKE', "%{$this->search}%")
            ->orWhereHas('driver.user', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%");
            });
            
        })
        ->paginate(5);
        return view('livewire.kendaraan-table', [
            'statuses' => $this->statuses,
            $drivers = Driver::all(),
        ], compact('kendaraans', 'drivers'));
    }

    public function changeEdit($kendaraanId) {    
        $kendaraan = Kendaraan::with('driver.user')->findOrFail($kendaraanId);
        
        
        $this->selectKendaraanId = $kendaraanId;
        $this->merk = $kendaraan->merk;
        $this->model = $kendaraan->model;
        $this->plat_nomor = $kendaraan->plat_nomor;
        $this->driver = $kendaraan->driver_id;
        $this->status = $kendaraan->status;
        

        // dd($this->selectRuteId, $this->namaRute, $this->descRute);
        // dd($this->merk, $this->model, $this->plat_nomor, $this->driver, $this->status, $this->hireDate, $this->status);
    }

    public function editKendaraan() {
        if($this->selectKendaraanId == 0) {
            return;
        }
        $kendaraan = Kendaraan::findOrFail($this->selectKendaraanId);

        //Update data kendaraan
        $kendaraan->merk = $this->merk;
        $kendaraan->model = $this->model;
        $kendaraan->plat_nomor = $this->plat_nomor;
        $kendaraan->driver_id = $this->driver;
        $kendaraan->status = $this->status;

        //Simpan data kendaraan
        $kendaraan->save();

        return redirect('/admin/kendaraan')->with('success', 'Data Kendaraan berhasil diperbarui');
    

    

        // return redirect('/rute/edit/'.$this->selectRuteId);
        //kembali ke halaman driver
    }

    public function changeDelete($kendaraanId) {
        $this->selectKendaraanId = $kendaraanId;
    }

    public function deleteKendaraan() {
        if($this->selectKendaraanId == 0) {
            return;
        }

        $rute = Kendaraan::findOrFail($this->selectKendaraanId);
        $rute->delete();
        $this->selectKendaraanId = 0;
        return redirect('/admin/kendaraan')->with('success', 'Kendaraan berhasil dihapus');
    }
}
