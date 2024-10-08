<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'companies'; // Menentukan nama tabel yang baru

    protected $fillable = [
        'company_name', // Mengganti 'Nama_Perusahaan' dengan 'company_name'
        'address', // Mengganti 'Alamat' dengan 'address'
        'phone_number', // Mengganti 'No_Telp' dengan 'phone_number'
        'email', // Mengganti 'Email' dengan 'email'
        'logo',
        'description',
        'user_id',
    ];
}