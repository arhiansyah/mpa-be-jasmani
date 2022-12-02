<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseComposition extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'exercise_id',
        'level_id',
        'repetisi',
        'duration'
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
