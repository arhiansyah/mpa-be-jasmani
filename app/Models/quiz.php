<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'session_id',
        'max_attempt',
        'exam_id'
        // 'type_id'
        // 'name'
    ];

    public function session()
    {
        return $this->belongsTo(session::class, 'session_id');
    }

    // public function question()
    // {
    //     return $this->belongsToMany(question::class, 'quiz_has_questions', 'quiz_id', 'question_id');
    // }

    public function question_attempt()
    {
        return $this->hasMany(question_attempt::class);
    }

    public function exam(){
        return $this->belongsTo(exam::class, 'exam_id');
    }
}