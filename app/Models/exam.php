<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'exam_code',
        'exam_type_id',
        'question_qty',
        // 'max_attempt',
        'total_duration',
        // 'tag'
    ];

    public function academySchedule()
    {
        return $this->hasMany(AcademySchedule::class);
    }

    public function exam_type()
    {
        return $this->belongsTo(exam_type::class, 'exam_type_id');
    }

    public function schedule_has_exam()
    {
        return $this->hasMany(schedule_has_exam::class);
    }

    public function quiz()
    {
        return $this->hasMany(quiz::class);
    }

    public function question()
    {
        return $this->belongsToMany(question::class, 'exam_has_questions', 'exam_id', 'question_id');
    }

    public function student_grade()
    {
        return $this->hasMany(Student_grade::class);
    }

    public function student_answer()
    {
        return $this->hasMany(student_answer::class);
    }
}
