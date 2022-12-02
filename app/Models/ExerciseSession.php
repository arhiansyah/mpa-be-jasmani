<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'exercisersession_code',
        'description',
        'icon',
        'cover'
    ];

    public function GroupTraining()
    {
        return $this->belongsToMany(GroupTraining::class, 'exe_ses_has_train_group', 'session_id', 'groupTraining_id');
    }

    public function sportSchedule()
    {
        return $this->hasMany(SportSchedule::class, 'session_id', 'id');
    }

    public function academySchedule()
    {
        return $this->hasMany(AcademySchedule::class, 'session_id', 'id');
    }
}
