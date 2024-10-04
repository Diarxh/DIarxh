<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama',
        'Email',
        'No_Telp',
        'Nama_Sekolah',
        'Nuptk',
        'Foto',
        'Tanggal_Lahir',
        'Tempat_Lahir',
        'Alamat',
        'Desa',
        'Kecamatan',
        'Kabupaten',
        'Provinsi',
        'Pendidikan_Terakhir',
        'User_Id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_Id');
    }
}