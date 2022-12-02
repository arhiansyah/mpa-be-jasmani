<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademySchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'day',
        'session_id',
        'exam_id',
        'runningprogram_id',
        'start_time',
        'end_time'
    ];

    public function studentSpoSchedule()
    {
        return $this->hasMany(StudentSpoSchedule::class, 'schedule_id', 'id');
    }
    public function studentAcaSchedule()
    {
        return $this->hasMany(StudentAcaSchedule::class, 'schedule_id', 'id');
    }
    public function exerciseSession()
    {
        return $this->belongsTo(ExerciseSession::class, 'session_id');
    }

    public function exam()
    {
        return $this->belongsTo(exam::class, 'exam_id');
    }

    public function runningprogram()
    {
        return $this->belongsTo(RunningProgram::class, 'runningprogram_id');
    }
}
