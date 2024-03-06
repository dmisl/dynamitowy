<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'lesson_id', 'classroom_id', 'user_id', 'presence_type_id', 'lesson_number'
    ];

    public function classroom() : BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function lesson() : BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function presenceType() : BelongsTo
    {
        return $this->belongsTo(PresenceType::class);
    }

}
