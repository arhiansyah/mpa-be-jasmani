<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Summary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'size',
        'ext'
    ];

    public function session()
    {
        return $this->belongsToMany(Session::class, 'session_has_summary', 'summary_id', 'session_id');
    }
}
