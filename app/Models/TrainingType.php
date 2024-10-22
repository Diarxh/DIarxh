<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingType extends Model
{
    use HasFactory;

    protected $table = 'training_types';

    protected $fillable = [
        'trainer_type_name',
        'trainer_type_description',
        'photo',
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
