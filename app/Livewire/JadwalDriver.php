<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Jadwal;
use Livewire\Component;
use App\Models\Kendaraan;

class JadwalDriver extends Component
{
    public $kendaraan_id;
    public function mount() {
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

        // $driver = Driver::all();
        return view('livewire.jadwal-driver', [
            $driver = Jadwal::query()->whereIn('kendaraan_id', $this->kendaraan_id)
                ->where('status', '!=', 'selesai')
                ->paginate(5),
            
        ], compact('driver'));
    }
}
