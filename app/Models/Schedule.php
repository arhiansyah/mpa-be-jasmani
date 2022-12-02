<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'session_id',
        'time_slot_id',
        'running_program_id',
        'day',
    ];

    public function session(){
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function time_slot()
    {
        return $this->belongsTo(time_slot::class, 'time_slot_id');
    }

    public function runningProgram(){
        return $this->belongsTo(RunningProgram::class, 'running_program_id');
    }

    public function schedule_has_exam(){
        return $this->hasMany(schedule_has_exam::class);
    }

    public function student_schedule(){
        return $this->hasMany(student_schedule::class);
    }

    // public function attendence(){
    //     return $this->hasOne(Attendence::class, 'id', 'attendence_id');
    // }

    

    // public function teachers(){
    //     return $this->hasMany(Teacher::class);
    // }


    
}