<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Study extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'level'
    ];

    public function student(){
        return $this->hasOne(StudentHasStudies::class,'study_id','id');
    }
}
