<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable = [
        'name',
        'slug',
        'session_code',
        'modul_id',
        'description',
        'icon',
        'cover',
        'exam_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function summary()
    {
        return $this->belongsToMany(Summary::class, 'session_has_summary',  'summary_id', 'session_id');
    }
    public function modul()
    {
        return $this->belongsTo(Modul::class, 'modul_id');
    }
    public function quiz()
    {
        return $this->hasMany(quiz::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function answer_session()
    {
        return $this->hasOne(answer_session::class);
    }

    public function learning_session()
    {
        return $this->hasOne(learning_session::class);
    }



    // public function video(){
    //     return $this->hasOneThrough(video::class, answer_session::class, );
    // }
}
