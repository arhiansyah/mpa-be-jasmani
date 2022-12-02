<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'student_code',
        'hometown',
        'birthday',
        'address',
        'city',
        'is_active',
        'graduates',
        'graduate_date',
        'track_level',
        'swim_level'
    ];

    public function studentAcaSchedule()
    {
        return $this->hasMany(StudentAcaSchedule::class);
    }

    public function studentSpoSchedule()
    {
        return $this->hasMany(StudentSpoSchedule::class);
    }
    public function studentScore()
    {
        return $this->hasMany(StudentScore::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function studentTransaction()
    {
        return $this->hasMany(student_transaction::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    public function student_programs()
    {
        return $this->hasMany(StudentPrograms::class);
    }

    // public function studies(){
    //     return $this->hasMany(StudentHasStudies::class);
    // }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function student_document()
    {
        return $this->hasMany(student_document::class);
    }

    public function student_grade()
    {
        return $this->hasMany(StudentGrade::class);
    }

    public function student_answer()
    {
        return $this->hasMany(StudentAnswer::class);
    }

    public function question_attempt()
    {
        return $this->hasMany(question_attempt::class);
    }
    // public function attendence(){
    //     return $this->hasMany(Attendence::class);
    // }

    public function student_raport()
    {
        return $this->hasMany(student_raport::class);
    }

    public function student_accumulation()
    {
        return $this->hasMany(student_accumulation::class);
    }
}
