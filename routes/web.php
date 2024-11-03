<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard', 
    ['title' => 'Dashboard']);
});

Route::get('/pemesanan', function () {
    return view('admin/pemesanan', 
    ['title' => 'Pemesanan']);
});

Route::get('/rute', function () {
    return view('admin/rute', 
    ['title' => 'Rute']);
});

Route::get('/kendaraan', function () {
    return view('admin/kendaraan', 
    ['title' => 'Kendaraan']);
});

Route::get('/driver', function () {
    return view('admin/driver', 
    ['title' => 'Driver']);
});

Route::get('/jadwal', function () {
    return view('admin/jadwal', 
    ['title' => 'Jadwal']);
});

Route::get('/home', function () {
    return view('home', 
    ['title' => 'Beranda']);
});

Route::get('/order', function () {
    return view('order', 
    ['title' => 'Pesan Travel']);
});

Route::get('/profil', function () {
    return view('profil', 
    ['title' => 'Profil']);
});

Route::get('/datapenumpang', function () {
    return view('datapenumpang');
});

Route::get('/detailorder', function () {
    return view('detailorder');
});

Route::get('/riwayat', function () {
    return view('riwayat', 
    ['title' => 'Riwayat Pemesanan']);
});
Route::get('/detailriwayat', function () {
    return view('detailriwayat');
});