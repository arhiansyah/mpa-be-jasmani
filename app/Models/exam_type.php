<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class exam_type extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_active'
    ];

    public function exam()
    {
        return $this->hasMany(exam::class);
    }

    public function session()
    {
        return $this->hasMany(Session::class);
    }
}
