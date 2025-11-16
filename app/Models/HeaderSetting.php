<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderSetting extends Model
{
    protected $fillable = [
        'logo_url',
        'logo_data_url',
        'brand_text',
        'home_label',
        'about_label',
        'features_label',
        'pricing_label',
        'testimonials_label',
        'other_projects_label',
        'contact_label',
        'cta_text',
        'cta_href',
        'logo_image_path',
    ];
}
