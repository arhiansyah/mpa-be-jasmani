<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_id',
        'option_id',
        'description'
    ];

    public function question()
    {
        return $this->hasOne(question::class, 'id', 'question_id');
    }

    public function option()
    {
        return $this->hasOne(option::class, 'id', 'option_id');
    }
}
