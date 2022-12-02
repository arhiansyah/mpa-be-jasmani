<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category_subject extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name'
    ];

    public function studentAccumulation()
    {
        return $this->hasMany(student_accumulation::class, 'id', 'category_id');
    }
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function rootScore()
    {
        return $this->hasMany(root_score::class);
    }

    public function question()
    {
        return $this->hasMany(question::class);
    }
}
