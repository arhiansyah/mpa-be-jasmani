<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RunningProgram extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'running_program_code',
        'description',
        'program_study_id',
        'price',
        'period',
        'curriculum_id',
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

    public function academySchedule()
    {
        return $this->hasMany(AcademySchedule::class, 'runningprogram_id', 'id');
    }
    public function programStudy()
    {
        return $this->belongsTo(ProgramStudy::class, 'program_study_id');
    }

    public function discount()
    {
        return $this->hasMany(Discount::class);
    }

    public function studentsInPrograms()
    {
        return $this->hasMany(StudentPrograms::class);
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
    }

    public function categoryDocument()
    {
        return $this->belongsToMany(categoryDocument::class, 'runpro_has_cdocs', 'category_document_id', 'running_program_id');
    }

    public function trial()
    {
        return $this->hasMany(trial::class);
    }
}
