<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'curriculum_code',
        'is_active',
        'active_years',
        'icon',
        'cover',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'subject_has_curricula', 'curriculum_id', 'subject_id');
    }

    public function runningProgram()
    {
        return $this->hasMany(RunningProgram::class);
    }
}
