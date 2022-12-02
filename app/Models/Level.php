<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function exerciseCompotion()
    {
        return $this->hasMany(ExerciseComposition::class);
    }

    public function track()
    {
        return $this->hasMany(Track::class);
    }
}
