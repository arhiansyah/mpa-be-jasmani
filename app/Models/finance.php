<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class finance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'balance',
        'balance_before',
        'balance_after',
        'amount',
        'transaction_id'
    ];

    public function transaction()
    {
        return $this->belongsTo(transaction::class, 'transaction_id');
    }
}
