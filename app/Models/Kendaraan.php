<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'plat_nomor', 
        'merk', 
        'model',
        'status', 
    ];

    public $timestamps = true;

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id'); // Pastikan ini sesuai dengan namespace Driver
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kendaraan_id');
    }
}
