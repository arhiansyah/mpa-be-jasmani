<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'training_code',
        'description',
        'video_intro'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    // public function video()
    // {
    //     return $this->belongsTo(video::class, 'video_intro');
    // }

    public function exercise()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_has_training', 'training_id', 'exercise_id');
    }

    public function trainingGroup()
    {
        return $this->belongsToMany(TrainingGroup::class, 'training_has_group', 'training_id', 'trainGroup_id');
    }
}
