<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class video_information extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'video_code',
        'tag',
        'teacher_id',
        'video_id',
        'type_video'
    ];


    public function learning_session()
    {
        return $this->hasOne(learning_session::class, 'id', 'video_id');
    }

    public function answer_session()
    {
        return $this->hasOne(answer_session::class, 'id', 'video_id');
    }

    public function video()
    {
        return $this->hasOne(video::class, 'id', 'video_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function trial()
    {
        return $this->hasMany(trial::class);
    }
}
