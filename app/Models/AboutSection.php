<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'content',
        'content_2',
        'content_3',
        'image_url',
        'name',
        'position',
        'extra_data',
        'is_active',
    ];

    protected $casts = [
        'extra_data' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get section by key
     */
    public static function getByKey($key)
    {
        return self::where('section_key', $key)->where('is_active', true)->first();
    }
}
