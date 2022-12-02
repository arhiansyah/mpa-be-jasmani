<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoryDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function runningProgram()
    {
        return $this->belongsToMany(RunningProgram::class, 'runpro_has_cdocs', 'category_document_id', 'running_program_id');
    }

    public function studentDocument()
    {
        return $this->hasMany(student_document::class);
    }
}
