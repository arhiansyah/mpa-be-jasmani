<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActiveDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_id',
        'expired_date'
    ];
}
