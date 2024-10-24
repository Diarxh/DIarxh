<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'user_id',
        'status'

    ];

    /**
     * Get the user that owns the member course.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the teacher that owns the member course.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    public function guru()
    {
        return $this->belongsTo(Teacher::class, 'teachers_id'); // Pastikan 'guru_id' adalah kolom yang benar
    }
    /**
     * Get the training that owns the member course.
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}