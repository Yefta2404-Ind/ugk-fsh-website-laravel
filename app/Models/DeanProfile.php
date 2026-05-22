<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeanProfile extends Model
{
    protected $fillable = [
        'name',
        'message',
        'photo'
    ];
}