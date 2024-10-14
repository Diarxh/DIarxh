<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    //RELASI
    public function toko()
    {
        return $this->hasOne(Toko::class);
    }
}