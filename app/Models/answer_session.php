<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class answer_session extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'session_id',
        'video_id',
    ];

    public function session(){
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function video_information(){
        return $this->hasOne(video_information::class, 'id', 'video_id');
    }
}