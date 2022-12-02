<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_id',
        'branch_id',
        'is_active'
    ];

    public function program(){
        return $this->belongsTo(RunningProgram::class, 'program_id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function student(){
        return $this->hasMany(Student::class, 'room_class_id');
    }
}
