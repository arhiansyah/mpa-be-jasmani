<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subroot_score extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'root_score_id',
        'subject_id',
        'percentage_value'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function root_score()
    {
        return $this->belongsTo(root_score::class, 'root_score_id');
    }
}
