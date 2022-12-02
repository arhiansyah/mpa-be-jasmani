<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time_slot extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'time_slots';
    protected $fillable = [
        'name',
        'start',
        'end'
    ];

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }

    public function trial(){
        return $this->hasMany(trial::class);
    }
}