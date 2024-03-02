<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'teacher_id'
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function lessons() : HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function presences() : HasMany
    {
        return $this->hasMany(Presence::class);
    }

}
