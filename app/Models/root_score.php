<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class root_score extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'percentage_value'
    ];

    public function category_subject()
    {
        return $this->belongsTo(category_subject::class, 'category_id');
    }

    public function subRootScore()
    {
        return $this->hasMany(subroot_score::class);
    }
}
