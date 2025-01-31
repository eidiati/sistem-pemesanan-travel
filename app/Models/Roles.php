<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    use HasFactory;

    protected $fillable = ['role_name'];


    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
