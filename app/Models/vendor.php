<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'pic_number',
        'email',
        'atm',
        'bank',
        'admin_id'
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function teacher(){
        return $this->hasMany(Teacher::class);
    }
    

}