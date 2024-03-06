<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PresenceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'desc'
    ];

    public function presence() : HasMany
    {
        return $this->hasMany(Presence::class);
    }

}
