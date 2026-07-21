<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    protected $fillable = ['unit_id', 'title', 'content', 'order'];

    public function unit(): BelongsTo {
        return $this->belongsTo(Unit::class);
    }

    public function exercises(): HasMany {
        return $this->hasMany(Exercise::class);
    }
}
