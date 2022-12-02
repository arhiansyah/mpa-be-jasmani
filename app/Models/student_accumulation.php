<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_accumulation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'category_id',
        'grade'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function category()
    {
        return $this->belongsTo(category_subject::class, 'category_id');
    }
}
