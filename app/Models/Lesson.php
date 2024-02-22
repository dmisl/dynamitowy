<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'lesson_day_id', 'subject_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function subject(): HasOne
    {
        return $this->hasOne(Subject::class);
    }

    public function lessonDay(): BelongsToMany
    {
        return $this->belongsToMany(LessonDay::class);
    }

}
