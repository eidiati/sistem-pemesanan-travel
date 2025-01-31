<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemesananController;
use App\Http\Middleware\RoleMiddleware;

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
    
});
Route::post('/logout', [LoginController::class, 'logout'])->middleware('role:1,2,3,4')->name('logout');

Route::middleware(['auth', 'role:1'])->group(function () {
    //Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/rute', [RouteController::class, 'index'])->name('admin.rute');
    Route::post('/admin/rute/create', [RouteController::class, 'create'])->name('admin.rute.create');
    Route::get('/admin/driver', [DriverController::class, 'index'])->name('admin.driver');
    Route::post('/admin/driver/store', [DriverController::class, 'store'])->name('admin.driver.create');
    Route::get('/admin/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');
    Route::post('/admin/kendaraan/create', [KendaraanController::class, 'create'])->name('admin.kendaraan.create');
    Route::get('/admin/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal');
    Route::get('/admin/jadwal/detail/{id}', [JadwalController::class, 'detail'])->name('admin.jadwal.detail');
    Route::get('/admin/jadwal/getArmada', [JadwalController::class, 'getArmada'])->name('admin.jadwal.getArmada');
    Route::post('/admin/jadwal/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
    Route::get('/admin/riwayat-jadwal', [JadwalController::class, 'riwayat'])->name('admin.riwayat-jadwal');
    Route::get('/admin/riwayat-jadwal/detail/{id}', [JadwalController::class, 'detail'])->name('admin.riwayat-jadwal.detail');
    Route::get('/admin/pemesanan', [PemesananController::class, 'index'])->name('admin.pemesanan');
    Route::post('/admin/jadwal/update/{id}', [JadwalController::class, 'changeStatus1'])->name('admin.jadwal.update');
    Route::post('/admin/jadwal/update2/{id}', [JadwalController::class, 'changeStatus2'])->name('admin.jadwal.update2');
    Route::get('/admin/riwayat-pesanan', [PemesananController::class, 'riwayatAdmin'])->name('admin.riwayat');
    Route::get('/admin/laporan', [PemesananController::class, 'laporan'])->name('admin.laporan');
    Route::post('/admin/cetak', [PemesananController::class, 'cetakLaporan'])->name('admin.cetak');
    
});

Route::middleware(['auth','role:2'])->group(function () {
    Route::get('/driver/dashboard', [DashboardController::class, 'user'])->name('dashboard');
    Route::get('/driver/jadwal', [JadwalController::class, 'user'])->name('driver.jadwal');
    Route::get('/driver/data-penumpang', [PemesananController::class, 'penumpang'])->name('driver.penumpang');
    Route::post('/driver/data-penumpang/{id}/update-status1', [PemesananController::class, 'updateStatus1'])->name('update.status1');
    Route::post('/driver/data-penumpang/{id}/update-status2', [PemesananController::class, 'updateStatus2'])->name('update.status2');
    Route::get('/driver/riwayat', [JadwalController::class, 'riwayatDriver'])->name('driver.riwayat');
    Route::post('/driver/data-penumpang/lunas/{id}', [PemesananController::class, 'lunas'])->name('driver.lunas');
});


Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/home', [DashboardController::class, 'user'])->name('home');
    Route::get('/jadwal', [JadwalController::class, 'user'])->name('jadwal');
    Route::get('/pesan-travel', [PemesananController::class, 'user'])->name('pesan-travel');
    Route::get('/riwayat/{id}', [PemesananController::class, 'riwayat'])->name('riwayat');
    Route::get('/jadwal_id/{asalId}/{tujuanId}', [PemesananController::class, 'getSchedules'])->name('get.schedules');
    Route::get('/kuota/{id}', [PemesananController::class, 'kuota'])->name('kuota');
    Route::get('/total/{id}', [PemesananController::class, 'total'])->name('total');
    Route::post('pesan-travel/create', [PemesananController::class, 'create'])->name('pesan-travel.create');
    Route::get('pesan-aktif/{id}', [PemesananController::class, 'pesanAktif'])->name('pesan-aktif');
    Route::post('pesan-aktif/{id}/bukti-bayar', [PemesananController::class, 'buktiBayar'])->name('bukti-bayar');
    
});

Route::middleware(['auth', 'role:4'])->group(function () {
    //Owner 
    Route::get('/owner/dashboard', [DashboardController::class, 'index'])->name('owner.dashboard');
    Route::get('/owner/rute', [RouteController::class, 'index'])->name('owner.rute');
    Route::get('/owner/driver', [DriverController::class, 'index'])->name('owner.driver');
    Route::get('/owner/kendaraan', [KendaraanController::class, 'index'])->name('owner.kendaraan');
    Route::get('/owner/jadwal', [JadwalController::class, 'user'])->name('owner.jadwal');
    Route::get('/owner/jadwal/detail/{id}', [JadwalController::class, 'detail'])->name('owner.jadwal.detail');
    Route::get('/owner/jadwal/detail-pesanan/{id}', [PemesananController::class, 'detail'])->name('owner.jadwal.detail.pesanan');
    Route::get('/owner/riwayat-jadwal', [JadwalController::class, 'riwayat'])->name('owner.riwayat-jadwal');
    Route::get('/owner/riwayat-jadwal/detail/{id}', [JadwalController::class, 'detail'])->name('owner.riwayat-jadwal.detail');
    Route::get('/owner/pemesanan', [PemesananController::class, 'index'])->name('owner.pemesanan');
    Route::get('/owner/pemesanan/detail/{id}', [PemesananController::class, 'detail'])->name('owner.pesanan.detail');
    Route::get('/owner/riwayat-pesanan', [PemesananController::class, 'riwayatAdmin'])->name('owner.riwayat');
    Route::get('/owner/riwayat-pesanan/detail/{id}', [PemesananController::class, 'detail'])->name('owner.riwayat.detail');
    Route::get('/owner/laporan', [PemesananController::class, 'laporan'])->name('owner.laporan');
    Route::post('/owner/cetak', [PemesananController::class, 'cetakLaporan'])->name('owner.cetak');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/detail-pesanan/{id}', [PemesananController::class, 'detail'])->name('detail.pesanan'); 


});

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->id_role == 1) {
            return redirect('/admin/dashboard');
        } else if (auth()->user()->id_role == 2) {
            return redirect('/driver/dashboard');
        } else if (auth()->user()->id_role == 3) {
            return redirect('/home');
        } else if (auth()->user()->id_role == 4) {
            return redirect('/owner/dashboard');
        }
         // Arahkan ke halaman home jika sudah login
    }
    return redirect('/login'); // Arahkan ke login jika belum login
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




Route::get('/profil', function () {
    return view('profil', 
    ['title' => 'Profil']);
});

