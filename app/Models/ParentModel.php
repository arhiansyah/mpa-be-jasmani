<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'parents';
    protected $fillable = [
        'user_id',
        'student_id',
        'name',
        'address',
        'phone'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
    public function student(){
        return $this->hasMany(Student::class);
    }
}

