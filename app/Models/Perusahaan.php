<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'companies'; // Menentukan nama tabel yang baru

    protected $fillable = ['Nama_Perusahaan', 'Alamat', 'No_Telp', 'Email', 'logo', 'description', 'user_id'];
}