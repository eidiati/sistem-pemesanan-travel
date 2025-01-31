<?php

namespace App\Livewire;

use App\Models\Jadwal;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatJadwal extends Component
{
    public $search = '';
    protected $queryString = ['search'];
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'proses' => 'Sedang Diproses',
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];
    use WithPagination;
    
    public function render()
    {
        $jadwal = Jadwal::query()
        ->where('status', 'selesai')
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
        ->paginate(5);

        $statuses = $this->statuses;

        return view('livewire.riwayat-jadwal', compact('jadwal', 'statuses'));
    }
}
