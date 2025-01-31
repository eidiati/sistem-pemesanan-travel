<?php

namespace App\Livewire;

use App\Models\Jadwal;
use App\Models\Pesanan;
use Livewire\Component;
use App\Models\Kendaraan;

class DetailJadwal extends Component
{
    public $statuses = [
        'dijadwalkan' => 'Dijadwalkan',
        'proses' => 'Sedang Diproses',
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",
    ];

    public $jadwalId;
    public $asalId;
    public $tujuanId;
    public $kendaraan_id;
    public $selectPesananId;
    public $kursi;

    public function changeArmada($pesananId) {
        $this->selectPesananId = $pesananId;
        $pesan = Pesanan::findOrFail($pesananId);
        $this->jadwalId = $pesan->jadwal_id;
        $jadwal = Jadwal::findOrFail($this->jadwalId);
        $this->kendaraan_id = $jadwal->id;
        // dump($this->kendaraan_id);
        // dump($this->jadwalId);
        // dump($pesananId);
    }

    public function updateArmada() {
        if($this->kendaraan_id == 0) {
            return;
        }
        // dump($this->selectPesananId);
        
        $pesan = Pesanan::findOrFail($this->selectPesananId);
        // dump($this->kendaraan_id);
        
        //ambil jadwal
        $jadwalLama = Jadwal::findOrFail($pesan->jadwal_id);
        $jadwalBaru = Jadwal::findOrFail($this->kendaraan_id);

        // dump($jadwalLama);
        // dump($jadwalBaru);

        //ambil jumlah kursi
        $jumlahKursi = $pesan->kursi;
        // dump($jumlahKursi);

        //updatejadwallama
        $jadwalLama->kuota_terisi -= $jumlahKursi;
        if($jadwalLama->kuota_terisi < 0) {
            $jadwalLama->kuota_terisi = 0;
        }
        // dump($jadwalLama);
        $jadwalLama->save();

        //updataJadwalbaru
        $jadwalBaru->kuota_terisi += $jumlahKursi;
        if($jadwalBaru->kuota_terisi > $jadwalBaru->kuota) {
            session()->flash('error', 'Kuota sudah penuh. Silahkan pilih jadwal lain');
            return;
        }
        // dump($jadwalBaru->kuota_terisi);
        $jadwalBaru->save();

        //UpdatePesanan
        $pesan->jadwal_id = $this->kendaraan_id;
        $pesan->note = 'Anda telah dipindahkan ke armada lain. Silahkan cek Detail Pesanan';
        // dump($pesan->jadwal_id);
        $pesan->save();

        
        return redirect('/admin/jadwal/detail/'.$this->jadwalId.'')->with('success', 'Pesanan berhasil diperbarui');
    }

    public function mount($jadwalId) {
        $this->jadwalId = $jadwalId;

        // $data = Jadwal::find($jadwalId);
        // dump($jadwalId);
        $data = Jadwal::where('id', $jadwalId)->get();
        // dump($data);
        
       
        

        
    }

    public function render()
    {
        $data = Jadwal::find($this->jadwalId);
        if($data) {
            $asalId = $data->asal_id;
            $tujuanId = $data->tujuan_id;
            $tanggal = $data->tanggal;
            $jam = $data->jam;
        }
        $jadwal = Jadwal::where('status', '!=', 'selesai')
            ->where('asal_id', $asalId)
            ->where('tujuan_id', $tujuanId)
            ->where('tanggal', $tanggal)
            ->where('jam', $jam)
            ->get();
        $kendaraan = Kendaraan::all();
      
        
        $pesan = Pesanan::where('jadwal_id', $this->jadwalId)->paginate(5);
        $statuses = $this->statuses;
        return view('livewire.detail-jadwal', compact('pesan', 'statuses', 'jadwal'));
    }
}
