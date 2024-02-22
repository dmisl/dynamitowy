<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'name',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

}
