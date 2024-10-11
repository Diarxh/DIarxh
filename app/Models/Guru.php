<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'teachers'; // Menentukan nama tabel yang baru

    protected $fillable = [
        'name',            // Nama
        'email',           // Email
        'phone_number',    // No_Telp
        'school_name',     // Nama_Sekolah
        'nuptk',           // Nuptk
        'photo',           // Foto
        'birth_date',      // Tanggal_Lahir
        'birth_place',     // Tempat_Lahir
        'address',         // Alamat
        'village',         // Desa
        'district',        // Kecamatan
        'city',            // Kabupaten
        'province',        // Provinsi
        'last_education',  // Pendidikan_Terakhir
        'user_id',         // User_Id
        'about',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'User_Id');
    }
}