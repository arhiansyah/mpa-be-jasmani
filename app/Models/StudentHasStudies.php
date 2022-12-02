<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentHasStudies extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'study_id',
        'student_id',
        'school_name',
        'graduate_year',
        'score'
    ];

    public function student(){
        return $this->hasMany(Student::class,);
    }

    public function studies(){
        return $this->hasOne(Study::class, 'id','study_id');
    }
}
