<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id', 'classroom_id', 'day', 'lesson_number',
    ];

    public function subject(): HasOne
    {
        return $this->hasOne(Subject::class);
    }

    public function classroom() : BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

}
