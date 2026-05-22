<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::first();
        return view('admin.settings.edit', compact('settings'));
    }

public function update(Request $request)
{
    $settings = SiteSetting::firstOrCreate([]);

$request->validate([
    'site_name'          => 'required|string|max:255',
    'site_subtitle'      => 'nullable|string|max:255',
    'phone'              => 'nullable|string|max:255',
    'email'              => 'nullable|email|max:255',
    'address'            => 'nullable|string|max:255',
    'facebook'           => 'nullable|url|max:255',
    'twitter'            => 'nullable|url|max:255',
    'instagram'          => 'nullable|url|max:255',
    'youtube'            => 'nullable|url|max:255',
    'footer_description' => 'nullable|string',
    'footer_address'     => 'nullable|string|max:255',
    'footer_phone'       => 'nullable|string|max:255',
    'footer_email'       => 'nullable|email|max:255',
    'footer_website'     => 'nullable|url|max:255',
    'logo'               => 'nullable|image|max:2048',

    // TAMBAHAN WARNA
    'primary_color'      => 'nullable|string|max:20',
    'primary_light'      => 'nullable|string|max:20',
    'primary_dark'       => 'nullable|string|max:20',

    'gold_color'         => 'nullable|string|max:20',
    'gold_light'         => 'nullable|string|max:20',
    'gold_dark'          => 'nullable|string|max:20',

    'secondary_color'    => 'nullable|string|max:20',
    'accent_color'       => 'nullable|string|max:20',
    'accent2_color'      => 'nullable|string|max:20',
]);

    $data = $request->except('logo');

    if ($request->hasFile('logo')) {

        // aman karena $settings pasti ada sekarang
        if ($settings->logo) {
            Storage::disk('public')->delete($settings->logo);
        }

        $data['logo'] = $request->file('logo')->store('settings', 'public');
    }

    $settings->update($data);

    return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
}
}