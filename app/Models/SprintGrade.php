<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintGrade extends Model
{
    use HasFactory;

    protected $table = "sprint_grade";

    protected $fillable = [
        'distance',
        'score',
        'gender'
    ];
}
