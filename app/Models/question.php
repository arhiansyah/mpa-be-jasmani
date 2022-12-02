<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'question_code',
        'question',
        'category_id',
        'tag',
        'duration'
    ];

    public function category()
    {
        return $this->belongsTo(category_subject::class, 'category_id');
    }

    // public function quiz(){
    //     return $this->belongsToMany(quiz::class, 'quiz_has_questions', 'question_id', 'quiz_id');
    // }

    public function option()
    {
        return $this->hasMany(option::class);
    }

    public function answer()
    {
        return $this->hasOne(answer::class);
    }

    public function exam()
    {
        return $this->belongsToMany(exam::class, 'exam_has_question',  'exam_id', 'question_id');
    }

    public function student_answer()
    {
        return $this->hasMany(student_answer::class);
    }
}
