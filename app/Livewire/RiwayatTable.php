<?php

namespace App\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatTable extends Component
{
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'penjemputan' => 'Dalam Penjemputan',
        'perjalanan' => 'Dalam Perjalanan',
        'istirahat' => 'Sedang Istirahat',
        'pengantaran' => "Dalam Pengantaran",
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];
    public $search = '';
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        $orders = Pesanan::query()
        ->whereHas('jadwal', function ($query) {
            $query->where('status', 'selesai'); // Filter jadwal dengan status tidak selesai
        })
        ->where(function ($query) {
            $query->where('status_bayar', 'LIKE', "%{$this->search}%")
            ->orWhereHas('asal', function ($q) {
                $q->where('nama_kota', 'LIKE', "%{$this->search}%");
            })
            ->orWhereHas('tujuan', function ($q) {
                $q->where('nama_kota', 'LIKE', "%{$this->search}%");
            })
            ->orWhereHas('user', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%");
            });
            
            // ->orWhereHas('kendaraan.driver.user', function ($q) {
            //     $q->where('name', 'LIKE', "%{$this->search}%");
            // });
        })
        ->paginate(5);
        // $orders = Pesanan::all();
        // $orders = Pesanan::where('status_pesanan', 'selesai')->get();
        return view('livewire.riwayat-table', compact('orders'));
    }
}
