<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class addons extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'date',
        'start',
        'finish',
        'price',
        'teacher_id'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
