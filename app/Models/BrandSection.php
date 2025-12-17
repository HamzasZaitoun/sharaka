<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BrandSection extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'key',
        'title',
        'subtitle',
        'description',
        'logo_text',
        'is_active',
    ];

    public $translatable = ['title', 'subtitle', 'description'];

    protected $casts = [
        'description' => 'array',
        'is_active' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(BrandItem::class);
    }
}
