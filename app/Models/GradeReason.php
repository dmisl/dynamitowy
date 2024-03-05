<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradeReason extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'subject_id', 'classroom_id', 'date'
    ];

    public function classroom() : BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject() : BelongsTo
    {
        return $this->belongsTo(Subject::all());
    }

    public function grades() : HasMany
    {
        return $this->hasMany(Grade::class);
    }

}
