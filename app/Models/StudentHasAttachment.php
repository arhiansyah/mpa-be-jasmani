<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentHasAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'attachment_id',
        'student_id',
        'title',
        'description',
        'category_id'

    ];

    public function document(){
        return $this->hasOne(Document::class, 'id', 'attachment_id');
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function category(){
        return $this->belongsTo(CategoryDocument::class,);
    }
}
