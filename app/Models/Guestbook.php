<?php

// Portfolio/app/Models/Guestbook.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 
        'nomor_telepon', 
        'email', 
        'nama_perusahaan', 
        'alamat_perusahaan', 
        'personal_bidang', 
        'tujuan'
    ];
}

