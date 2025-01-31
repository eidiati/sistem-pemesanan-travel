<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';
    protected $fillable = [
        'user_id',
        'no_sim', 
        'status', 
        'hire_date', 
    ];

    // public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Pastikan ini sesuai dengan namespace User
    }
    
    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'driver_id');
    }
    use HasFactory;
}
