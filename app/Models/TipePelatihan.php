<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePelatihan extends Model
{
    use HasFactory;
    protected $table = 'training_types'; // Menentukan nama tabel yang baru

    protected $fillable = ['nama_tipe_pelatih', 'deskripsi_tipe_pelatih',];
}