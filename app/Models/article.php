<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class article extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'article_code',
        'text',
        'content',
        'tag',
        'cover',
        'categoryArticle_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class, 'categoryArticle_id');
    }
}
