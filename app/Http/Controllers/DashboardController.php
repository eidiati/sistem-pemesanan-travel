<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
   
    public function index()
    {
        $totalDriver = Driver::count();
        $totalKendaraan = Kendaraan::count();
        $totalRute = Rute::count();
        $totalPemesanan = Pesanan::count();
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ], compact('totalDriver', 'totalRute', 'totalKendaraan', 'totalPemesanan'));
    }

    public function user()
    {
        return view('user.home', [
            'title' => 'Home'
        ]);
    }
}
