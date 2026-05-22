<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_subtitle',
        'logo',
        'phone',
        'email',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'youtube',

        'footer_description',
        'footer_address',
        'footer_phone',
        'footer_email',
        'footer_website',

        // THEME COLORS
        'primary_color',
        'primary_light',
        'primary_dark',

        'gold_color',
        'gold_light',
        'gold_dark',

        'secondary_color',
        'accent_color',
        'accent2_color',
    ];
}