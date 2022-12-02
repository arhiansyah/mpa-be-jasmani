<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'discount_name',
        'start',
        'end',
        'description',
        'percentage_value',
        'program_id',
        'runningprogram_id',
        'is_active'
    ];

    public function program()
    {
        return $this->belongsTo(ProgramStudy::class, 'program_id');
    }

    public function runningProgram()
    {
        return $this->belongsTo(RunningProgram::class, 'runnongprogram_id');
    }
}
