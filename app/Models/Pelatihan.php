<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'trainings'; // Menunjukkan bahwa model ini merujuk ke tabel 'trainings'

    protected $fillable = [
        'name',
        'description',
        'requirements',
        'start_date',
        'end_date',
        'registration_start_date',
        'registration_end_date',
        'company_id',
        'training_type_id',
        'training_location',
        'status',
        'user_id',
    ];

    // Relasi dengan model Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'company_id');
    }

    // Relasi dengan model TipePelatihan
    public function tipePelatihan()
    {
        return $this->belongsTo(TipePelatihan::class, 'training_type_id');
    }
    public function peserta()
    {
        return $this->hasMany(MemberCourse::class, 'pelatihan_id');
    }
    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'training_id', 'id');
    }


}