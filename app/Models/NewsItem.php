<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NewsItem extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'published_at',
    ];

    public $translatable = ['title', 'description'];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
