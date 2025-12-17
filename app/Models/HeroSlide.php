<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeroSlide extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'sort_order',
        'is_active',
    ];

    public $translatable = ['title', 'description'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
