<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class d_absensi_hari_ini extends Model
{
    protected $table = 'd_absensi_hari_ini';

    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'status_masuk',
        'status_pulang',
        'lat_masuk',
        'lng_masuk',
        'lat_pulang',
        'lng_pulang',
    ];
}