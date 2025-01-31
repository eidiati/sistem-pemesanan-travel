<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rute extends Model
{

    use HasFactory;

    protected $table = 'rute';  

    protected $fillable = [
        'nama_kota',
        'desc',
    ];
    
    public $timestamps = true;
}
