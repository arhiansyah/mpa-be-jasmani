<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class quiz_attempt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'quiz_id',
        'attempt'
    ];

    public function quiz(){
        return $this->belongsTo(quiz::class, 'quiz_id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}