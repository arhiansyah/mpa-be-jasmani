<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'level_id',
        'day',
        'cover'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
