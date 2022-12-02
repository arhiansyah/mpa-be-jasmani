<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstallmentProgram extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_program_id',
        'type', 'bill', 'attachment', 'is_paid'
    ];

    public function studentProgram(){
        return $this->belongsTo(StudentPrograms::class);
    }
}
