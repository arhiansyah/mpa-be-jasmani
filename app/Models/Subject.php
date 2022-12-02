<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'subject_code',
        'category_id',
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
    public function curriculum()
    {
        return $this->belongsToMany(Curriculum::class, 'subject_has_curricula', 'curriculum_id', 'subject_id');
    }
    public function category_subject()
    {
        return $this->belongsTo(category_subject::class, 'category_id');
    }
    public function subRootScore()
    {
        return $this->hasMany(subroot_score::class);
    }

    public function modul()
    {
        return $this->hasMany(Modul::class);
    }

    public function session()
    {
        return $this->hasManyThrough(Session::class, Modul::class);
    }

    public function student_raport()
    {
        return $this->hasMany(student_raport::class);
    }

    public function student_accumulation()
    {
        return $this->hasMany(student_accumulation::class);
    }
}
