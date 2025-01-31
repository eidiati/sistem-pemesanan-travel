<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal',
        'jam',
        'harga',
        'asal_id',
        'tujuan_id',
        // 'driver_id',
        'kendaraan_id',
        'kuota',
        'status',
    ];

    public $timestamps = true;
    use HasFactory;

    public function asal()
    {
        return $this->belongsTo(Rute::class, 'asal_id');
    }

    public function tujuan() 
    {
        return $this->belongsTo(Rute::class, 'tujuan_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Pesanan::class, 'jadwal_id');
    }

}
