<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_text',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(question::class, 'question_id');
    }

    public function answer()
    {
        return $this->hasMany(answer::class);
    }

    public function student_answer()
    {
        return $this->hasMany(student_answer::class);
    }
}
