<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    protected $fillable = ['title', 'description', 'order'];
    
    
    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'unit_user')
                    ->withPivot('percentage')
                    ->withTimestamps();
    }
}
