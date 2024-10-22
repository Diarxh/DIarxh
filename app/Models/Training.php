<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';

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
        'photo',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function trainingType()
    {
        return $this->belongsTo(TrainingType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}