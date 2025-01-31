<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;
// use App\Models\User;

class DriverTable extends Component
{
    public $driver;    
    public $selectDriverId;
    public $namaDriver;
    public $noSIM;
    public $noHp;
    public $email;
    public $gender;
    public $hireDate;
    public $status;
    public $search = '';
    protected $queryString = ['search'];
    use WithPagination; 


    public function mount()
    {
        // Mengambil semua driver saat komponen dimuat
        $this->driver = Driver::with('user')->get();
    }
    
    public function updatingSearch()
    {
        // Reset halaman ke awal saat pencarian dilakukan
        $this->resetPage();
    }

    public function render()
    {
        $drivers = Driver::with(['user'])
        ->where(function ($query) {
            $query->where('status', 'LIKE', "%{$this->search}%")
            ->orWhere('hire_date', 'LIKE', "%{$this->search}%")
            ->orWhereHas('user', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%");
            });    
        })
        ->orderBy('hire_date', 'asc')
        ->paginate(5);
        // dd($driver);
        
        return view('livewire.driver-table', compact('drivers'));
    }

    public function changeEdit($driverId) {    
        $driver = Driver::with('user')->findOrFail($driverId);
        $this->selectDriverId = $driverId;
        $this->namaDriver = $driver->user->name;
        $this->noSIM = $driver->no_sim;
        $this->noHp = $driver->user->no_hp;
        $this->email = $driver->user->email;
        $this->gender = $driver->user->gender;
        $this->hireDate = $driver->hire_date;
        $this->status = $driver->status;
        // dd($this->selectRuteId, $this->namaRute, $this->descRute);
        // dd($this->namaDriver, $this->noSIM, $this->noHp, $this->email, $this->gender, $this->hireDate, $this->status);
    }

    public function editDriver() {
        if($this->selectDriverId == 0) {
            return;
        }
            $driver = Driver::findOrFail($this->selectDriverId);
            
            //Update Data User
            $user = $driver->user;
            $user->name = $this->namaDriver;
            $user->email = $this->email;
            $user->gender = $this->gender;
            $user->no_hp = $this->noHp;
    
            //Simpan data user
            $user->save();
    
            //Update data driver
            $driver->no_sim = $this->noSIM;
            $driver->hire_date = $this->hireDate;
            $driver->status = $this->status;
    
            //Simpan data driver
            $driver->save();
            return redirect('/admin/driver')->with('success', 'Data Driver berhasil diperbarui');
        

        

        // return redirect('/rute/edit/'.$this->selectRuteId);
        //kembali ke halaman driver
    }

    public function changeDelete($driverId) {
        $this->selectDriverId = $driverId;
    }

    public function deleteDriver() {
        if($this->selectDriverId == 0) {
            return;
        }

        $rute = Driver::findOrFail($this->selectDriverId);
        $rute->delete();
        $this->selectDriverId = 0;
        return redirect('/admin/driver')->with('success', 'Driver berhasil dihapus');
    }
}
