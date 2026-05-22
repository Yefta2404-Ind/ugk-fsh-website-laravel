<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
protected $fillable = [
    'name',
    'slug',
    'short_name',
    'description',
    'accreditation',
    'head_of_program',
    'website',
    'students_count',
    'is_active',
];
}