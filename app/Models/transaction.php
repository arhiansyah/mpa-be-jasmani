<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_code',
        'amount',
        'category_id',
        'type_transaction',
        'status_payment_id',
        'received_at',
        'name',
        'description'
    ];

    public function statusPayment()
    {
        return $this->belongsTo(StatusPayment::class, 'status_payment_id');
    }

    public function categoryTransaction()
    {
        return $this->belongsTo(CategoryTransaction::class, 'category_id');
    }
    public function finance()
    {
        return $this->hasMany(finance::class);
    }

    public function studentProgram()
    {
        return $this->hasMany(StudentPrograms::class);
    }

    public function studentTransaction()
    {
        return $this->hasMany(student_transaction::class);
    }
}
