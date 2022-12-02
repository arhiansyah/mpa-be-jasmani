<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'branch_id',
        'name',
        'slug',
        'nip',
        'address',
        'hometown',
        'birthday',
        'photo',
        'no_rekening',
        'bank',
        'ktp',
        'npwp',
        
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function role(){
        return $this->belongsToMany(RoleAdmin::class, 'admin_has_roles', 'admin_id','role_id');
    }
    // 'course_has_curricula', 'curriculum_id', 'course_id'
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
