<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'perusahaan_id',
        'tipe_pelatihan_id',
        'tempat_pelatihan',
        'status',
        'user_id',
    ];

    public function tipe_pelatihan()
    {
        return $this->BelongsTo(TipePelatihan::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
