<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webinar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'webinar_code',
        'instructor_name',
        'instructor_title',
        'host_name',
        'host_title',
        'description',
        'start',
        'cover',
        'qouta',
        'url',
        'tag',
        'instructor_avatar',
        'host_avatar'
    ];
}
