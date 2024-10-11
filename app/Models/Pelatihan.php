<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'trainings'; // Menentukan nama tabel yang baru

    protected $fillable = [
        'name', // Mengganti 'nama' dengan 'name'
        'description', // Mengganti 'deskripsi' dengan 'description'
        'requirements', // Mengganti 'persyaratan' dengan 'requirements'
        'start_date', // Mengganti 'tanggal_mulai' dengan 'start_date'
        'end_date', // Mengganti 'tanggal_akhir' dengan 'end_date'
        'registration_start_date', // Mengganti 'tanggal_pendaftaran' dengan 'registration_start_date'
        'registration_end_date', // Mengganti 'tanggal_akhir_pendaftaran' dengan 'registration_end_date'
        'company_id', // Mengganti 'perusahaan_id' dengan 'company_id'
        'training_type_id', // Mengganti 'tipe_pelatihan_id' dengan 'training_type_id'
        'training_location', // Mengganti 'tempat_pelatihan' dengan 'training_location'
        'status',
        'user_id',
    ];



    public function tipe_pelatihan()
    {
        return $this->BelongsTo(TipePelatihan::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'company_id');
    }
}