<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

}
