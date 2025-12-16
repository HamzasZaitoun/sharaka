<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BusinessUnit extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'overview_title',
        'description',
        'logo',
        'gallery',
        'sort_order',
    ];

    public $translatable = ['name', 'overview_title', 'description'];

    protected $casts = [
        'name' => 'array',
        'overview_title' => 'array',
        'description' => 'array',
        'gallery' => 'array',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
