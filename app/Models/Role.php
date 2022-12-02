<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guard_name'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
    public function permission(){
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id' ,'permission_id');
    }
    
    public function givePermissionTo($permissionName){
        try {
            $permission = Permission::where('name', 'like', '%'.$permissionName.'%')->first();

            $this->permission()->attach($permission->id);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
}
