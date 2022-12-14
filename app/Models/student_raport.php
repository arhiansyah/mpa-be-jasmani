<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_raport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'subject_id',
        'grade'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}