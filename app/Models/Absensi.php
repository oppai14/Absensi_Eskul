<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi'; // Nama tabel di database

    protected $fillable = ['nama', 'kelas']; // Kolom yang dapat diisi secara massal

    // Jika Anda tidak ingin menggunakan timestamp (created_at dan updated_at)
    public $timestamps = true; // Sesuaikan sesuai kebutuhan Anda

    // Jika Anda ingin menonaktifkan incrementing pada kolom id
    public $incrementing = true; // Sesuaikan sesuai kebutuhan Anda
}
