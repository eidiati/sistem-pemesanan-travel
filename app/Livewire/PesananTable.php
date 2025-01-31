<?php

namespace App\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use Livewire\WithPagination;

class PesananTable extends Component
{
    public $bukti;
    public $statusBayar;
    public $selectId;
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'penjemputan' => 'Dalam Penjemputan',
        'proses' => 'Dalam Perjalanan',
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
        $pesanan = Pesanan::query()
        ->whereHas('jadwal', function ($query) {
            $query->where('status', '!=', 'selesai'); // Filter jadwal dengan status tidak selesai
        })
        ->where(function ($query) {
            $query->where('status_bayar', 'LIKE', "%{$this->search}%")
            ->orWhere('status_pesanan', 'LIKE', "%{$this->search}%")
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
        return view('livewire.pesanan-table', [
            // $orders = Pesanan::all(),
            // $aktif = Pesanan::where('status_pesanan', '!=', 'selesai')->get(),
        ], compact('pesanan'));
    }

    public function changeEdit($id) {
        $pesanan = Pesanan::find($id);
        $this->bukti = $pesanan->bukti_bayar;
        $this->statusBayar = $pesanan->status_bayar;
        $this->selectId = $pesanan->id;
        
    }

    public function updateStatus() {
        $pesanan = Pesanan::find($this->selectId);
        $pesanan->status_bayar = 'Lunas';
        $pesanan->save();

        return redirect('/admin/pemesanan')->with('success', 'Pembayaran telah disetujui');
    }

    public function changeDelete($id) {
        $this->selectId = $id;
    }
    
    public function deleteOrder() {
        $pesanan = Pesanan::find($this->selectId);
        $pesanan->delete();
        $this->selectId = 0;
        return redirect('/admin/pemesanan')->with('success', 'Pesanan telah dihapus');
    }

    public function tolak() {
        $pesanan = Pesanan::find($this->selectId);
        $pesanan->status_bayar = 'Belum Lunas (Ditolak)';
        $pesanan->bukti_bayar = null;
        $pesanan->save();
        // $this->selectId = 0;
        return redirect('/admin/pemesanan')->with('success', 'Pembayaran Ditolak');
    }
}
