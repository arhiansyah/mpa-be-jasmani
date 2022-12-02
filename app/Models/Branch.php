<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'city_id',
        'name',
        'code_branch',
        'address',
        'call',
        'handphone',
        'instagram_link',
        'finance',
        'is_pusat'
    ];

    public function classes(){
        return $this->hasMany(RoomClass::class);
    }

    public function runningProgram(){
        return $this->hasMany(RunningProgram::class);
    }

    public function city(){
        return $this->hasOne(Cities::class);
    }

    public function student(){
        return $this->hasManyThrough(Student::class, RoomClass::class);
    }

    public function transaction(){
        return $this->hasMany(transaction::class);
    }

    public function admin(){
        return $this->hasMany(Admin::class);
    }
}
