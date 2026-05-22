<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyProfile extends Model
{
    protected $fillable = [
        'visi',
        'dean_name',
        'dean_message',
        'dean_photo',
        'dean_role',
        'dean_period',
        'dean_title',
        'dean_button_link',

        'dean_pillar_1',
        'dean_pillar_2',
        'dean_pillar_3',
    ];

    // relasi misi
    public function misi()
    {
        return $this->hasMany(FacultyProfileItem::class)
            ->where('type', 'misi')
            ->orderBy('sort_order');
    }

    // relasi tujuan
    public function tujuan()
    {
        return $this->hasMany(FacultyProfileItem::class)
            ->where('type', 'tujuan')
            ->orderBy('sort_order');
    }
}