<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\Console\Question\Question;

class question_attempt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'question_id',
        'attempt'
    ];

    public function question(){
        return $this->belongsTo(question::class, 'question_id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}