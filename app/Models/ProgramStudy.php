<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class ProgramStudy extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'program_code',
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

    public function discount()
    {
        return $this->hasMany(Discount::class);
    }
    public function runningProgram()
    {
        return $this->hasMany(RunningProgram::class);
    }

    public function documents()
    {
        return $this->belongsToMany(CategoryDocument::class, 'program_has_documents', 'program_id', 'category_document_id');
    }
}
