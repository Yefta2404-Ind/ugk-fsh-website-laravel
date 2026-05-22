<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('site_settings')->insert([
            'site_name' => 'LPM Universitas',
            'site_subtitle' => 'Lembaga Penjaminan Mutu',
            'logo' => 'logos/logo.png',

            'phone' => '08123456789',
            'email' => 'admin@kampus.ac.id',
            'address' => 'Jl. Contoh Alamat Kampus',

            'facebook' => 'https://facebook.com/lpm',
            'twitter' => 'https://twitter.com/lpm',
            'instagram' => 'https://instagram.com/lpm',
            'youtube' => 'https://youtube.com/@lpm',

            'footer_description' =>
                'Website resmi Lembaga Penjaminan Mutu Universitas.',

            'footer_address' => 'Jl. Contoh Footer Address',
            'footer_phone' => '08123456789',
            'footer_email' => 'footer@kampus.ac.id',
            'footer_website' => 'https://kampus.ac.id',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}