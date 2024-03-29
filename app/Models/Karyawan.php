<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $guarded = [];


    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'id_jabatan');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'id_karyawan', 'id');
    }
}
