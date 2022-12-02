<?php

namespace App\Models;

use FFMpeg\Media\Video as MediaVideo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class video extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video';

    protected $fillable = [
        'name',
        'path',
        'size',
        'extension',
        'duration'
        // 'description',
        // 'type_video',
        // 'teacher_id'
    ];

    public function exercise()
    {
        return $this->hasMany(Exercise::class);
    }

    public function training()
    {
        return $this->hasMany(Training::class);
    }

    public function videoInformation()
    {
        return $this->hasMany(video_information::class);
    }
    // public function teacher(){
    //     return $this->belongsTo(Teacher::class, 'teacher_id');
    // }

    // public function learning_session(){
    //     return $this->hasOne(learning_session::class);
    // }

    // public function answer_session(){
    //     return $this->hasOne(answer_session::class);
    // }
}
