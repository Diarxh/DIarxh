<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['Nama', 'Nama_Sekolah', 'Email', 'Tanggal_Lahir', 'Tempat_Lahir', 'No_Tepl', 'Pendidikan_Terakhir', 'Alamat', 'Nuptk', 'Desa', 'Foto', 'Kecamatan', 'Kabupaten', 'Provinsi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}