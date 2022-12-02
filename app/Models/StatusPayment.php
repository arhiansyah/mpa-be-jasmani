<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'status_code',
        'description',
        'color'
    ];

    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
