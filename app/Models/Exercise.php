<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'exercise_code',
        'description',
        'measurement',
        'video',
        'icon',
        'cover',
        'animation'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function exerciseComposition()
    {
        return $this->hasMany(ExerciseComposition::class);
    }



    // public function category()
    // {
    //     return $this->belongsTo(CategoryExercise::class);
    // }

    public function training()
    {
        return $this->belongsToMany(Training::class, 'exercise_has_training', 'exercise_id', 'training_id');
    }
}
