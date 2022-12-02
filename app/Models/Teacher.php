<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'teachers_code',
        'bank_id',
        'no_rekening',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function video_information()
    {
        return $this->hasMany(video_information::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // public function addons()
    // {
    //     return $this->hasMany(addons::class);
    // }
    // public function schedules(){
    //     return $this->hasMany(Schedule::class);
    // }

    // public function subject(){
    //     return $this->belongsToMany(Subject::class, 'teacher_id', 'subject_id')->withTimestamps();
    // }

    // public function branch(){
    //     return $this->belongsTo(Branch::class, 'branch_id');
    // }
}
