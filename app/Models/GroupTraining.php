<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupTraining extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'grouptraining_code',
        'description',
        'icon',
        'cover'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function sport()
    {
        return $this->belongsToMany(Sport::class, 'sport_has_train_group', 'sport_id', 'groupTraining_id');
    }

    public function training()
    {
        return $this->belongsToMany(Training::class, 'training_has_group', 'groupTraining_id', 'training_id');
    }

    public function exerciseSession()
    {
        return $this->belongsToMany(ExerciseSession::class, 'exe_ses_has_train_group', 'session_id', 'groupTraining_id');
    }
}
