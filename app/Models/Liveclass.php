<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liveclass extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'liveclass_code',
        'instructor_name',
        'instructor_title',
        'description',
        'start',
        'price',
        'cover',
        'qouta',
        'url',
        'tag',
        'instructor_profile'
    ];
}
