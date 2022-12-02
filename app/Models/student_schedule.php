<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'schedule_id',
        'date'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}