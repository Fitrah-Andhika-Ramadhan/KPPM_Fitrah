<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanInformasi extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_ktp',
        'no_hp',
        'alamat',
        'nama_informasi',
        'tujuan',
        'upload_ktp',
        'cara_mendapatkan',
        'cara_memberikan',
    ];

    // Your other model code...
}
