<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePelatihan extends Model
{
    use HasFactory;
    protected $table = 'training_types'; // Menentukan nama tabel yang baru

    protected $fillable = ['trainer_type_name', 'trainer_type_description', 'photo',];
    public function pelatihans()
    {
        return $this->hasMany(Pelatihan::class, 'training_type_id');
    }
    public function tipe_pelatihan()
    {
        return $this->belongsTo(TipePelatihan::class, 'training_type_id');
    }
}