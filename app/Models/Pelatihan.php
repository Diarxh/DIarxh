<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'persyaratan',
        'tanggal_mulai',
        'tanggal_akhir',
        'tanggal_pendaftaran',
        'tanggal_akhir_pendaftaran',
        'id_perusahaan',
        'tipe_id',
        'tempat_pelatihan',
        'status',
    ];
}
