<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'address',
        'phone_number',
        'email',
        'logo',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}