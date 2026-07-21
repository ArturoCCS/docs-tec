<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercise extends Model
{
    protected $fillable = ['lesson_id','title','order'];

    public function lesson(): BelongsTo {
        return $this->belongsTo(Lesson::class);
    }
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'exercise_user')
                    ->withPivot('completed', 'completed_at')
                    ->withTimestamps();
    }
}
