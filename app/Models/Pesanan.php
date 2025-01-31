<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{

    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'kode_pemesanan',
        'asal_id',
        'alamat_jemput',
        'tujuan_id',
        'alamat_tujuan',
        'jadwal_id',
        'kursi',
        'no_hp',
        'metode_bayar',
        'harga',
        'bayar',
        'status_bayar',
        'bukti_bayar',
        'status_pesanan',
        'note',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function asal()
    {
        return $this->belongsTo(Rute::class, 'asal_id');
    }

    public function tujuan() 
    {
        return $this->belongsTo(Rute::class, 'tujuan_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
    
    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public static function getOrdersByDateRange($startDate, $endDate)
    {
        return self::join('jadwal', 'orders.jadwal_id', '=', 'jadwal.id')
            ->whereBetween('jadwal.tanggal', [$startDate, $endDate])
            ->select('orders.*', 'jadwal.tanggal')
            ->get();
    }

}
