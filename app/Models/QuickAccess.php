<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickAccess extends Model
{
    protected $fillable = [
        'title',
        'url',
        'icon',
        'bg_color',
        'text_color',
        'new_tab',
        'is_active',
        'order'
    ];
}