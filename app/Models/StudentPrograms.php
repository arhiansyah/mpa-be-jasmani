<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPrograms extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'programs_id',
        'start_period',
        'end_period',
    ];

    public function program()
    {
        return $this->belongsTo(RunningProgram::class, 'programs_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
