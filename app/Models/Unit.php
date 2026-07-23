<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $fillable = ['title', 'description', 'order'];

    public function lessons(): HasMany{
        return $this->hasMany(Lesson::class);
    }
}
