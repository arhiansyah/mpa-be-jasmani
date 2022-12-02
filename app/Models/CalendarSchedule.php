<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'start_date',
        'end_date',
        'title',
        'description',
        'location',
        'institut',
        'program_id',
        'category_academyCalendar_id'
    ];

    public function categoryAcademyCalendar()
    {
        return $this->belongsTo(CategoryAcademyCalendar::class, 'category_academyCalendar_id');
    }
}
