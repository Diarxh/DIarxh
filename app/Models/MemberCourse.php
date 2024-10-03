<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCourse extends Model
{
    use HasFactory;

    protected $fillable = ['pelatihan_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class); // Menghubungkan dengan model User

    }
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'user_id', 'id'); // Pastikan 'id' adalah primary key di tabel gurus
    }

}