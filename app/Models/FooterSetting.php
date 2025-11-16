<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'phone1',
        'phone2',
        'email',
        'project_address',
        'contact_address',
        'quick_links',
        'legal_links',
        'social_links',
        'map_url',
        'bottom_text',
        'qr_image_path',
        'qr_section_title',
        'map_button_text',
    ];

    protected $casts = [
        'quick_links' => 'array',
        'legal_links' => 'array',
        'social_links' => 'array',
    ];
}
