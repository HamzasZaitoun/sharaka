<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BrandItem extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'brand_section_id',
        'title',
        'image_path',
        'sort_order',
    ];

    public $translatable = ['title'];

    public function section()
    {
        return $this->belongsTo(BrandSection::class);
    }
}
