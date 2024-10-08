<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'teachers'; // Menentukan nama tabel yang baru

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


    public function user()
    {
        return $this->belongsTo(User::class, 'User_Id');
    }
}