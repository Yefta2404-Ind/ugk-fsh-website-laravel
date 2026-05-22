<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyProfileItem extends Model
{
    protected $fillable = [
        'faculty_profile_id',
        'type',
        'content',
        'sort_order'
    ];

    public function profile()
    {
        return $this->belongsTo(FacultyProfile::class);
    }
}