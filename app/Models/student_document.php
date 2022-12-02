<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'category_document_id',
        'document_id',
        'title',
        'description'
    ];

    public function document()
    {
        return $this->hasOne(Document::class, 'id', 'document_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function category_document()
    {
        return $this->belongsTo(CategoryDocument::class, 'category_document_id');
    }
}
