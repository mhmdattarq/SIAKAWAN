<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'd_karyawan';

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}