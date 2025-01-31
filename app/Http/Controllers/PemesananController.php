<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rute;
use App\Models\User;
use App\Models\Driver;
use App\Models\Jadwal;
// use Illuminate\Container\Attributes\Auth;
use App\Models\Pesanan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class PemesananController extends Controller
{
    public $search;
    public $statuses = [
        '' => 'Menunggu',
        'dijadwalkan' => 'Dijadwalkan',
        'penjemputan' => 'Dalam Penjemputan',
        'proses' => 'Dalam Perjalanan',
        'istirahat' => 'Sedang Istirahat',
        'pengantaran' => "Dalam Pengantaran",
        'selesai' => "Selesai",
        'batal' => "Dibatalkan",

    ];

    public function mount($search = null)
    {
        $this->search = $search ?? '';
    }

    public $metodeBayars = [
        'transfer' => "Transfer",
        'cash' => 'Cash/Tunai',
    ];

    public $selectId;

    public function index()
    {
        $orders = Pesanan::all();
        $aktif = Pesanan::where('status_pesanan', '!=', 'selesai')->get();
        return view('admin.pemesanan', [
            'title' => 'Pemesanan',

        ], compact('orders', 'aktif'));
    }

    public function user()
    {
        $rute = Rute::all();
        $jadwals = Jadwal::all();
        $user = Auth::user();
        return view('user.order', [
            'title' => 'Pemesanan',
        ], compact('rute', 'jadwals', 'user'));
    }

    public function riwayat()
    {
        $selectId = Auth::id();
        $pesanan = Pesanan::where('user_id', $selectId)->paginate(5);
        $status = $this->statuses;
        return view('user.riwayat', [
            'title' => 'Riwayat Pemesanan',
        ], compact('pesanan', 'status'));
    }

    public function pesanAktif()
    {
        // $pesan = Pesanan::all();
        $userId = Auth::id();
        // dd($userId);
        $pesanAktif = Pesanan::where('user_id', $userId)->get();
        // dd($pesanAktif);
        $pesan = $pesanAktif->where('status_pesanan', '!=', 'selesai');

        $statuses = $this->statuses;
        return view('user.pesanaktif', [
            'title' => 'Pesanan Aktif',
        ], compact('pesan', 'statuses'));
    }

    public function create(Request $request)
    {
        try {
            // dd($request->all());
            $validatedData = $request->validate([
                // 'user_id' => 'required',
                'asal_id' => 'required',
                'alamat_jemput' => 'required',
                'tujuan_id' => 'required',
                'alamat_tujuan' => 'required',
                'jadwal_id' => 'required',
                'no_hp' => 'required',
                'metode_bayar' => 'required',
                'harga' => 'required',
                'kursi' => 'required',

            ]);

            $userId = Auth::id();
            $harga = preg_replace('/[^\d]/', '', $request->harga);

            $date = Carbon::now()->format('dmY');
            $lastOrder = Pesanan::whereDate('created_at', Carbon::today())->count();
            $increment = str_pad($lastOrder + 1, 3, '0', STR_PAD_LEFT);

            $kodePesan = "BMP-{$date}-{$increment}";

            $jadwal = Jadwal::find($validatedData['jadwal_id']);
            if ($jadwal->kuota_terisi >= $jadwal->kuota) {
                return back()->with('error', 'Kuota Penuh');
            }

            Pesanan::create([
                'user_id' => $userId,
                'kode_pemesanan' => $kodePesan,
                'asal_id' => $validatedData['asal_id'],
                'alamat_jemput' => $validatedData['alamat_jemput'],
                'tujuan_id' => $validatedData['tujuan_id'],
                'alamat_tujuan' => $validatedData['alamat_tujuan'],
                'jadwal_id' => $validatedData['jadwal_id'],
                'kursi' => $validatedData['kursi'],
                'no_hp' => $validatedData['no_hp'],
                'metode_bayar' => $validatedData['metode_bayar'],
                'harga' => $harga,
                'bayar' => $harga,
                'status_bayar' => 'Belum Lunas',
                'status_pesanan' => 'dijadwalkan',
            ]);

            $kuota_update = $validatedData['kursi'];

            $jadwal->kuota_terisi += $kuota_update;
            $jadwal->save();

            return redirect('/pesan-aktif/{id}')->with('success', 'Travel Berhasil Dipesan');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        // $request->validate();
        // dd('Registrasi berhasil');


    }

    public function getSchedules($asalId, $tujuanId)
    {
        $schedules = Jadwal::with('kendaraan')->where('asal_id', $asalId)->where('tujuan_id', $tujuanId)->get();
        return response()->json($schedules);
    }

    public function kuota($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id);
            $totalKuota = $jadwal->kuota;
            $kuotaTerisi = $jadwal->kuota_terisi;

            $sisaKuota = $totalKuota - $kuotaTerisi;

            return response()->json($sisaKuota, 200);
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error in kuota controller: ' . $e->getMessage());
            return response()->json(['error' => 'Data tidak ditemukan atau terjadi kesalahan'], 500);
        }
    }

    public function total($id)
    {
        $jadwal = Jadwal::find($id);
        $total = $jadwal->harga;
        return response()->json($total);
    }

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);
        $bukti = $pesanan->bukti_bayar;
        $statuses = $this->statuses;
        return view('user.detailorder', [
            'title' => 'Detail Pesanan',
        ], compact('pesanan', 'statuses', 'bukti'));
    }

    public function editStatus($id)
    {
        $pesanan = Pesanan::find($id);
    }

    public function buktiBayar(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'file.required' => 'File bukti bayar harus diunggah.',
            'file.image' => 'File bukti bayar harus berupa gambar.',
            'file.mimes' => 'Format file bukti bayar harus jpeg, png, atau jpg.',
            'file.max' => 'Ukuran file bukti bayar maksimal 2MB.',
        ]);

        $pesanan = Pesanan::find($id);

        if ($request->hasFile('file')) {
            // Simpan file
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bukti_bayar'), $filename);

            // Update pesanan
            $pesanan->bukti_bayar = $filename;
            $pesanan->status_bayar = 'Sedang Diverifikasi';
            $pesanan->save();
        }

        return redirect()->back()->with('success', 'Bukti bayar berhasil diupload.');
    }

    public function penumpang(Request $request)
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
        
        $query = $request->input('query');
        
        // Ambil daftar ID jadwal
        $jadwalId = $jadwal->pluck('id');
        
        // Query pesanan berdasarkan jadwal
        // $data = Pesanan::whereIn('jadwal_id', $jadwalId) // Gunakan whereIn untuk array
        //     ->where('status_pesanan', '!=', 'selesai')
        //     ->when($request->keyword, function ($query) use ($request) {
        //         $query->where('nama_penumpang', 'like', '%' . $request->keyword . '%');
        //     })
        //     ->paginate(10);

        $data = Pesanan::whereIn('jadwal_id', $jadwalId) // Gunakan whereIn untuk array
            ->where('status_pesanan', '!=', 'selesai')
            ->when($request->keyword, function ($query) use ($request) {
                $query->WhereHas('user', function ($q) use ($request) {
                    $q->where('name', 'LIKE', "%". $request->keyword . "%");
                });
            })
            ->paginate(10);
            // ->appends(['keyword' => $request->keyword]);
                
        // Debug untuk memeriksa hasil
        // dd($data);

        // dump($data);
        $statuses = $this->statuses;
        $metodeBayars = $this->metodeBayars;
        // dd($dataPesanan);
        return view('user.datapenumpang', [
            'title' => 'Data Penumpang',
            'keyword' => $request->keyword,
            'data' => $data,
        ], compact('data', 'statuses', 'metodeBayars'));
    }

    public function changeEdit($id)
    {
        $this->selectId = $id;
    }

    public function changeStatus($id) {
        $pesanan = Pesanan::with('user')->find($id);
        dump($pesanan);
        // $selectId = $this->selectId;
        return view(compact('pesanan'));
    }

    public function lunas($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status_bayar = 'Lunas';
        $pesanan->save();

        return redirect('/driver/data-penumpang')->with('success', 'Pembayaran telah disetujui');
    }

    public function riwayatAdmin(Request $request)
    {
        $pesanan = Pesanan::all();
        $statuses = $this->statuses;
        $metodeBayars = $this->metodeBayars;

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('pdf.pesanan', ['pesanan' => $pesanan]);
            return $pdf->stream('data-pesanan.pdf');
        }

        return view('admin.riwayatorder', [
            'title' => 'Riwayat Pesanan'
        ], compact('pesanan', 'statuses', 'metodeBayars'));
    }

    public function laporan(Request $request)
    {
        
        return view('admin.laporan', [
            'title' => 'Laporan Penjualan'
        ]);
    }

    public function cetakLaporan(Request $request)
    {
        try {
            $request->validate([
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
            ]);
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            
            // $data = DB::table('orders')
            //     ->join('jadwal', 'orders.jadwal_id', '=', 'jadwal.id')
            //     ->whereBetween('jadwal.tanggal', [
            //         $startDate,
            //         $endDate,
            //     ])
            //     ->select('orders.*', 'jadwal.tanggal')
            //     ->get();

            $data = Pesanan::getOrdersByDateRange($startDate, $endDate);
            $total = $data->sum('harga');

            if ($request->get('export') == 'pdf') {
                $pdf = Pdf::loadView('pdf.pesanan', ['data' => $data], ['startDate' => $startDate, 'endDate' => $endDate, 'total'=> $total]);
                return $pdf->stream('data-pesanan.pdf');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        // return compact('data');

        // return view('admin.laporan', compact('pesanan'));
        // $custom = $data->whereBetween('')
    }

}
