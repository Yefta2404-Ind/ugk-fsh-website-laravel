<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacultyProfile;
use Illuminate\Http\Request;

class FacultyProfileController extends Controller
{
    public function edit()
    {
        $profile = FacultyProfile::with(['misi', 'tujuan'])->first();

        // kalau belum ada data
        if (!$profile) {
            $profile = FacultyProfile::create([
                'visi' => ''
            ]);
        }

        return view('admin.faculty-profile.edit', compact('profile'));
    }

public function update(Request $request)
{
    $request->validate([
        'visi' => 'nullable|string',

        'dean_name' => 'nullable|string|max:255',
        'dean_role' => 'nullable|string|max:255',
        'dean_period' => 'nullable|string|max:255',
        'dean_title' => 'nullable|string|max:255',
        'dean_message' => 'nullable|string',

        'dean_pillar_1' => 'nullable|string|max:255',
        'dean_pillar_2' => 'nullable|string|max:255',
        'dean_pillar_3' => 'nullable|string|max:255',

        'dean_button_link' => 'nullable|string|max:255',

        'dean_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $profile = FacultyProfile::first();

    if (!$profile) {
        $profile = FacultyProfile::create([
            'visi' => ''
        ]);
    }

    // upload foto
    if ($request->hasFile('dean_photo')) {

        $photoPath = $request->file('dean_photo')
            ->store('dean', 'public');

        $profile->dean_photo = $photoPath;
    }

    // update semua field
    $profile->visi = $request->visi;

    $profile->dean_name = $request->dean_name;
    $profile->dean_role = $request->dean_role;
    $profile->dean_period = $request->dean_period;
    $profile->dean_title = $request->dean_title;
    $profile->dean_message = $request->dean_message;

    $profile->dean_pillar_1 = $request->dean_pillar_1;
    $profile->dean_pillar_2 = $request->dean_pillar_2;
    $profile->dean_pillar_3 = $request->dean_pillar_3;

    $profile->dean_button_link = $request->dean_button_link;

    $profile->save();

    // hapus misi lama
    $profile->misi()->delete();

    if ($request->misi) {

        foreach ($request->misi as $index => $misi) {

            if ($misi != null) {

                $profile->misi()->create([
                    'type' => 'misi',
                    'content' => $misi,
                    'sort_order' => $index
                ]);
            }
        }
    }

    // hapus tujuan lama
    $profile->tujuan()->delete();

    if ($request->tujuan) {

        foreach ($request->tujuan as $index => $tujuan) {

            if ($tujuan != null) {

                $profile->tujuan()->create([
                    'type' => 'tujuan',
                    'content' => $tujuan,
                    'sort_order' => $index
                ]);
            }
        }
    }

    return back()->with('success', 'Data berhasil diperbarui');
}
}