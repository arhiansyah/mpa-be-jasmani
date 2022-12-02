<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarJasmani extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start',
        'end'
    ];
}
