<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'exam_id',
        'question_id',
        'option_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function question()
    {
        return $this->belongsTo(question::class, 'question_id');
    }

    public function option()
    {
        return $this->belongsTo(option::class, 'option_id');
    }

    public function exam()
    {
        return $this->belongsTo(exam::class, 'exam_id');
    }
}
