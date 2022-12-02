<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class trial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'running_program_id',
        'video_id',
        'time_slot_id'
    ];

    public function runningProgram(){
        return $this->belongsTo(RunningProgram::class, 'running_program_id'); 
    }

    public function time_slot(){
        return $this->belongsTo(Time_slot::class, 'time_slot_id');
    }

    public function video(){
        return $this->belongsTo(video_information::class, 'video_id');
    }

    public function studentProgram(){
        return $this->hasMany(StudentPrograms::class);
    }
}
